<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/10/18
 * Time: 10:12
 * Name: Controller
 */
namespace app\decoration\controller;
use think\Controller;
use think\Db;
use think\Request;

class Index extends Controller{

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $userInfo=session('userInfo');
        if(empty($userInfo)){
            $this->redirect('login/login');
        }
    }

    public function index(){
        $houses=Db::table('dcxw_house')
            ->where(['h_isable' => 2])
            ->order('h_addtime desc')
            ->select();
        foreach($houses as $k =>$v){
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
        $this->assign('houses',$houses);
        return $this->fetch();
    }



    public function details(){
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
//        dump($manger);
        $this->assign('manger',$manger);
        //户主信息
        $master=Db::table('dcxw_house_master')
            ->where(['hm_house_code' => $h_id])
            ->find();
//        dump($master);
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
        $this->assign('attach',$attach);
        return $this->fetch();
    }



    public function dailylog(){
        $h_id=trim($_GET['h_id']);
        $dailyLog=Db::table('dcxw_house_decorate_log')
            ->where(['hdl_house_code' => $h_id])
            ->order('hdl_addtime desc')
            ->select();
//        dump($dailyLog);
        $this->assign('h_id',$h_id);
        $this->assign('dailyLog',$dailyLog);
        return $this->fetch();
    }


    public function addlog(){
       return $this->fetch();
    }

    public function steps(){
        return $this->fetch();
    }

}