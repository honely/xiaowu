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
use app\marketm\model\Commons;
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
            ->where(['hat_c_id' =>$cityId,'hat_is_assign' => 2,'hat_type' =>2,'h_isable' => 8,'hat_ishow' =>1])
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
            ->where(['hat_c_id' =>$cityId,'hat_is_assign' => 2,'hat_type' =>2,'h_isable' => 8,'hat_ishow' =>1])
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
            ->where(['hat_is_assign' => 2,'hat_type' =>2,'hat_ishow' =>1])
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
            ->where(['hat_c_id' =>$cityId,'hat_is_assign' => 1,'hat_type' =>2,'hat_ishow' =>1])
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
            ->where(['hat_c_id' =>$cityId,'hat_is_assign' => 1,'hat_type' =>2,'hat_ishow' =>1])
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
            ->where(['hat_is_assign' => 1,'hat_type' =>2,'hat_ishow' =>1])
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
            ->where(['hat_c_id' =>$cityId,'hat_type' =>2,'hat_ishow' =>1])
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
            ->where(['hat_c_id' =>$cityId,'hat_type' =>2,'hat_ishow' =>1])
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
            ->where(['hat_type' =>2,'hat_ishow' =>1])
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
        $type=trim($_GET['type']);
        $this->assign('type',$type);
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
            if($attach['ha_contact_img']){
                $attach['ha_contact_imgs']=explode(',',$attach['ha_contact_img']);
                $attach['ha_contact_img_first']=explode(',',$attach['ha_contact_img'])[0];
                if(count($attach['ha_contact_imgs']) >=1){
                    unset($attach['ha_contact_imgs'][0]);
                }
            }
            $attach['ha_elect_type']=$commodel->getElectTypeName($attach['ha_elect_type']);
            $attach['ha_warm_type']=$commodel->getWarmTypeName($attach['ha_warm_type']);
            $attach['ha_wuye_fee_type']=$commodel->getWuYeFeeTypeName($attach['ha_wuye_fee_type']);
        }
        $this->assign('attach',$attach);
        return $this->fetch();
    }



    /*
     * 分配页面
     * */
    public function allocate(){
        $hat_id=intval(trim($_GET['hat_id']));
        $type=trim($_GET['type']);
        $this->assign('type',$type);
        $commonModel=new Common();
        $allocate=Db::table('dcxw_house_allocate')
            ->join('dcxw_house','dcxw_house.h_b_id = dcxw_house_allocate.hat_house_code')
            ->where(['hat_id' =>$hat_id,'hat_type' =>2,'hat_ishow' =>1])
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



    /*
     * 接受转接
     * */
    public function assigned(){
        $post=Request::instance()->post();
        if($post){
            $userInfo=session('userInfo');
            $hat_id=intval(trim($post['hat_id']));
            $hat_is_msg=intval(trim($post['hat_is_msg']));
            $data['hat_is_msg']=$hat_is_msg;
            $data['hat_assign_to']=intval(trim($post['hat_assign_to']));
            $data['hat_assign_tips']=trim($post['hat_assign_tips']);
            $data['hat_assign_time']=time();
            $data['hat_is_assign']=1;
            $data['hat_assigner']=$userInfo['u_id'];
            //1.更新分配表信息
            $assign=Db::table('dcxw_house_allocate')->where(['hat_id' => $hat_id])->update($data);
            //2.更新房源信息状态表
            $allocate=Db::table('dcxw_house_allocate')->where(['hat_id' => $hat_id])->find();
            $updateStatus=Db::table('dcxw_house')->where(['h_b_id' => $allocate['hat_house_code']])->update(['h_isable' => 3]);
            $adminid=intval(trim($post['hat_assign_to']));
            $commonModel=new Common();
            $adminInfo['u_name']=$commonModel->getUserName($adminid);
            $adminInfo['u_phone']=$commonModel->getUserPhone($adminid);
            if($hat_is_msg == 1){
                $sendMsg=$commonModel->sendMsg($adminInfo);
                if( $assign && $updateStatus && !empty($sendMsg) && $sendMsg == 1){
                    $this->success('转交成功！短信已发送。');
                }else{
                    $this->error('转交失败！');
                }
            }else{
                if($assign && $updateStatus){
                    $this->success('分配成功！','','');
                }else{
                    $this->assign('分配失败！');
                }
            }
        }
    }




    public function refuse(){
        $post=Request::instance()->post();
        $userInfo=session('userInfo');
        if($post){
            $hat_id=intval(trim($post['hat_id']));
            //更新显示
            $update=Db::table('dcxw_house_allocate')->where(['hat_id' => $hat_id])->update(['hat_ishow' => 2]);
            $hat_refuse_tips=trim($post['hat_refuse_tips']);
            $ris_msg=intval(trim($post['ris_msg']));
            $hatInfo=Db::table('dcxw_house_allocate')
                ->where(['hat_type' =>2,'hat_id' => $hat_id])
                ->field(['hat_house_code,hat_admin'])
                ->find();
            //房源编号
            $house_code=$hatInfo['hat_house_code'];
            //1.更新主表房源状态改为2，装修中
            $house=Db::table('dcxw_house')->where(['h_b_id' =>$house_code])->update(['h_isable' => 2]);
            //2.更新装修表状态；
            $decorate=Db::table('dcxw_house_decorate')
                ->where(['hd_house_code' => $house_code])
                ->update(['hd_status' => 7]);
            //3.装修状态表变更记录
            $data['hds_house_code'] = $house_code;
            $data['hds_start_status'] = 6;
            $data['hds_end_status'] = 7;
            $data['hds_change_time'] = time();
            $data['hds_change_tips'] = $hat_refuse_tips;
            $data['hds_user_id'] = $userInfo['u_id'];
            $status=Db::table('dcxw_house_decorate_status')->insert($data);
            $log['hdl_house_code'] = $house_code;
            $log['hdl_title'] = '运营部拒绝接受';
            $log['hdl_status'] = 7;
            $log['hdl_addtime'] = time();
            $log['hdl_content'] = $hat_refuse_tips;
            $log['hdl_admin'] = $userInfo['u_id'];
            $decLog=Db::table('dcxw_house_decorate_log')->insert($log);
            if($ris_msg == 1){
                $adminid=$hatInfo['hat_admin'];
                $commonModel=new Common();
                $adminInfo['u_name']=$commonModel->getUserName($adminid);
                $adminInfo['u_phone']=$commonModel->getUserPhone($adminid);
                //发送短信
                $sendMsg=$commonModel->sendMsg($adminInfo);
                if( $status && $decLog && $update && $decorate && $house && !empty($sendMsg) && $sendMsg == 1){
                    $this->success('转交成功！短信已发送。');
                }else{
                    $this->error('转交失败！');
                }
            }else{
                if( $status && $decLog && $update && $decorate && $house){
                    $this->success('转交成功！');
                }else{
                    $this->error('转交失败！');
                }
            }
        }
    }



    public function alldetails(){
        $hat_id=intval(trim($_GET['hat_id']));
        $type=trim($_GET['type']);
        $this->assign('type',$type);
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



    public function declog(){
        $h_id=trim($_GET['h_id']);
        $type=trim($_GET['type']);
        $this->assign('type',$type);
        $commomModel=new Common();
        $step=Db::table('dcxw_house_decorate_status')
            ->distinct(true)
            ->where(['hds_house_code' => $h_id])
            ->order('hds_change_time desc')
            ->field('dcxw_house_decorate_status.*')
            ->select();
        foreach ($step as $k => $v){
            $step[$k]['hds_end_statuss']=$commomModel->getStatus($v['hds_end_status']);
            $step[$k]['hds_change_time']=date('Y-m-d H:i:s',$v['hds_change_time']);
            //日志记录
            $step[$k]['decorate_log']=Db::table('dcxw_house_decorate_log')
                ->where(['hdl_status' =>$v['hds_end_status'],'hdl_house_code' =>$h_id])
                ->order('hdl_addtime desc')
                ->select();
            $step[$k]['decorate_count']=Db::table('dcxw_house_decorate_log')
                ->where(['hdl_status' =>$v['hds_end_status'],'hdl_house_code' =>$h_id])
                ->count();
            foreach ($step[$k]['decorate_log'] as $key =>$val){
                $step[$k]['decorate_log'][$key]['hdl_admin'] =$commomModel->getUserName($val['hdl_admin']);
            }
        }
        $this->assign('step',$step);
        $this->assign('h_id',$h_id);
        return $this->fetch();
    }


    public function logdetails(){
        $hdl_id=trim($_GET['hdl_id']);
        $type=trim($_GET['type']);
        $this->assign('type',$type);
        $daily=Db::table('dcxw_house_decorate_log')
            ->join('dcxw_user','dcxw_user.u_id = dcxw_house_decorate_log.hdl_admin')
            ->where(['hdl_id' => $hdl_id])
            ->field('dcxw_house_decorate_log.*,dcxw_user.u_name,dcxw_user.u_job')
            ->find();
        if($daily){
            if($daily['hdl_img']){
                $daily['hdl_imgs']=explode(',',$daily['hdl_img']);
                $daily['hdl_img_first']=explode(',',$daily['hdl_img'])[0];
                if(count($daily['hdl_imgs']) >=1){
                    unset($daily['hdl_imgs'][0]);
                }
            }
            $daily['hdl_addtime']=date('Y年m月d日 H时i分',$daily['hdl_addtime']);
        }
        $houseInfo=Db::table('dcxw_house')
            ->where(['h_b_id' => $daily['hdl_house_code']])
            ->field('h_building,h_address')
            ->find();
        $this->assign('house',$houseInfo);
        $connomModel=new Common();
        $daily['hdl_status']=$connomModel->getStatus($daily['hdl_status']);
        $this->assign('logs',$daily);
        return $this->fetch();
    }



    /*
     * 运营主管修改房源
     * */
    public function editbase(){
        $h_id=Request::instance()->get('h_id');
        $type=Request::instance()->get('type');
        $post=Request::instance()->post();
        if($post){
            //1.更新房源信息
            $data=$post;
            $data['h_updatetime'] = time();
            $pre=Db::table('dcxw_house')->where(['h_b_id' => $h_id])->find();
            $house=Db::table('dcxw_house')->where(['h_b_id' => $h_id])->update($data);
            $now = Db::table('dcxw_house')->where(['h_b_id' => $h_id])->find();
            $logCommon = new Commons();
            //2.添加修改记录
            $insertLog=$logCommon->operationLog($now,$pre,1);
            if($house && $insertLog){
                $this->success('修改成功！');
            }else{
                $this->success('修改成功！');
            }
        }else{
            $this->assign('h_b_id',$h_id);
            $this->assign('type',$type);
            $house=Db::table('dcxw_house')->where(['h_b_id' => $h_id])
                ->field('h_area,h_address,h_building')
                ->find();
            $this->assign('house',$house);
            return $this->fetch();
        }
    }


    /*
    * 运营主管修改房源附属信息
    * */
    public function editattch(){
        $h_id=Request::instance()->get('h_id');
        $type=Request::instance()->get('type');
        $this->assign('type',$type);
        $post=Request::instance()->post();
        if($post){
            $userInfo=session('userInfo');
            $attach=Db::table('dcxw_house_attachment')
                ->where(['ha_house_code' => $h_id])
                ->find();
            $data=$_POST;
            $data['ha_addtime']=time();
            $data['ha_deadline']=strtotime($post['ha_deadline']." 23:59:59");
            $data['ha_decorate_permit']=strtotime($post['ha_decorate_permit']." 23:59:59");
            $data['ha_user']=$userInfo['u_id'];
            $img=$post['ha_contact_img'];
            $hpl_img='';
            for ($i=0;$i<sizeof($img);$i++){
                $hpl_img.=$img[$i].",";
            }
            $data['ha_contact_img']=trim($hpl_img,',');
            if($attach){
                $update=Db::table('dcxw_house_attachment')
                    ->where(['ha_house_code' => $h_id])
                    ->update($data);
                $now = Db::table('dcxw_house_attachment')
                    ->where(['ha_house_code' => $h_id])
                    ->find();
                $logCommon = new Commons();
                //2.添加修改记录
                $insertLog=$logCommon->operationLog($now,$attach,2);
                if($update && $insertLog){
                    $this->success('修改成功','',$data);
                }else{
                    $this->error('修改失败','',$data);
                }
            }
        }else{
            $master=Db::table('dcxw_house_master')
                ->where(['hm_house_code' => $h_id])
                ->field('hm_name,hm_phone')
                ->find();
            //客户经理姓名和电话
            $houseInfo=Db::table('dcxw_house')
                ->where(['h_b_id' => $h_id])
                ->field('h_admin')
                ->find();
            $manager=Db::table('dcxw_user')
                ->where(['u_id' => $houseInfo['h_admin']])
                ->field('u_name,u_phone,u_job')
                ->find();
            $attach=Db::table('dcxw_house_attachment')
                ->where(['ha_house_code' => $h_id])
                ->find();
            if($attach){
                $attach['ha_deadline']=date('Y-m-d',$attach['ha_deadline']);
                $attach['ha_decorate_permit']=date('Y-m-d',$attach['ha_decorate_permit']);
            }
            $commoModel=new \app\marketm\controller\Common();
            $attach['ha_contact_img']=explode(',',$attach['ha_contact_img']);
            $electType=$commoModel->electType();
            $this->assign('electType',$electType);
            $warmType=$commoModel->warmType();
            $this->assign('warmType',$warmType);
            $wuyeFeeType=$commoModel->wuyeFeeType();
            $this->assign('wuyeFeeType',$wuyeFeeType);
            $this->assign('h_b_id',$h_id);
            $this->assign('attach',$attach);
            $this->assign('manager',$manager);
            $this->assign('master',$master);
            $this->assign('h_b_id',$h_id);
            return $this->fetch();
        }
    }

}