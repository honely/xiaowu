<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/11/23
 * Time: 14:19
 * Name:行政部门对于房源的分配（工程部->运营部）hat_type = 2
 */
namespace app\manager\controller;
use app\marketm\controller\Common;
use think\Controller;
use think\Db;
use think\Request;

class Allot extends Controller{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $userInfo=session('userInfo');
        if(empty($userInfo)){
            $this->redirect('marketm/login/login');
        }
    }

 public function index(){
        $userInfo=session('userInfo');
        $cityId=$userInfo['u_c_id'];
        $commModel=new Common();
        $where="1 = 1";
        if(isset($_GET['date']) && $_GET['date']){
            $date=trim($_GET['date']);
            $sdate=$date."-01 00:00:00";
            $edate=date('Y-m-d', strtotime("$sdate +1 month -1 day"))." 23:59:59";
            $stime=strtotime($sdate);
            $etime=strtotime($edate);
            $where="hat_add_time >=".$stime." and hat_add_time <=".$etime;
            $this->assign('date',$date);
        }
        //未分配待分配的
        $allocate=Db::table('dcxw_house_allocate')
            ->join('dcxw_house','dcxw_house.h_b_id = dcxw_house_allocate.hat_house_code')
            ->where(['hat_c_id' =>$cityId,'hat_is_assign' => 2,'hat_type' =>2,'h_isable' => 8])
            ->where($where)
            ->field('dcxw_house_allocate.*,dcxw_house.h_building,dcxw_house.h_area,dcxw_house.h_address')
            ->limit(8)
            ->order('hat_add_time desc')
            ->select();
        if($allocate){
            foreach ($allocate as $k =>$v){
                $allocate[$k]['decorate_money']=$commModel->getDecorateMoney($v['hat_house_code']);
                $allocate[$k]['hat_admin']=$commModel->getUserName($v['hat_admin']);
                $allocate[$k]['hat_add_time']=date('Y年m月d日 H时i分s秒',$v['hat_add_time']);
                $allocate[$k]['hat_assign_time']=date('Y年m月d日 H时i分s秒',$v['hat_assign_time']);
                $allocate[$k]['hat_assign_too']=$commModel->getUserName($v['hat_assign_to']);
                $allocate[$k]['hat_assign_to_job']=$commModel->getUserJob($v['hat_assign_to']);
                $allocate[$k]['hat_admin_job']=$commModel->getUserJob($v['hat_admin']);
                $allocate[$k]['hat_assigner_job']=$commModel->getUserJob($v['hat_assigner']);
                $allocate[$k]['hat_assigner']=$commModel->getUserName($v['hat_assigner']);
                $allocate[$k]['hat_admin']=$commModel->getUserName($v['hat_admin']);
            }
        }
        $count=Db::table('dcxw_house_allocate')
            ->join('dcxw_house','dcxw_house.h_b_id = dcxw_house_allocate.hat_house_code')
            ->where(['hat_c_id' =>$cityId,'hat_is_assign' => 2,'hat_type' =>2,'h_isable' => 8])
            ->where($where)
            ->count();
        $this->assign('count',$count);
        $this->assign('allocate',$allocate);
        return $this->fetch();
    }


    public function waitmore(){
        $userInfo=session('userInfo');
        $cityId=$userInfo['u_c_id'];
        $where='hat_c_id = '.$cityId;
        if($_POST){
            $page=intval(trim($_POST['page']));
            if($_POST['date'] && isset($_POST['date'])){
                $date=trim($_POST['date']);
                $sdate=$date."-01 00:00:00";
                $edate=date('Y-m-d', strtotime("$sdate +1 month -1 day"))." 23:59:59";
                $stime=strtotime($sdate);
                $etime=strtotime($edate);
                $where.=" and (hat_add_time >=".$stime." and hat_add_time <=".$etime.")";
                $this->assign('date',$date);
            }
        }else{
            $page=1;
        }
        $limit=8;
        $allocate=Db::table('dcxw_house_allocate')
            ->join('dcxw_house','dcxw_house.h_b_id = dcxw_house_allocate.hat_house_code')
            ->where(['hat_is_assign' => 2,'hat_type' =>2])
            ->where($where)
            ->field('dcxw_house_allocate.*,dcxw_house.h_building,dcxw_house.h_area,dcxw_house.h_address')
            ->order('hat_add_time desc')
            ->limit(($page-1)*$limit,$limit)
            ->select();
        $commModel=new Common();
        if($allocate){
            foreach ($allocate as $k =>$v){
                $allocate[$k]['decorate_money']=$commModel->getDecorateMoney($v['hat_house_code']);
                $allocate[$k]['hat_admin']=$commModel->getUserName($v['hat_admin']);
                $allocate[$k]['hat_add_time']=date('Y年m月d日 H时i分s秒',$v['hat_add_time']);
                $allocate[$k]['hat_assign_time']=date('Y年m月d日 H时i分s秒',$v['hat_assign_time']);
                $allocate[$k]['hat_assign_too']=$commModel->getUserName($v['hat_assign_to']);
                $allocate[$k]['hat_assign_to_job']=$commModel->getUserJob($v['hat_assign_to']);
                $allocate[$k]['hat_admin_job']=$commModel->getUserJob($v['hat_admin']);
                $allocate[$k]['hat_assigner_job']=$commModel->getUserJob($v['hat_assigner']);
                $allocate[$k]['hat_assigner']=$commModel->getUserName($v['hat_assigner']);
                $allocate[$k]['hat_admin']=$commModel->getUserName($v['hat_admin']);
            }
        }
        if($allocate){
            $this->success('更多完成','',$allocate);
        }else{
            $this->error('更多失败','',$allocate);
        }
    }


    public function allocated(){
        $userInfo=session('userInfo');
        $cityId=$userInfo['u_c_id'];
        $commModel=new Common();
        $where="1 = 1";
        if(isset($_GET['date']) && $_GET['date']){
            $date=trim($_GET['date']);
            $sdate=$date."-01 00:00:00";
            $edate=date('Y-m-d', strtotime("$sdate +1 month -1 day"))." 23:59:59";
            $stime=strtotime($sdate);
            $etime=strtotime($edate);
            $where="hat_add_time >=".$stime." and hat_add_time <=".$etime;
            $this->assign('date',$date);
        }
        //未分配待分配的
        $allocate=Db::table('dcxw_house_allocate')
            ->join('dcxw_house','dcxw_house.h_b_id = dcxw_house_allocate.hat_house_code')
            ->where(['hat_c_id' =>$cityId,'hat_is_assign' => 1,'hat_type' =>2])
            ->where($where)
            ->field('dcxw_house_allocate.*,dcxw_house.h_building,dcxw_house.h_area,dcxw_house.h_address')
            ->limit(8)
            ->order('hat_add_time desc')
            ->select();
        if($allocate){
            foreach ($allocate as $k =>$v){
                $allocate[$k]['decorate_money']=$commModel->getDecorateMoney($v['hat_house_code']);
                $allocate[$k]['hat_admin']=$commModel->getUserName($v['hat_admin']);
                $allocate[$k]['hat_add_time']=date('Y年m月d日 H时i分s秒',$v['hat_add_time']);
                $allocate[$k]['hat_assign_time']=date('Y年m月d日 H时i分s秒',$v['hat_assign_time']);
                $allocate[$k]['hat_assign_too']=$commModel->getUserName($v['hat_assign_to']);
                $allocate[$k]['hat_assign_to_job']=$commModel->getUserJob($v['hat_assign_to']);
                $allocate[$k]['hat_admin_job']=$commModel->getUserJob($v['hat_admin']);
                $allocate[$k]['hat_assigner_job']=$commModel->getUserJob($v['hat_assigner']);
                $allocate[$k]['hat_assigner']=$commModel->getUserName($v['hat_assigner']);
                $allocate[$k]['hat_admin']=$commModel->getUserName($v['hat_admin']);
            }
        }
        $count=Db::table('dcxw_house_allocate')
            ->join('dcxw_house','dcxw_house.h_b_id = dcxw_house_allocate.hat_house_code')
            ->where(['hat_c_id' =>$cityId,'hat_is_assign' => 1,'hat_type' =>2])
            ->where($where)
            ->count();
        $this->assign('count',$count);
        $this->assign('allocate',$allocate);
        return $this->fetch();
    }


    public function allomore(){
        $userInfo=session('userInfo');
        $cityId=$userInfo['u_c_id'];
        $where='hat_c_id = '.$cityId;
        if($_POST){
            $page=intval(trim($_POST['page']));
            if($_POST['date'] && isset($_POST['date'])){
                $date=trim($_POST['date']);
                $sdate=$date."-01 00:00:00";
                $edate=date('Y-m-d', strtotime("$sdate +1 month -1 day"))." 23:59:59";
                $stime=strtotime($sdate);
                $etime=strtotime($edate);
                $where.=" and (hat_add_time >=".$stime." and hat_add_time <=".$etime.")";
                $this->assign('date',$date);
            }
        }else{
            $page=1;
        }
        $limit=8;
        $allocate=Db::table('dcxw_house_allocate')
            ->join('dcxw_house','dcxw_house.h_b_id = dcxw_house_allocate.hat_house_code')
            ->where(['hat_is_assign' => 1,'hat_type' =>2])
            ->where($where)
            ->field('dcxw_house_allocate.*,dcxw_house.h_building,dcxw_house.h_area,dcxw_house.h_address')
            ->order('hat_add_time desc')
            ->limit(($page-1)*$limit,$limit)
            ->select();
        $commModel=new Common();
        if($allocate){
            foreach ($allocate as $k =>$v){
                $allocate[$k]['decorate_money']=$commModel->getDecorateMoney($v['hat_house_code']);
                $allocate[$k]['hat_admin']=$commModel->getUserName($v['hat_admin']);
                $allocate[$k]['hat_add_time']=date('Y年m月d日 H时i分s秒',$v['hat_add_time']);
                $allocate[$k]['hat_assign_time']=date('Y年m月d日 H时i分s秒',$v['hat_assign_time']);
                $allocate[$k]['hat_assign_too']=$commModel->getUserName($v['hat_assign_to']);
                $allocate[$k]['hat_assign_to_job']=$commModel->getUserJob($v['hat_assign_to']);
                $allocate[$k]['hat_admin_job']=$commModel->getUserJob($v['hat_admin']);
                $allocate[$k]['hat_assigner_job']=$commModel->getUserJob($v['hat_assigner']);
                $allocate[$k]['hat_assigner']=$commModel->getUserName($v['hat_assigner']);
                $allocate[$k]['hat_admin']=$commModel->getUserName($v['hat_admin']);
            }
        }
        if($allocate){
            $this->success('更多完成','',$allocate);
        }else{
            $this->error('更多失败','',$allocate);
        }
    }


    public function all(){
        $userInfo=session('userInfo');
        $cityId=$userInfo['u_c_id'];
        $commModel=new Common();
        $where="1 = 1";
        if(isset($_GET['date']) && $_GET['date']){
            $date=trim($_GET['date']);
            $sdate=$date."-01 00:00:00";
            $edate=date('Y-m-d', strtotime("$sdate +1 month -1 day"))." 23:59:59";
            $stime=strtotime($sdate);
            $etime=strtotime($edate);
            $where="hat_add_time >=".$stime." and hat_add_time <=".$etime;
            $this->assign('date',$date);
        }
        $allocate=Db::table('dcxw_house_allocate')
            ->join('dcxw_house','dcxw_house.h_b_id = dcxw_house_allocate.hat_house_code')
            ->where(['hat_c_id' =>$cityId,'hat_type' =>2])
            ->where($where)
            ->limit(8)
            ->field('dcxw_house_allocate.*,dcxw_house.h_building,dcxw_house.h_area,dcxw_house.h_address')
            ->order('hat_is_assign desc,hat_add_time desc')
            ->select();
        if($allocate){
            foreach ($allocate as $k =>$v){
                $allocate[$k]['decorate_money']=$commModel->getDecorateMoney($v['hat_house_code']);
                $allocate[$k]['hat_admin']=$commModel->getUserName($v['hat_admin']);
                $allocate[$k]['hat_add_time']=date('Y年m月d日 H时i分s秒',$v['hat_add_time']);
                $allocate[$k]['hat_assign_time']=date('Y年m月d日 H时i分s秒',$v['hat_assign_time']);
                $allocate[$k]['hat_assign_too']=$commModel->getUserName($v['hat_assign_to']);
                $allocate[$k]['hat_assign_to_job']=$commModel->getUserJob($v['hat_assign_to']);
                $allocate[$k]['hat_admin_job']=$commModel->getUserJob($v['hat_admin']);
                $allocate[$k]['hat_assigner_job']=$commModel->getUserJob($v['hat_assigner']);
                $allocate[$k]['hat_assigner']=$commModel->getUserName($v['hat_assigner']);
                $allocate[$k]['hat_admin']=$commModel->getUserName($v['hat_admin']);
            }
        }
        $count=Db::table('dcxw_house_allocate')
            ->join('dcxw_house','dcxw_house.h_b_id = dcxw_house_allocate.hat_house_code')
            ->where(['hat_c_id' =>$cityId,'hat_type' =>2])
            ->where($where)
            ->count();
        $this->assign('count',$count);
        $this->assign('allocate',$allocate);
        return $this->fetch();
    }
    public function allmore(){
        $userInfo=session('userInfo');
        $cityId=$userInfo['u_c_id'];
        $where='hat_c_id = '.$cityId;
        if($_POST){
            $page=intval(trim($_POST['page']));
            if($_POST['date'] && isset($_POST['date'])){
                $date=trim($_POST['date']);
                $sdate=$date."-01 00:00:00";
                $edate=date('Y-m-d', strtotime("$sdate +1 month -1 day"))." 23:59:59";
                $stime=strtotime($sdate);
                $etime=strtotime($edate);
                $where.=" and (hat_add_time >=".$stime." and hat_add_time <=".$etime.")";
                $this->assign('date',$date);
            }
        }else{
            $page=1;
        }
        $limit=8;
        $allocate=Db::table('dcxw_house_allocate')
            ->join('dcxw_house','dcxw_house.h_b_id = dcxw_house_allocate.hat_house_code')
            ->where($where)
            ->where(['hat_type' =>2])
            ->field('dcxw_house_allocate.*,dcxw_house.h_building,dcxw_house.h_area,dcxw_house.h_address')
            ->order('hat_is_assign desc,hat_add_time desc')
            ->limit(($page-1)*$limit,$limit)
            ->select();
        $commModel=new Common();
        if($allocate){
            foreach ($allocate as $k =>$v){
                $allocate[$k]['decorate_money']=$commModel->getDecorateMoney($v['hat_house_code']);
                $allocate[$k]['hat_admin']=$commModel->getUserName($v['hat_admin']);
                $allocate[$k]['hat_add_time']=date('Y年m月d日 H时i分s秒',$v['hat_add_time']);
                $allocate[$k]['hat_assign_time']=date('Y年m月d日 H时i分s秒',$v['hat_assign_time']);
                $allocate[$k]['hat_assign_too']=$commModel->getUserName($v['hat_assign_to']);
                $allocate[$k]['hat_assign_to_job']=$commModel->getUserJob($v['hat_assign_to']);
                $allocate[$k]['hat_admin_job']=$commModel->getUserJob($v['hat_admin']);
                $allocate[$k]['hat_assigner_job']=$commModel->getUserJob($v['hat_assigner']);
                $allocate[$k]['hat_assigner']=$commModel->getUserName($v['hat_assigner']);
                $allocate[$k]['hat_admin']=$commModel->getUserName($v['hat_admin']);
            }
        }
        if($allocate){
            $this->success('更多完成','',$allocate);
        }else{
            $this->error('更多失败','',$allocate);
        }
    }


    /*
     * 房源详情
     * */
    public function details(){
        $h_id=trim($_GET['h_id']);
        //房屋基本信息
        $house=Db::table('dcxw_house')
            ->where(['h_b_id' => $h_id])
            ->find();
        $commodel=new Common();
        if($house){
            $house['h_house_type']=$commodel->getHouseTypeNameByTypeId($house['h_house_type']);
            $house['h_head']=$commodel->houseHead($house['h_head']);
        }
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
            $attach['ha_decorate_permit']=date("Y-m-d",$attach['ha_decorate_permit']);
            $attach['ha_contact_img']=explode(',',$attach['ha_contact_img']);
        }
        $this->assign('attach',$attach);
        return $this->fetch();
    }



    /*
     * 分配页面
     * */
    public function allocate(){
        $hat_id=intval(trim($_GET['hat_id']));
        $commonModel=new Common();
        $allocate=Db::table('dcxw_house_allocate')
            ->join('dcxw_house','dcxw_house.h_b_id = dcxw_house_allocate.hat_house_code')
            ->where(['hat_id' =>$hat_id,'hat_type' =>2])
            ->field('dcxw_house_allocate.*,dcxw_house.h_building,dcxw_house.h_area,dcxw_house.h_address')
            ->find();
        if($allocate){
            $allocate['hat_add_time']=date('Y-m-d H:i:s',$allocate['hat_add_time']);
            $allocate['hat_assigner']=$commonModel->getUserName($allocate['hat_assigner']);
            $allocate['hat_admin']=$commonModel->getUserName($allocate['hat_admin']);
        }
        $this->assign('allocate',$allocate);
        $userInfo=session('userInfo');
        $cityId=$userInfo['u_c_id'];
        $admins=Db::table('dcxw_user')
            ->where(['u_c_id' =>$cityId,'u_depart_id'=>3])
            ->field('u_id,u_name')
            ->order('u_addtime desc')
            ->select();
        $this->assign('admins',$admins);
        return $this->fetch();
    }



    public function assigned(){
        if($_POST){
            $userInfo=session('userInfo');
            $hat_id=intval(trim($_POST['hat_id']));
            $data['hat_assign_to']=intval(trim($_POST['hat_assign_to']));
            $data['hat_assign_tips']=trim($_POST['hat_assign_tips']);
            $data['hat_assign_time']=time();
            $data['hat_is_assign']=1;
            $data['hat_assigner']=$userInfo['u_id'];
            //1.更新分配表信息
            $assign=Db::table('dcxw_house_allocate')->where(['hat_id' => $hat_id])->update($data);
            //2.更新房源信息状态表
            $allocate=Db::table('dcxw_house_allocate')->where(['hat_id' => $hat_id])->find();
            $updateStatus=Db::table('dcxw_house')->where(['h_b_id' => $allocate['hat_house_code']])->update(['h_isable' => 3]);
            if($assign && $updateStatus){
                $this->success('分配成功！','','');
            }else{
                $this->assign('分配失败！');
            }
        }
    }



    public function alldetails(){
        $hat_id=intval(trim($_GET['hat_id']));
        $hatInfo=Db::table('dcxw_house_allocate')
            ->join('dcxw_house','dcxw_house.h_b_id = dcxw_house_allocate.hat_house_code')
            ->where(['hat_id' => $hat_id])
            ->field('dcxw_house_allocate.*,dcxw_house.h_building,dcxw_house.h_area,dcxw_house.h_address')
            ->find();
        $commonModel=new Common();
        if($hatInfo){
            $hatInfo['hat_assign_too']=$commonModel->getUserName($hatInfo['hat_assign_to']);
            $hatInfo['hat_assign_to_job']=$commonModel->getUserJob($hatInfo['hat_assign_to']);
            $hatInfo['hat_assigner']=$commonModel->getUserName($hatInfo['hat_assigner']);
            $hatInfo['hat_admin']=$commonModel->getUserName($hatInfo['hat_admin']);
            $hatInfo['hat_assign_time']=date('Y-m-d H:i:s',$hatInfo['hat_assign_time']);
            $hatInfo['hat_add_time']=date('Y-m-d H:i:s',$hatInfo['hat_add_time']);
            $hatInfo['decorate_money']=$commonModel->getDecorateMoney($hatInfo['hat_house_code']);
        }
        $this->assign('hatInfo',$hatInfo);
        return $this->fetch();
    }
}