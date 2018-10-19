<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/10/9
 * Time: 16:31
 * Name: Controller
 */
namespace app\market\controller;
use think\Controller;
use think\Db;
use think\Request;

class House extends Controller{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $userInfo=session('userInfo');
        if(!empty($userInfo)){
            $this->assign('userInfo',$userInfo);
        }
    }

    public function index(){
        return $this->fetch();
    }


    /*
     * 房源数据
     * */
    public function houseData(){
        $where =' 1 = 1';
        $keywords = trim($this->request->param('keywords'));
        $case_admin = intval(trim($this->request->param('case_admin')));
        $case_decotime=trim($this->request->param('case_decotime'));
        if(isset($keywords) && !empty($keywords)){
            $where.=" and ( h_name like '%".$keywords."%' or h_b_id like '%".$keywords."%' )";
        }
        if(isset($case_admin) && !empty($case_admin)){
            $where.=" and dec_admin = ".$case_admin;
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
            ->join('dcxw_user','dcxw_user.u_id = dcxw_house.h_admin')
            ->where($where)
            ->count();
        $page= $this->request->param('page',1,'intval');
        $limit=$this->request->param('limit',10,'intval');
        $design=Db::table('dcxw_house')
            ->join('dcxw_province','dcxw_province.p_id = dcxw_house.h_p_id')
            ->join('dcxw_city','dcxw_city.c_id = dcxw_house.h_c_id')
            ->join('dcxw_area','dcxw_area.area_id = dcxw_house.h_a_id')
            ->join('dcxw_user','dcxw_user.u_id = dcxw_house.h_admin')
            ->limit(($page-1)*$limit,$limit)
            ->order('h_istop asc,h_isable,h_view desc')
            ->where($where)
            ->select();
        if($design){
            foreach($design as $key => $val){
                $design[$key]['h_addtime'] = date('Y-m-d H:i:s',$val['h_addtime']);
                $design[$key]['c_name'] = $val['c_name']."-".$val['area_name'];
//                $payInfo=Db::table('dcxw_house_pay')->where(['hp_house_code' =>$val['h_b_id']])->column('hp_paid_ratio');
//                $design[$key]['paid_ratio']=($payInfo[0]*100)."%";
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
        $userInfo=session('userInfo');
        if($_POST){
            $data=$_POST;
            $stime=strtotime(date('Y-m-d 00:00:00'));
            $etime=strtotime(date('Y-m-d 23:59:59'));
            //获取当日预约的数量
            $buNum=Db::table('dcxw_house')->where('h_addtime','between',[$stime,$etime])->count();
            //生成用户编号；
            $data['h_b_id'] = date('Ymd').sprintf("%04d", $buNum+1);
            $data['h_addtime']=time();
            $data['h_admin'] = $userInfo['u_id'];
            $add=Db::table('dcxw_house')->insert($data);
            if($add){
                return  json(['code' => '1','msg' => '发布成功！','data' => $_POST]);
            }else{
                return  json(['code' => '2','msg' => '发布失败！','data' => $_POST]);
            }
        }else{
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
     * 户主信息
     * */

    public function master(){
        $userInfo=session('userInfo');
        $h_id=trim($_GET['h_id']);
        if($_POST){
            $master=Db::table('dcxw_house_master')
                ->where(['hm_house_code' => $h_id])
                ->find();
            //若有信息是修改，没有信息是添加
            if($master){
                $data=$_POST;
                $data['hm_addtime']=time();
                $data['hm_house_code']=$h_id;
                $data['hm_admin']=$userInfo['u_id'];
                $update=Db::table('dcxw_house_master')
                    ->where(['hm_house_code' => $h_id])
                    ->update($data);
                if($update){
                    $this->success('修改成功！','',$master);
                }else{
                    $this->error('修改失败！','',$master);
                }
            }else{
                $data=$_POST;
                $data['hm_addtime']=time();
                $data['hm_admin']=$userInfo['u_id'];
                $add=Db::table('dcxw_house_master')->insert($data);
                if($add){
                    $this->success('添加成功！');
                }else{
                    $this->error('添加失败！');
                }
            }
        }else{
            $master=Db::table('dcxw_house_master')
                ->where(['hm_house_code' => $h_id])
                ->find();
            if($master){
                $master['hm_addtime']=date('Y-m-d H:i:s',$master['hm_addtime']);
                $masterArr=Db::table('dcxw_user')
                    ->where(['u_id' => $master['hm_admin']])
                    ->column('u_name');
                $master['hm_admin']=$masterArr[0];
            }
        }
        $this->assign('h_b_id',$h_id);
        $this->assign('master',$master);
        return $this->fetch();
    }




    /*
     * 回款记录
     * */
    public function paylog(){
        $userInfo=session('userInfo');
        $h_id=trim($_GET['h_id']);
        if($_POST){
            $master=Db::table('dcxw_house_master')
                ->where(['hm_house_code' => $h_id])
                ->find();
            //若有信息是修改，没有信息是添加
            if($master){
                $data=$_POST;
                $data['hm_addtime']=time();
                $data['hm_house_code']=$h_id;
                $data['hm_admin']=$userInfo['u_id'];
                $update=Db::table('dcxw_house_master')
                    ->where(['hm_house_code' => $h_id])
                    ->update($data);
                if($update){
                    $this->success('修改成功！','',$master);
                }else{
                    $this->error('修改失败！','',$master);
                }
            }else{
                $data=$_POST;
                $data['hm_addtime']=time();
                $data['hm_admin']=$userInfo['u_id'];
                $add=Db::table('dcxw_house_master')->insert($data);
                if($add){
                    $this->success('添加成功！');
                }else{
                    $this->error('添加失败！');
                }
            }
        }else{
            //户主的姓名和电话
            $master=Db::table('dcxw_house_master')
                ->where(['hm_house_code' => $h_id])
                ->field('hm_name,hm_phone')
                ->find();
            $this->assign('master',$master);
            //客户经理姓名和电话
            $houseInfo=Db::table('dcxw_house')
                ->where(['h_b_id' => $h_id])
                ->field('h_admin')
                ->find();
            $manager=Db::table('dcxw_user')
                ->where(['u_id' => $houseInfo['h_admin']])
                ->field('u_name,u_phone')
                ->find();
            $this->assign('manager',$manager);
            //回款总数和已回款金额
            $payMoney=Db::table('dcxw_house_pay')
                ->join('dcxw_user','dcxw_user.u_id = dcxw_house_pay.hp_admin')
                ->where(['hp_house_code' => $h_id])
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
                ->where(['hpl_house_code' => $h_id])
                ->order('hpl_addtime desc')
                ->field('dcxw_house_pay_log.*,dcxw_user.u_name')
                ->select();
            if($payLog){
                foreach($payLog as $k => $v){
                    $payLog[$k]['hpl_addtime'] = date('Y-m-d H:i:s',$v['hpl_addtime']);
                }
            }
            $this->assign('payLog',$payLog);
        }
        $this->assign('h_b_id',$h_id);
        return $this->fetch();
    }

    /*
     * 添加装修款
     * */
    public function addpay(){
        $userInfo=session('userInfo');
        if($_POST){
            $data=$_POST;
            $data['hp_addtime']=time();
            $data['hp_paid']=0;
            $data['hp_will_pay']=$_POST['hp_money'];
            $data['hp_admin'] = $userInfo['u_id'];
            $house_code=$_POST['hp_house_code'];
            $money=$_POST['hp_money'];
            $addPay=Db::table('dcxw_house_pay')->insert($data);
            if($addPay){
                //更新房屋信息表里的装修款
                $update=Db::table('dcxw_house')
                    ->where(['h_b_id' => $house_code])
                    ->update(['h_money' => $money]);
                if($update){
                    $this->success('添加成功!');
                }else{
                    $this->error('添加失败！');
                }
            }
        }
    }



    /*
     * details
     * */
    public function details(){
        $hl_id=intval(trim($_GET['h_id']));
        $logs=Db::table('dcxw_house_pay_log')->where(['hpl_id' => $hl_id])->find();
        $this->assign('logs',$logs);
        return $this->fetch();
    }



    /*
     * 添加装修款
     *
     * */
    public function addpaylog(){
        $h_id=trim($_GET['h_id']);
        $pays=Db::table('dcxw_house_pay')->where(['hp_house_code' => $h_id])->find();
        $this->assign('pays',$pays);
        $this->assign('h_id',$h_id);
        return $this->fetch();
    }

    public function addpaylogpro(){
        $userInfo=session('userInfo');
        if($_POST){
            $data=$_POST;
            $data['hpl_addtime']=time();
            $data['hpl_user']=$userInfo['u_id'];
            $money=$_POST['hpl_money'];
            $house_code=$_POST['hpl_house_code'];
            //添加打款记录
            $addLog=Db::table('dcxw_house_pay_log')->insert($data);
            if($addLog){
                //变更回款信息表数据
                //1.增加收款金额，
                $paidInc=Db::table('dcxw_house_pay')
                    ->where(['hp_house_code' => $house_code])
                    ->setInc('hp_paid',$money);
                //2.减少未收款金额
                $willDec=Db::table('dcxw_house_pay')
                    ->where(['hp_house_code' => $house_code])
                    ->setDec('hp_will_pay',$money);
                //计算回款比率，比率入库
                $paidInfo=Db::table('dcxw_house_pay')
                    ->where(['hp_house_code' => $house_code])
                    ->find();
                $paidRatio=round($paidInfo['hp_paid']/$paidInfo['hp_money'],4);
                //更新回款比率
                $updateRatio=Db::table('dcxw_house_pay')
                    ->where(['hp_house_code' => $house_code])
                    ->update(['hp_paid_ratio' =>$paidRatio]);
                if($paidInc && $willDec && $updateRatio){
                    $this->success('添加成功！');
                }else{
                    $this->error('添加失败！');
                }
            }
        }
    }






    /*
     * 房屋附属品
     * */
    public function attachment(){

        $userInfo=session('userInfo');
        $h_id=trim($_GET['h_id']);
        if($_POST){
            $attach=Db::table('dcxw_house_attachment')
                ->where(['ha_house_code' => $h_id])
                ->find();
            //若有信息是修改，没有信息是添加
            if($attach){
                $data=$_POST;
                $data['ha_deadline']=strtotime($data['ha_deadline']."12:12:12");
                $data['ha_addtime']=time();
                $data['ha_house_code']=$h_id;
                $data['ha_user']=$userInfo['u_id'];
                $update=Db::table('dcxw_house_attachment')
                    ->where(['ha_house_code' => $h_id])
                    ->update($data);
                if($update){
                    $this->success('修改成功！','',$attach);
                }else{
                    $this->error('修改失败！','',$attach);
                }
            }else{
                $data=$_POST;
                $data['ha_addtime']=time();
                $data['ha_deadline']=strtotime($data['ha_deadline']."12:12:12");
                $data['ha_user']=$userInfo['u_id'];
                $add=Db::table('dcxw_house_attachment')->insert($data);
                if($add){
                    $this->success('添加成功！');
                }else{
                    $this->error('添加失败！');
                }
            }
        }else{
            $attach=Db::table('dcxw_house_attachment')
                ->where(['ha_house_code' => $h_id])
                ->find();
            if($attach){
                $attach['ha_deadline']=date('Y-m-d',$attach['ha_deadline']);
                $attach['ha_addtime']=date('Y-m-d H:i:s',$attach['ha_addtime']);
                $masterArr=Db::table('dcxw_user')
                    ->where(['u_id' => $attach['ha_user']])
                    ->column('u_name');
                $attach['ha_user']=$masterArr[0];
            }
        }
        $this->assign('attach',$attach);
        $this->assign('h_id',$h_id);
        return $this->fetch();
    }






    /*
     * 房源预览
     * */
    public function preview(){
        $h_id=trim($_GET['h_id']);
        //房源信息
        $house=Db::table('dcxw_house')
            ->where(['h_b_id' => $h_id])
            ->find();
        $house['h_addtime']=date('Y-m-d H:i:s');
        $this->assign('house',$house);
        //房主信息
        $master=Db::table('dcxw_house_master')
            ->where(['hm_house_code' => $h_id])
            ->find();
        $this->assign('master',$master);
        //客户经理
        $manager=Db::table('dcxw_user')
            ->where(['u_id' => $house['h_admin']])
            ->find();
        $this->assign('manager',$manager);
        //回款信息
        //1.总回款情况；
        $payMoney=Db::table('dcxw_house_pay')
            ->where(['hp_house_code' => $h_id])
            ->find();
        $payMoney['hp_paid_ratio']=($payMoney['hp_paid_ratio']*100)."%";
        $this->assign('payMoney',$payMoney);
        //2.回款记录；
        //回款记录
        $payLog=Db::table('dcxw_house_pay_log')
            ->join('dcxw_user','dcxw_user.u_id = dcxw_house_pay_log.hpl_user')
            ->where(['hpl_house_code' => $h_id])
            ->order('hpl_addtime desc')
            ->field('dcxw_house_pay_log.*,dcxw_user.u_name')
            ->select();
        if($payLog){
            foreach($payLog as $k => $v){
                $payLog[$k]['hpl_addtime'] = date('Y-m-d H:i:s',$v['hpl_addtime']);
            }
        }
        $this->assign('payLog',$payLog);
        $this->assign('payLog',$payLog);
        return $this->fetch();
    }

}