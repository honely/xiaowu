<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/9/9
 * Time: 10:11
 * Name: 房源管理
 */
namespace app\admin\controller;
use app\marketm\controller\Common;
use think\Controller;
use think\Db;
use think\Request;

class House extends Controller{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $adminName=session('adminId');
        if(empty($adminName)){
            $this->error('请先登录！','login/login');
        }
        if(isset($_SESSION['expiretime'])) {
            if($_SESSION['expiretime'] < time()) {
                unset($_SESSION['expiretime']);
                $this->error('您的登录身份已过期，请重新登录！','login/login');
                exit(0);
            } else {
                $_SESSION['expiretime'] = time() + 1800; // 刷新时间戳
            }
        }
    }

    /*
     * 房源管理
     * */
    public function index(){
        return $this->fetch();
    }

    public function houseData(){
        $where =' 1 = 1';
        $commomModel=new Common();
        $keywords = trim($this->request->param('keywords'));
        $case_decotime=trim($this->request->param('case_decotime'));
        if(isset($keywords) && !empty($keywords)){
            $where.=" and ( h_name like '%".$keywords."%' or h_b_id like '%".$keywords."%' )";
        }
        if(isset($case_decotime) && !empty($case_decotime)){
            $sdate=strtotime(substr($case_decotime,'0','10')." 00:00:00");
            $edate=strtotime(substr($case_decotime,'-10')." 23:59:59");
            $where.=" and ( h_addtime >= ".$sdate." and h_addtime <= ".$edate." ) ";
        }
        $count=Db::table('dcxw_house')
            ->join('dcxw_province','dcxw_province.p_id = dcxw_house.h_p_id')
            ->join('dcxw_city','dcxw_city.c_id = dcxw_house.h_c_id')
            ->join('dcxw_area','dcxw_area.area_id = dcxw_house.h_a_id')
            ->where($where)
            ->count();
        $page= $this->request->param('page',1,'intval');
        $limit=$this->request->param('limit',10,'intval');
        $design=Db::table('dcxw_house')
            ->join('dcxw_province','dcxw_province.p_id = dcxw_house.h_p_id')
            ->join('dcxw_city','dcxw_city.c_id = dcxw_house.h_c_id')
            ->join('dcxw_area','dcxw_area.area_id = dcxw_house.h_a_id')
            ->limit(($page-1)*$limit,$limit)
            ->order('h_istop asc,h_isable,h_view desc')
            ->where($where)
            ->select();
        if($design){
            foreach($design as $key => $val){
                $type=$val['h_rent_type']== 1 ? '月':'日';
                $design[$key]['h_updatetime'] = date('Y-m-d H:i:s',$val['h_updatetime']);
                $design[$key]['h_iscop'] = $val['h_iscop']== 1 ? '整租':'合租';
                if($val['h_add_type'] == 1){
                    $design[$key]['h_admin']=$commomModel->getAdminName($val['h_admin']);
                }else{
                    $design[$key]['h_admin']=$commomModel->getUserName($val['h_admin']);
                }
                $design[$key]['h_add_type'] = $val['h_add_type']== 1 ? '后台添加':'前端添加';
                $design[$key]['c_name'] = $val['c_name']."-".$val['area_name'];
                $design[$key]['h_rent'] = "￥".$val['h_rent']."/".$type;
                $design[$key]['case_num']=Db::table('dcxw_case')->where(['case_designer' => $val['h_id']])->count();
            }
        }
        $res['code'] = 0;
        $res['msg'] = "";
        $res['data'] = $design;
        $res['count'] = $count;
        return json($res);
    }


    /*
     * 房源添加
     * */
    public function add(){
        if($_POST){
            $data=$_POST;
            $p_ids=$_POST['h_p_id'];
            $p_id=Db::table('dcxw_province')->where(['p_id' => $p_ids])->column('p_code');
            $c_ids=$_POST['h_c_id'];
            $c_id=Db::table('dcxw_city')->where(['c_id' => $c_ids])->column('c_code');
            $a_ids=$_POST['h_a_id'];
            $a_id=Db::table('dcxw_area')->where(['area_id' => $a_ids])->column('area_code');
            $buNum=Db::table('dcxw_house')->where(['h_c_id' => $c_ids])->count();
            $data['h_b_id'] = $p_id[0].''.$c_id[0].''.$a_id[0].sprintf("%04d", $buNum+1);
            $data['h_addtime']=time();
            $data['h_updatetime']=time();
            $data['h_config'] =implode(',',array_keys($_POST['h_config']));
            $img=$_POST['h_img'];
            $h_img='';
            for ($i=0;$i<sizeof($img);$i++){
                $h_img.=$img[$i].",";
            }
            $data['h_img']=trim($h_img,',');
            $data['h_admin'] = session('adminId');
            $data['h_add_type'] = 1;
            $data['h_isable'] = 4;
            $add=Db::table('dcxw_house')->insert($data);
            if($add){
                return  json(['code' => '1','msg' => '发布成功！','data' => $data]);
            }else{
                return  json(['code' => '2','msg' => '发布失败！','data' => $data]);
            }
        }else{
            //房屋配置 备选
            $houseConf=Db::table('dcxw_type')
                ->where(['type_sort' => 2,'type_isable' => 1])
                ->order('type_order')
                ->select();
            $this->assign('houseConf',$houseConf);
            //房屋类型 备选
            $houseType=Db::table('dcxw_type')
                ->where(['type_sort' => 1,'type_isable' => 1])
                ->order('type_order')
                ->select();
            $this->assign('houseType',$houseType);
            $provInfo=Db::table('dcxw_province')->select();
            $this->assign('prov',$provInfo);
            return $this->fetch();
        }

    }

    /*
     * 房源修改
     * */
    public function edit(){
        $h_id=intval(trim($_GET['h_id']));
        if($_POST){
            $data=$_POST;
            $data['h_updatetime']=time();
            $data['h_config'] =implode(',',array_keys($_POST['h_config']));
            $img=$_POST['h_img'];
            $data['h_isable'] = 4;
            $h_img='';
            for ($i=0;$i<sizeof($img);$i++){
                $h_img.=$img[$i].",";
            }
            $data['h_img']=trim($h_img,',');
            $data['h_admin'] = session('adminId');
            $update=Db::table('dcxw_house')->where(['h_id' => $h_id])->update($data);
            if($update){
                return  json(['code' => '1','msg' => '修改成功！','data' => $data]);
            }else{
                return  json(['code' => '2','msg' => '修改失败！','data' => $data]);
            }
        }else{
            $houseInfo=Db::table('dcxw_house')->where(['h_id' => $h_id])->find();
            $houseInfo['h_imgs']=rtrim($houseInfo['h_img'],',');
            $houseInfo['h_img']=explode(',',$houseInfo['h_imgs']);
            $type_list = "";
            if($houseInfo['h_config']){
                $type_list = explode(',',trim($houseInfo['h_config'],','));
            }
            $this->assign('type_list',$type_list);
            $this->assign('house',$houseInfo);
            $city=Db::table('dcxw_city')->where(['p_id' => $houseInfo['h_p_id']])->select();
            $this->assign('city',$city);
            $area=Db::table('dcxw_area')->where(['area_c_id' => $houseInfo['h_c_id']])->select();
            $this->assign('area',$area);
            //房屋配置 备选
            $houseConf=Db::table('dcxw_type')
                ->where(['type_sort' => 2,'type_isable' => 1])
                ->order('type_order')
                ->select();
            $this->assign('houseConf',$houseConf);
            //房屋类型 备选
            $houseType=Db::table('dcxw_type')
                ->where(['type_sort' => 1,'type_isable' => 1])
                ->order('type_order')
                ->select();
            $this->assign('houseType',$houseType);
            $provInfo=Db::table('dcxw_province')->select();
            $this->assign('prov',$provInfo);
            return $this->fetch();
        }
    }





    //更改是否显示的状态
    public function status(){
        $h_id = $_GET['h_id'];
        $change = $_GET['change'];
        if($h_id && isset($change)){
            //如果选中状态是true,后台数据将要改为手机 显示
            if($change){
                $msg = '显示';
                $data['h_isable'] = '4';
                $data['h_admin'] = session('adminId');
            }else{
                $msg = '隐藏';
                $data['h_isable'] = '5';
                $data['h_admin'] = session('adminId');
            }
            $changeStatus = Db::table('dcxw_house')->where(['h_id' => $h_id])->update($data);
            if($changeStatus){
                $res['code'] = 1;
                $res['msg'] = $msg.'成功！';
            }else{
                $res['code'] = 0;
                $res['msg'] = $msg.'失败！';
            }
        }else{
            $res['code'] = 0;
            $res['msg'] = '这是个意外！';
        }
        return $res;
    }

    //top
    public function top(){
        $h_id = $_GET['h_id'];
        $change = $_GET['change'];
        if($h_id && isset($change)){
            //如果选中状态是true,后台数据将要改为手机 显示
            if($change){
                $msg = '置顶';
                $data['h_istop'] = '1';
                $data['h_admin'] = session('adminId');
            }else{
                $msg = '取消置顶';
                $data['h_istop'] = '2';
                $data['h_admin'] = session('adminId');
            }
            $changeStatus = Db::table('dcxw_house')->where(['h_id' => $h_id])->update($data);
            if($changeStatus){
                $res['code'] = 1;
                $res['msg'] = $msg.'成功！';
            }else{
                $res['code'] = 0;
                $res['msg'] = $msg.'失败！';
            }
        }else{
            $res['code'] = 0;
            $res['msg'] = '这是个意外！';
        }
        return $res;
    }




    /*
     * 删除某一房源
     * */
    public function del(){
        $h_id=intval($_GET['h_id']);
        $delArt=Db::table('dcxw_house')->where(['h_id' => $h_id])->delete();
        if($delArt){
            $this->success('删除房源成功','index');
        }else{
            $this->error('删除房源失败','index');
        }
    }


    public function refresh(){
        $h_id=intval($_GET['h_id']);
        $refresh=Db::table('dcxw_house')->where(['h_id' => $h_id])->update(['h_updatetime' => time()]);
        $setView=Db::table('dcxw_house')->where(['h_id' => $h_id])->setInc('h_view');
        if($refresh && $setView){
            $this->success('刷新房源成功','index');
        }else{
            $this->error('刷新房源失败','index');
        }
    }



    /*
     * 房源托管列表
     * */
    public function seek(){
        return $this->fetch();
    }




    public function seekData(){
        $where =' 1 = 1';
        $keywords = trim($this->request->param('keywords'));
        $case_decotime=trim($this->request->param('case_decotime'));
        if(isset($keywords) && !empty($keywords)){
            $where.=" and ( h_name like '%".$keywords."%' or h_b_id like '%".$keywords."%' )";
        }
        if(isset($case_decotime) && !empty($case_decotime)){
            $sdate=strtotime(substr($case_decotime,'0','10')." 00:00:00");
            $edate=strtotime(substr($case_decotime,'-10')." 23:59:59");
            $where.=" and ( h_addtime >= ".$sdate." and h_addtime <= ".$edate." ) ";
        }
        $count=Db::table('dcxw_deposit')
            ->where($where)
            ->count();
        $page= $this->request->param('page',1,'intval');
        $limit=$this->request->param('limit',10,'intval');
        $design=Db::table('dcxw_deposit')
            ->limit(($page-1)*$limit,$limit)
            ->order('dp_addtime desc')
            ->where($where)
            ->select();
        if($design){
            foreach($design as $key => $val){
                $design[$key]['dp_addtime'] = date('Y-m-d H:i:s',$val['dp_addtime']);
                $design[$key]['dp_updatetime'] = date('Y-m-d H:i:s',$val['dp_updatetime']);
                $design[$key]['dp_admin'] = $val['dp_admin'] == null? '暂未回访':Db::table('dcxw_admin')->where(['ad_id ' => $val['dp_admin']])->column('ad_realname');
            }
        }
        $res['code'] = 0;
        $res['msg'] = "";
        $res['data'] = $design;
        $res['count'] = $count;
        return json($res);
    }

    /*
     * delseek
     *
     * */
    public function delseek(){
        $dp_id=intval($_GET['dp_id']);
        $delArt=Db::table('dcxw_deposit')->where(['dp_id' => $dp_id])->delete();
        if($delArt){
            $this->success('删除成功','seek');
        }else{
            $this->error('删除失败','seek');
        }
    }


    /*
     * editseek
     * */
    public function editseek(){
        $dp_id=intval(trim($_GET['dp_id']));
        $deposit=Db::table('dcxw_deposit')->where(['dp_id' => $dp_id])->find();
        $deposit['dp_addtime']=date('Y-m-d H:i:s',$deposit['dp_addtime']);
        $this->assign('deposit',$deposit);
        return $this->fetch();
    }

    /*
     *
     * editdept
     * */
    public function editdept(){
        $dp_id=intval(trim($_GET['dp_id']));
        $data['dp_tips']=$_POST['dp_tips'];
        $data['dp_updatetime'] = time();
        $data['dp_admin'] = session('adminId');
        $update=Db::table('dcxw_deposit')->where(['dp_id' => $dp_id])->update($data);
        if($update){
            $this->success('修改成功！');
        }else{
            $this->success('修改失败！');
        }
    }



    /*
     *预约看房
     **/
    public function orders(){
        return $this->fetch();
    }

    public function orderData(){
        $where =' 1 = 1';
        $keywords = trim($this->request->param('keywords'));
        $case_decotime=trim($this->request->param('case_decotime'));
        if(isset($keywords) && !empty($keywords)){
            $where.=" and ( h_name like '%".$keywords."%' or h_b_id like '%".$keywords."%' )";
        }
        if(isset($case_decotime) && !empty($case_decotime)){
            $sdate=strtotime(substr($case_decotime,'0','10')." 00:00:00");
            $edate=strtotime(substr($case_decotime,'-10')." 23:59:59");
            $where.=" and ( h_addtime >= ".$sdate." and h_addtime <= ".$edate." ) ";
        }
        $count=Db::table('dcxw_house_order')
            ->where($where)
            ->count();
        $page= $this->request->param('page',1,'intval');
        $limit=$this->request->param('limit',10,'intval');
        $design=Db::table('dcxw_house_order')
            ->limit(($page-1)*$limit,$limit)
            ->where($where)
            ->order('ho_addtime desc')
            ->select();
        if($design){
            foreach($design as $key => $val){
                $design[$key]['ho_addtime'] = date('Y-m-d H:i:s',$val['ho_addtime']);
            }
        }
        $res['code'] = 0;
        $res['msg'] = "";
        $res['data'] = $design;
        $res['count'] = $count;
        return json($res);
    }


    public function addquiz(){
        return $this->fetch();
    }


    //通用缩略图上传接口
    public function upload()
    {
        if($this->request->isPost()){
            $res['code']=1;
            $res['msg'] = '上传成功！';
            $file = $this->request->file('file');
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/text');
            //halt( $info);
            if($info){
                $res['name'] = $info->getFilename();
                $res['filepath'] = 'uploads/text/'.$info->getSaveName();
            }else{
                $res['code'] = 0;
                $res['msg'] = '上传失败！'.$file->getError();
            }
            return $res;
        }
    }


    public function payment(){
        $b_id=trim($_GET['b_id']);
        //户主信息
        $commomModel=new Common();
        $master=Db::table('dcxw_house_master')->where(['hm_house_code' => $b_id])->find();
        if($master){
            $master['hm_addtime']=date('Y-m-d H:i:s',$master['hm_addtime']);
            $master['hm_admin']=$commomModel->getUserName($master['hm_admin']);
        }
        $this->assign('master',$master);
        //客户经理
        //客户经理姓名和电话
        $houseInfo=Db::table('dcxw_house')
            ->where(['h_b_id' => $b_id])
            ->field('h_admin')
            ->find();
        $manager=Db::table('dcxw_user')
            ->where(['u_id' => $houseInfo['h_admin']])
            ->field('u_name,u_phone,u_job')
            ->find();

        $this->assign('manager',$manager);
        //回款总数和已回款金额
        $payMoney=Db::table('dcxw_house_pay')
            ->join('dcxw_user','dcxw_user.u_id = dcxw_house_pay.hp_admin')
            ->where(['hp_house_code' => $b_id])
            ->field('dcxw_house_pay.*,dcxw_user.u_name')
            ->find();
        if($payMoney){
            $payMoney['hp_addtime']=date('Y年m月d日H时i分s秒');
            $payMoney['hp_paid_ratio']=($payMoney['hp_paid_ratio']*100)."%";
        }
        $this->assign('payMoney',$payMoney);
        //回款记录
        $payLog=Db::table('dcxw_house_pay_log')
            ->join('dcxw_user','dcxw_user.u_id = dcxw_house_pay_log.hpl_user')
            ->where(['hpl_house_code' => $b_id])
            ->order('hpl_addtime desc')
            ->limit(8)
            ->field('dcxw_house_pay_log.*,dcxw_user.u_name')
            ->select();
        foreach($payLog as $k => $v){
            $payLog[$k]['hpl_img']=explode(',',$v['hpl_img'])[0];
        }
        $count=Db::table('dcxw_house_pay_log')
            ->join('dcxw_user','dcxw_user.u_id = dcxw_house_pay_log.hpl_user')
            ->where(['hpl_house_code' => $b_id])
            ->count();
        $this->assign('count',$count);
        if($payLog){
            foreach($payLog as $k => $v){
                $payLog[$k]['hpl_addtime'] = date('Y-m-d H:i:s',$v['hpl_addtime']);
                $payLog[$k]['hpl_user']=$commomModel->getUserName($v['hpl_user']);
            }
        }
        $this->assign('payLog',$payLog);
        return $this->fetch();
    }


    //房源回款详情
    public function showdetail(){
        $hpl_id=intval(trim($_GET['hpl_id']));
        $logs=Db::table('dcxw_house_pay_log')
            ->join('dcxw_user','dcxw_user.u_id = dcxw_house_pay_log.hpl_user')
            ->where(['hpl_id' => $hpl_id])
            ->field('dcxw_house_pay_log.*,dcxw_user.u_name')
            ->find();
        $logs['hpl_addtime']=date('Y年m月d日 H时i分',$logs['hpl_addtime']);
        $logs['hpl_money']=number_format($logs['hpl_money'],2);
        $logs['hpl_img']=explode(',',$logs['hpl_img']);
        $this->assign('logs',$logs);
        return $this->fetch();
    }


    public function decorate(){
        $h_id=trim($_GET['b_id']);
        $commomModel=new Common();
        $step=Db::table('dcxw_house_decorate_status')
            ->where(['hds_house_code' => $h_id])
            ->order('hds_change_time desc')
            ->select();
        foreach ($step as $k => $v){
            $step[$k]['hds_end_statuss']=$commomModel->getStatus($v['hds_end_status']);
            $step[$k]['hds_change_time']=date('Y-m-d H:i:s',$v['hds_change_time']);
            //日志记录
            $step[$k]['decorate_log']=Db::table('dcxw_house_decorate_log')
                ->where(['hdl_status' =>$v['hds_end_status'],'hdl_house_code' =>$h_id])
                ->order('hdl_addtime desc')
                ->select();
            foreach ($step[$k]['decorate_log'] as $key =>$val){
                $step[$k]['decorate_log'][$key]['hdl_admin'] =$commomModel->getUserName($val['hdl_admin']);
            }
        }
        $this->assign('step',$step);
        $this->assign('h_id',$h_id);
        return $this->fetch();
    }



    public function declog(){
        $hdl_id=trim($_GET['hdl_id']);
        $commomModel=new Common();
        $daily=Db::table('dcxw_house_decorate_log')
            ->join('dcxw_user','dcxw_user.u_id = dcxw_house_decorate_log.hdl_admin')
            ->where(['hdl_id' => $hdl_id])
            ->field('dcxw_house_decorate_log.*,dcxw_user.u_name,dcxw_user.u_job')
            ->find();
        $daily['hdl_img']=explode(',',$daily['hdl_img']);
        $daily['hdl_addtime']=date('Y年m月d日 H时i分',$daily['hdl_addtime']);
        $houseInfo=Db::table('dcxw_house')
            ->where(['h_b_id' => $daily['hdl_house_code']])
            ->field('h_building,h_address')
            ->find();
        $this->assign('house',$houseInfo);
        $daily['hdl_status']=$commomModel->getStatus($daily['hdl_status']);
        $this->assign('logs',$daily);
        return $this->fetch();
    }


    public function rent(){
        $h_id=trim($_GET['b_id']);
        $houseInfo=Db::table('dcxw_house')
            ->where(['h_b_id' => $h_id])
            ->field('h_building,h_address,h_area,h_isable')
            ->find();
        $this->assign('house',$houseInfo);
        $this->assign('h_id',$h_id);

        return $this->fetch();
    }

    public function rentData(){
        $h_id=trim($_GET['b_id']);
        $where =' 1 = 1';
        $page= $this->request->param('page',1,'intval');
        $limit=$this->request->param('limit',15,'intval');
        $keywords=$this->request->param('keywords');
        if(isset($keywords) && !empty($keywords)){
            $where.=" and ( hr_name like '%".$keywords."%' or hr_phone like '%".$keywords."%' )";
        }
        $rentTime=$this->request->param('rent_time');
        if(isset($rentTime) && !empty($rentTime)){
            $sdate=strtotime(substr($rentTime,'0','10')." 00:00:00");
            $edate=strtotime(substr($rentTime,'-10')." 23:59:59");
            $where.=" and ( hrl_rent_time >= ".$sdate." and hrl_rent_time <= ".$edate." ) ";
        }

        $rentLog=Db::table('dcxw_house_rent_log')
            ->join('dcxw_house_rent','dcxw_house_rent_log.hrl_renter_id = dcxw_house_rent.hr_id')
            ->join('dcxw_house_rent_channel','dcxw_house_rent_channel.hrc_id = dcxw_house_rent_log.hrl_rent_channel')
            ->where(['hrl_house_code' => $h_id])
            ->limit(($page-1)*$limit,$limit)
            ->where($where)
            ->field('dcxw_house_rent_log.*,dcxw_house_rent.hr_name,dcxw_house_rent.hr_phone,dcxw_house_rent_channel.hrc_title')
            ->order('hrl_status,hrl_rent_time desc')
            ->select();
        $count=Db::table('dcxw_house_rent_log')
            ->join('dcxw_house_rent','dcxw_house_rent_log.hrl_renter_id = dcxw_house_rent.hr_id')
            ->join('dcxw_house_rent_channel','dcxw_house_rent_channel.hrc_id = dcxw_house_rent_log.hrl_rent_channel')
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
        $res['code'] = 0;
        $res['msg'] = "";
        $res['data'] = $rentLog;
        $res['count'] = $count;
        return json($res);
    }




    /*
     * 出租详情
     * */
    public function rentdetail(){
        $hrl_id=intval(trim($_GET['hrl_id']));
        //根据出租记录id找出房源编号
        $rentInfo=Db::table('dcxw_house_rent_log')
            ->join('dcxw_house_rent_channel','dcxw_house_rent_channel.hrc_id = dcxw_house_rent_log.hrl_rent_channel')
            ->where(['hrl_id' => $hrl_id])
            ->field('dcxw_house_rent_channel.hrc_title,dcxw_house_rent_log.*')
            ->find();
        $commonModel=new Common();
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
        $renter=Db::table('dcxw_house_rent')
            ->where(['hr_id' =>$renter_id])
            ->find();
        if($renter){
            $renter['hr_admin']=$commonModel->getUserName($renter['hr_admin']);
            $renter['hr_addtime']=date('Y年m月d日 H时i分',$renter['hr_addtime']);
        }
        $this->assign('renter',$renter);
        $this->assign('house',$housedata);
        return $this->fetch();
    }

    /*
     * 收款记录
     * */
    public function paylog(){
        //出租信息编号
        $h_id=intval(trim($_GET['hrl_id']));
        //房源编号；
        $rentInfo=Db::table('dcxw_house_rent_log')
            ->where(['hrl_id' => $h_id])
            ->column('hrl_house_code');
        $this->assign('h_id',$h_id);
        $this->assign('h_b_id',$rentInfo[0]);
        return $this->fetch();
    }



    public function logData(){
        $where =' 1 = 1';
        $commonModel=new Common();
        $hrl_id=$this->request->param('hrl_id');
        $page= $this->request->param('page',1,'intval');
        $limit=$this->request->param('limit',15,'intval');
        $pay_time=$this->request->param('pay_time');
        if(isset($pay_time) && !empty($pay_time)){
            $sdate=strtotime(substr($pay_time,'0','10')." 00:00:00");
            $edate=strtotime(substr($pay_time,'-10')." 23:59:59");
            $where.=" and ( hrpl_addtime >= ".$sdate." and hrpl_addtime <= ".$edate." ) ";
        }

        $payLog=Db::table('dcxw_house_rent_pay_log')
            ->join('dcxw_house_rent_log','dcxw_house_rent_log.hrl_id = dcxw_house_rent_pay_log.hrpl_rent_id')
            ->where(['hrpl_rent_id' => $hrl_id])
            ->where($where)
            ->order('hrpl_addtime desc')
            ->limit(($page-1)*$limit,$limit)
            ->field('dcxw_house_rent_pay_log.*,dcxw_house_rent_log.hrl_renter_id')
            ->select();
        $count=Db::table('dcxw_house_rent_pay_log')
            ->join('dcxw_house_rent_log','dcxw_house_rent_log.hrl_id = dcxw_house_rent_pay_log.hrpl_rent_id')
            ->where(['hrpl_rent_id' => $hrl_id])
            ->where($where)
            ->count();
        if($payLog)
        {
            foreach ($payLog as $k => $v)
            {
                $payLog[$k]['hrpl_addtime'] = date('Y-m-d H:i:s',$v['hrpl_addtime']);
                $payLog[$k]['hrpl_addtimes'] = date('Y年m月d日H时i分',$v['hrpl_addtime']);
                $payLog[$k]['hrpl_img'] = explode(',',$v['hrpl_img'])[0];
                $payLog[$k]['hrpl_rent_name'] = $commonModel->getRenterNameViaRentId($v['hrl_renter_id']);
                $payLog[$k]['hrpl_rent_phone'] = $commonModel->getRenterPhoneViaRentId($v['hrl_renter_id']);
                $payLog[$k]['hrpl_user'] = $commonModel->getUserName($v['hrpl_user']);

            }
        }
        $res['code'] = 0;
        $res['msg'] = "";
        $res['data'] = $payLog;
        $res['count'] = $count;
        return json($res);
    }






    public function paydetail(){
        $hdl_id=intval(trim($_GET['hrpl_id']));
        $commonModel=new Common();
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
        $payLog['rent_name']=$commonModel->getRenterNameViaRentId($payLog['hrl_renter_id']);
        $payLog['rent_phone']=$commonModel->getRenterPhoneViaRentId($payLog['hrl_renter_id']);
        $this->assign('payLog',$payLog);
        return $this->fetch();
    }

}