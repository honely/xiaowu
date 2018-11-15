<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/10/24
 * Time: 9:15
 * Name: Controller
 */
namespace app\operation\controller;
use think\Controller;
use think\Db;
use think\Request;

class Index extends Controller{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $userInfo=session('userInfo');
        if(empty($userInfo)){
            $this->redirect('marketm/login/login');
        }
    }

    public function index(){
        $where=" 1 =1 ";
        $keywords=trim($this->request->param('keywords'));
        if(isset($keywords) && !empty($keywords)){
            $where.=" and ( h_b_id like '%".$keywords."%')";
            $this->assign('keywords',$keywords);
        }
        $houses=Db::table('dcxw_house')
            ->where('h_isable','egt','3')
            ->where($where)
            ->limit(10)
            ->order('h_addtime desc')
            ->select();
        $count=Db::table('dcxw_house')
            ->where('h_isable','egt','3')
            ->where($where)->count();
        $connomModel=new \app\marketm\controller\Common();
        if($houses){
            foreach($houses as $k =>$v){
                $houses[$k]['h_money']=$connomModel->getDecorateMoney($v['h_b_id']);
                $houses[$k]['h_addtime']=date('Y年m月d日',$v['h_addtime']);
                $payInfo=Db::table('dcxw_house_pay')->where(['hp_house_code' =>$v['h_b_id']])->column('hp_paid_ratio');
                if($payInfo){
                    $houses[$k]['paid_ratio']=($payInfo[0]*100)."%";
                    $houses[$k]['is_paid_ratio']=1;
                }else{
                    $houses[$k]['paid_ratio']="0";
                    $houses[$k]['is_paid_ratio']=2;
                }
            }
        }
        $this->assign('count',$count);
        $this->assign('houses',$houses);
        return $this->fetch();
    }

    /*
         * 房源加载更多
         * **/

    public function housemore(){
        $where='1 = 1';
        if($_POST){
            $page=intval(trim($_POST['page']));
            $keywords=trim($_POST['keywords']);
            $where.=" and ( h_name like '%".$keywords."%' or h_building like '%".$keywords."%' or h_address like '%".$keywords."%'  or h_description like '%".$keywords."%' )";
        }else{
            $page=1;
        }
        $limit=8;
        $houses=Db::table('dcxw_house')
            ->where('h_isable','egt','3')
            ->where($where)
            ->limit(($page-1)*$limit,$limit)
            ->order('h_addtime desc')
            ->select();
        $connomModel=new \app\marketm\controller\Common();
        if($houses){
            foreach($houses as $k =>$v){
                $houses[$k]['h_money']=$connomModel->getDecorateMoney($v['h_b_id']);
                $houses[$k]['h_addtime']=date('Y年m月d日',$v['h_addtime']);
            }
        }
        if($houses){
            $this->success('更多完成','',$houses);
        }else{
            $this->error('更多失败','',$houses);
        }
    }



    public function details()
    {
        $h_id=trim($_GET['h_id']);
        //房屋基本信息
        $house=Db::table('dcxw_house')
            ->where(['h_b_id' => $h_id])
            ->find();
        $this->assign('hous',$house);
        //客户经理信息
        $u_id=$house['h_admin'];
        $manger=Db::table('dcxw_user')
            ->where(['u_id' =>$u_id])
            ->field('u_name,u_phone,u_job')
            ->find();
        $this->assign('manger',$manger);
        //户主信息
        $master=Db::table('dcxw_house_master')
            ->where(['hm_house_code' => $h_id])
            ->find();
        $this->assign('master',$master);
        //回款信息
        $payInfo=Db::table('dcxw_house_pay')
            ->where(['hp_house_code' => $h_id])
            ->find();
        if($payInfo){
            $payInfo['hp_money']=number_format($payInfo['hp_money'],2);
            $payInfo['hp_paid']=number_format($payInfo['hp_paid'],2);
            $payInfo['hp_will_pay']=number_format($payInfo['hp_will_pay'],2);
            $payInfo['hp_paid_ratio']=($payInfo['hp_paid_ratio']*100)."%";
        }
        $this->assign('payInfo',$payInfo);
        $payLogs=Db::table('dcxw_house_pay_log')
            ->where(['hpl_house_code' => $h_id])
            ->order('hpl_addtime desc')
            ->select();
        if($payLogs){
            foreach ($payLogs as $k => $v){
                $payLogs[$k]['hpl_addtime'] = date('Y-m-d H:i',$v['hpl_addtime']);
                $payLogs[$k]['hpl_money'] = number_format($v['hpl_money'],2);
            }
        }
        $this->assign('payLogs',$payLogs);
        //附属信息
        $attach=Db::table('dcxw_house_attachment')
            ->where(['ha_house_code' => $h_id])
            ->find();
        if($attach){
            $attach['ha_deadline']=date("Y-m-d",$attach['ha_deadline']);
            $attach['ha_contact_img']=explode(",",$attach['ha_contact_img']);
            $attach['ha_decorate_permit']=date("Y-m-d",$attach['ha_decorate_permit']);
        }
        $this->assign('attach',$attach);
        return $this->fetch();
    }


    /*
     * 租客信息
     * */
    public function renter()
    {
        $userInfo=session('userInfo');
        $hr_id=intval(trim($_GET['hr_id']));
        if($_POST){
            $renter=Db::table('dcxw_house_rent')
                ->where(['hr_id' => $hr_id])
                ->find();
            //若有信息是修改，没有信息是添加
            if($renter){
                $data=$_POST;
                $data['hr_addtime']=time();
                $data['hr_admin']=$userInfo['u_id'];
                $update=Db::table('dcxw_house_rent')
                    ->where(['hr_id' => $hr_id])
                    ->update($data);
                if($update){
                    $this->success('修改成功！','',$renter);
                }else{
                    $this->error('修改失败！','',$renter);
                }
            }else{
                $data=$_POST;
                $data['hr_addtime']=time();
                $data['hr_admin']=$userInfo['u_id'];
                $add=Db::table('dcxw_house_rent')->insert($data);
                if($add){
                    $this->success('添加成功！');
                }else{
                    $this->error('添加失败！');
                }
            }
        }else{
            $renter=Db::table('dcxw_house_rent')
                ->where(['hr_id' => $hr_id])
                ->find();
            if($renter){
                $renter['hr_addtime']=date('Y-m-d H:i:s',$renter['hr_addtime']);
                $masterArr=Db::table('dcxw_user')
                    ->where(['u_id' => $renter['hr_admin']])
                    ->column('u_name');
                $renter['hr_admin']=$masterArr[0];
            }
        }
        $this->assign('renter',$renter);
        return $this->fetch();
    }

    public function improve()
    {
        $h_id=trim($_GET['h_id']);
        $userInfo=session('userInfo');
        if($_POST){
            $data=$_POST;
            $data['h_config'] =implode(',',array_keys($_POST['h_config']));
            $img=$_POST['h_img'];
            $data['h_isable'] = 4;
            $h_img='';
            for ($i=0;$i<sizeof($img);$i++){
                $h_img.=$img[$i].",";
            }
            $data['h_house_img']=$_POST['h_img'][0];
            $data['h_img']=trim($h_img,',');
            $data['h_add_type']=2;
            $data['h_admin']=$userInfo['u_id'];
            $data['h_updatetime']=time();
            $update=Db::table('dcxw_house')->where(['h_b_id' => $h_id])->update($data);
            if($update){
                $this->success('修改成功！','');
            }else{
                $this->error('修改失败！','');
            }
        }else{
            $houseInfo=Db::table('dcxw_house')
                ->join('dcxw_province','dcxw_province.p_id = dcxw_house.h_p_id')
                ->join('dcxw_city','dcxw_city.c_id = dcxw_house.h_c_id')
                ->join('dcxw_area','dcxw_area.area_id = dcxw_house.h_a_id')
                ->field('dcxw_house.*,dcxw_province.p_name,dcxw_city.c_name,dcxw_area.area_name')
                ->where(['h_b_id' => $h_id])
                ->find();
            if($houseInfo){
                $houseInfo['h_img']=explode(',',$houseInfo['h_img']);
            }
            //房屋配置 备选
            $houseConf=Db::table('dcxw_type')
                ->where(['type_sort' => 2,'type_isable' => 1])
                ->order('type_order')
                ->select();
            $type_list = "";
            if($houseInfo['h_config']){
                $type_list = explode(',',trim($houseInfo['h_config'],','));
            }
            $this->assign('type_list',$type_list);
            $this->assign('config',$houseConf);
            $this->assign('house',$houseInfo);
            return $this->fetch();
        }
    }


    public function person(){
        return $this->fetch();
    }


    /*
     * 出租记录
     * */
    public function rentlog()
    {
        $h_id=trim($_GET['h_id']);
        $where=" 1 =1 ";
        $keywords=trim($this->request->param('keywords'));
        if(isset($keywords) && !empty($keywords)){
            $where.=" and ( hr_name like '%".$keywords."%' or hr_phone like '%".$keywords."%' )";
            $this->assign('keywords',$keywords);
        }
        $houseInfo=Db::table('dcxw_house')
            ->where(['h_b_id' => $h_id])
            ->field('h_building,h_address,h_area,h_isable')
            ->find();
        $this->assign('house',$houseInfo);
        $rentLog=Db::table('dcxw_house_rent_log')
            ->join('dcxw_house_rent','dcxw_house_rent_log.hrl_renter_id = dcxw_house_rent.hr_id')
            ->join('dcxw_house_rent_channel','dcxw_house_rent_channel.hrc_id = dcxw_house_rent_log.hrl_rent_channel')
            ->where(['hrl_house_code' => $h_id])
            ->where($where)
            ->limit(10)
            ->field('dcxw_house_rent_log.*,dcxw_house_rent.hr_name,dcxw_house_rent.hr_phone,dcxw_house_rent_channel.hrc_title')
            ->order('hrl_status,hrl_rent_time desc')
            ->select();
        $count=Db::table('dcxw_house_rent_log')
            ->join('dcxw_house_rent','dcxw_house_rent_log.hrl_renter_id = dcxw_house_rent.hr_id')
            ->where(['hrl_house_code' => $h_id])
            ->where($where)->count();
        if($rentLog)
        {
            foreach($rentLog as $k => $v)
            {
                $rentLog[$k]['hrl_rent_time']=date('Y/m/d',$v['hrl_rent_time']);
                $rentLog[$k]['hrl_dead_time']=date('Y/m/d',$v['hrl_dead_time']);
            }
        }
        $this->assign('count',$count);
        $this->assign('h_id',$h_id);
        $this->assign('rentLog',$rentLog);
        return $this->fetch();
    }

    /*
     * 出租记录加载更多
     * */
    public function logmore(){
        $h_id=trim($_POST['h_id']);
        $where='hrl_house_code = '.$h_id;

        if($_POST){
            $page=intval(trim($_POST['page']));
        }else{
            $page=1;
        }
        $limit=8;
        $rentLog=Db::table('dcxw_house_rent_log')
            ->join('dcxw_house_rent','dcxw_house_rent_log.hrl_renter_id = dcxw_house_rent.hr_id')
            ->where($where)
            ->limit(($page-1)*$limit,$limit)
            ->order('hrl_addtime desc')
            ->select();
        if($rentLog)
        {
            foreach($rentLog as $k => $v)
            {
                $rentLog[$k]['hrl_rent_time']=date('Y/m/d',$v['hrl_rent_time']);
                $rentLog[$k]['hrl_dead_time']=date('Y/m/d',$v['hrl_dead_time']);
            }
        }
        if($rentLog){
            $this->success('更多完成','',$rentLog);
        }else{
            $this->error('更多失败','',$rentLog);
        }
    }




    /*
     * 添加出租记录
     * */
    public function addrent()
    {
        $userInfo=session('userInfo');
        $h_id=trim($_GET['h_id']);
        if($_POST){
            //1.租客信息入库
            $renter['hr_house_code']=$h_id;
            $renter['hr_name']=trim($_POST['hr_name']);
            $renter['hr_phone']=trim($_POST['hr_phone']);
            $renter['hr_addtime']=time();
            $renter['hr_admin']=$userInfo['u_id'];
            $renterAdd=Db::table('dcxw_house_rent')->insert($renter);
            $rent_id=Db::table('dcxw_house_rent')->getLastInsID();
            if($renterAdd){
                //2.出租信息入库
                $rentLog['hrl_house_code']=$h_id;
                $rentLog['hrl_renter_id']=$rent_id;
                $rentLog['hrl_elect_start']=trim($_POST['hrl_elect_start']);
                $rentLog['hrl_water_start']=trim($_POST['hrl_water_start']);
                $rentLog['hrl_rent_time']=strtotime(trim($_POST['hrl_rent_time'])." 00:00:00");
                $rentLog['hrl_dead_time']=strtotime(trim($_POST['hrl_dead_time'])." 23:59:59");
                $rentLog['hrl_contact_code']=trim($_POST['hrl_contact_code']);
                $img=$_POST['hrl_contact_img'];
                $hpl_img='';
                for ($i=0;$i<sizeof($img);$i++)
                {
                    $hpl_img.=$img[$i].",";
                }
                $rentLog['hrl_contact_img']=trim($hpl_img,',');
                $rentLog['hrl_foregift']=trim($_POST['hrl_foregift']);
                $rentLog['hrl_rent_price']=trim($_POST['hrl_rent_price']);
                $rentLog['hrl_rent_type']=intval(trim($_POST['hrl_rent_type']));
                $rentLog['hrl_rent_channel']=intval(trim($_POST['hrl_rent_channel']));
                $rentLog['hrl_pay_type']=intval(trim($_POST['hrl_remark']));
                $rentLog['hrl_remark']=trim($_POST['hrl_remark']);
                $rentLog['hrl_addtime']=time();
                $rentLog['hrl_admin']=$userInfo['u_id'];
                $addRenLog=Db::table('dcxw_house_rent_log')->insert($rentLog);
                //3.修改主表出租状态
                $updateRentStatus=Db::table('dcxw_house')
                    ->where(['h_b_id' => $h_id])
                    ->update(['h_isable' => 5]);
                if($addRenLog && $updateRentStatus)
                {
                    $this->success('添加成功！');
                }else{
                    $this->error('添加失败！');
                }
            }
        }else{
            $rentChannel=Db::table('dcxw_house_rent_channel')
                ->where(['hrc_isable' => 1])
                ->order('hrc_addtime desc')
                ->select();
            $this->assign('rentChannel',$rentChannel);
            $this->assign('h_id',$h_id);
            return $this->fetch();
        }
    }


    /*
     *添加收租信息
     * */
    public function addpaylog()
    {
        $userInfo=session('userInfo');
        $hrpl_rent_id=trim($_GET['h_id']);
        if($_POST){
            $data['hrpl_rent_id']=$hrpl_rent_id;
            $data['hrpl_money']=$_POST['hrpl_money'];
            $data['hrpl_addtime']=time();
            $data['hrpl_next_rent']=strtotime(trim($_POST['hrpl_next_rent'].'20:20:20'));
            $img=$_POST['hrpl_img'];
            $hpl_img='';
            for ($i=0;$i<sizeof($img);$i++)
            {
                $hpl_img.=$img[$i].",";
            }
            $data['hrpl_img']=trim($hpl_img,',');
            $data['hrpl_tips']=trim($_POST['hrpl_tips']);
            $data['hrpl_tips']=strtotime(trim($_POST['hrpl_tips'])." 00:00:12");
            $data['hrpl_user']=$userInfo['u_id'];
            $add=Db::table('dcxw_house_rent_pay_log')->insert($data);
            if($add)
            {
                $this->success('添加成功!');
            }else{
                $this->error('添加失败!');
            }
        }else{
            //z租房记录
            $rentInfo=Db::table('dcxw_house_rent_log')
                ->where(['hrl_id' => $hrpl_rent_id])
                ->field('hrl_renter_id,hrl_dead_time,hrl_house_code')
                ->find();
            $rentInfo['hrl_dead_time']=date('Y年m月日',$rentInfo['hrl_dead_time']);
            $this->assign('rent',$rentInfo);
            $hrl_renter_id=$rentInfo['hrl_renter_id'];
            //房屋编号，房屋到期日期
            //租客信息
            $renter=Db::table('dcxw_house_rent')
                ->where(['hr_id' => $hrl_renter_id])
                ->find();
            $this->assign('hr_id',$hrpl_rent_id);
            $this->assign('renter',$renter);
            return $this->fetch();
        }
    }



    /*
     * 出租信息详情
     * */
    public function rentdetail(){
        $hrl_id=trim($_GET['hrl_id']);
        //根据出租记录id找出房源编号
        $rentInfo=Db::table('dcxw_house_rent_log')
            ->join('dcxw_house_rent_channel','dcxw_house_rent_channel.hrc_id = dcxw_house_rent_log.hrl_rent_channel')
            ->where(['hrl_id' => $hrl_id])
            ->field('dcxw_house_rent_channel.hrc_title,dcxw_house_rent_log.*')
            ->find();
        $rentInfo['hrl_contact_img']=explode(',',$rentInfo['hrl_contact_img']);
        $rentInfo['hrl_rent_time']=date('Y/m/d',$rentInfo['hrl_rent_time']);
        $rentInfo['hrl_dead_time']=date('Y/m/d',$rentInfo['hrl_dead_time']);
        $this->assign('rent',$rentInfo);
        $h_code=$rentInfo['hrl_house_code'];
        $renter_id=$rentInfo['hrl_renter_id'];
        $housedata=Db::table('dcxw_house')
            ->where(['h_b_id' => $h_code])
            ->field('h_area,h_b_id,h_building,h_address')
            ->find();
        $renterInfo=Db::table('dcxw_house_rent')
            ->where(['hr_id' =>$renter_id])
            ->find();
        $this->assign('renter',$renterInfo);
        $this->assign('house',$housedata);
        return $this->fetch();
    }


    public function endrent(){
        if($_POST){
            $hrl_id=intval(trim($_POST['hrl_id']));
            $data['hrl_elect_end']=trim($_POST['hrl_elect_end']);
            $data['hrl_water_end']=trim($_POST['hrl_water_end']);
            $data['hrl_status']=2;
            $finishRent=Db::table('dcxw_house_rent_log')
                ->where(['hrl_id' => $hrl_id])
                ->update($data);
            $houseInfo=Db::table('dcxw_house_rent_log')
                ->where(['hrl_id' => $hrl_id])
                ->column('hrl_house_code');
            $houseCode=$houseInfo[0];
            //修改房屋主表的出租状态
//            是否可租，1，事业部，2，工程部装修中；3,运营部配置中，4，可出租，5，已出租
            $houseStatus=Db::table('dcxw_house')->where(['h_b_id' => $houseCode])->update(['h_isable' =>4]);
            if($finishRent && $houseStatus){
                $this->success('完结成功！');
            }else{
                $this->error('完结失败！');
            }
        }


    }



    /*
     * 收租记录
     * */
    public function paylog()
    {
        //出租信息编号
        $h_id=trim($_GET['h_id']);
        //房源编号；
        $rentInfo=Db::table('dcxw_house_rent_log')
            ->where(['hrl_id' => $h_id])
            ->column('hrl_house_code');
        $payLog=Db::table('dcxw_house_rent_pay_log')
            ->join('dcxw_house_rent_log','dcxw_house_rent_log.hrl_id = dcxw_house_rent_pay_log.hrpl_rent_id')
            ->where(['hrpl_rent_id' => $h_id])
            ->order('hrpl_addtime desc')
            ->limit(10)
            ->field('dcxw_house_rent_pay_log.*,dcxw_house_rent_log.hrl_renter_id')
            ->select();
        $count=Db::table('dcxw_house_rent_pay_log')
            ->join('dcxw_house_rent_log','dcxw_house_rent_log.hrl_id = dcxw_house_rent_pay_log.hrpl_rent_id')
            ->where(['hrpl_rent_id' => $h_id])
            ->count();
        if($payLog)
        {
            foreach ($payLog as $k => $v)
            {
                $payLog[$k]['hrpl_addtime'] = date('Y-m-d H:i:s',$v['hrpl_addtime']);
                $payLog[$k]['hrpl_addtimes'] = date('Y年m月d日H时i分',$v['hrpl_addtime']);
                $payLog[$k]['hrpl_img'] = explode(',',$v['hrpl_img'])[0];
                $payLog[$k]['hrpl_rent_name'] = $this->getRenterNameViaRentId($v['hrl_renter_id']);
                $payLog[$k]['hrpl_rent_phone'] = $this->getRenterPhoneViaRentId($v['hrl_renter_id']);

            }
        }
        $this->assign('count',$count);
        $this->assign('h_id',$h_id);
        $this->assign('h_b_id',$rentInfo[0]);
        $this->assign('payLog',$payLog);
        return $this->fetch();
    }

    /*
     * 支付记录加载更多
     * */
    public function paymore(){
        $h_id=trim($_POST['h_id']);
        $where='hrpl_rent_id = '.$h_id;
        if($_POST){
            $page=intval(trim($_POST['page']));
        }else{
            $page=1;
        }
        $limit=8;
        $payLog=Db::table('dcxw_house_rent_pay_log')
            ->join('dcxw_house_rent_log','dcxw_house_rent_log.hrl_id = dcxw_house_rent_pay_log.hrpl_rent_id')
            ->where($where)
            ->limit(($page-1)*$limit,$limit)
            ->order('hrl_addtime desc')
            ->select();
        if($payLog)
        {
            foreach ($payLog as $k => $v)
            {
                $payLog[$k]['hrpl_addtime'] = date('Y-m-d H:i:s',$v['hrpl_addtime']);
                $payLog[$k]['hrpl_addtimes'] = date('Y年m月d日H时i分',$v['hrpl_addtime']);
                $payLog[$k]['hrpl_img'] = explode(',',$v['hrpl_img'])[0];
                $payLog[$k]['hrpl_rent_name'] = $this->getRenterNameViaRentId($v['hrl_renter_id']);
                $payLog[$k]['hrpl_rent_phone'] = $this->getRenterPhoneViaRentId($v['hrl_renter_id']);

            }
        }
        if($payLog){
            $this->success('更多完成','',$payLog);
        }else{
            $this->error('更多失败','',$payLog);
        }
    }





    //根据租客id获取租客姓名
    public function getRenterNameViaRentId($rent_id)
    {
        $rentInfo=Db::table('dcxw_house_rent')
            ->where(['hr_id' => $rent_id])
            ->column('hr_name');
        return $rentInfo[0];

    }

    //根据租客id获取租客电话
    public function getRenterPhoneViaRentId($rent_id)
    {
        $rentInfo=Db::table('dcxw_house_rent')
            ->where(['hr_id' => $rent_id])
            ->column('hr_phone');
        return $rentInfo[0];

    }


    /*
     * 租金详情
     * */
    public function paydetail()
    {
        $hdl_id=intval(trim($_GET['hdl_id']));
        $details=Db::table('dcxw_house_rent_pay_log')
            ->where(['hrpl_id' => $hdl_id])
            ->join('dcxw_user','dcxw_user.u_id = dcxw_house_rent_pay_log.hrpl_user')
            ->field('dcxw_house_rent_pay_log.*,dcxw_user.u_name')
            ->find();
        if($details){
            $details['hrpl_addtime']=date('Y年m月d日 H时i分',$details['hrpl_addtime']);
            $details['hrpl_img']=explode(',',$details['hrpl_img']);
        }
        $this->assign('details',$details);
        $rent_id=$details['hrpl_rent_id'];
        $payLog=Db::table('dcxw_house_rent_pay_log')
            ->join('dcxw_house_rent_log','dcxw_house_rent_log.hrl_id = dcxw_house_rent_pay_log.hrpl_rent_id')
            ->where(['hrpl_rent_id' => $rent_id])
            ->order('hrpl_addtime desc')
            ->field('dcxw_house_rent_pay_log.*,dcxw_house_rent_log.hrl_renter_id,hrl_house_code')
            ->find();
        $payLog['rent_name']=$this->getRenterNameViaRentId($payLog['hrl_renter_id']);
        $payLog['rent_phone']=$this->getRenterPhoneViaRentId($payLog['hrl_renter_id']);
        $this->assign('payLog',$payLog);
        return $this->fetch();
    }
}