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
            ->join('dcxw_house_decorate','dcxw_house.h_b_id = dcxw_house_decorate.hd_house_code')
            ->where(['h_isable' => 2])
            ->where($where)
            ->limit(8)
            ->order('h_addtime desc')
            ->select();
        $count=Db::table('dcxw_house')
            ->join('dcxw_house_decorate','dcxw_house.h_b_id = dcxw_house_decorate.hd_house_code')
            ->where(['h_isable' => 2])
            ->where($where)->count();
        $this->assign('count',$count);
        $connomModel=new \app\marketm\controller\Common();
        if($houses){
            foreach($houses as $k =>$v){
            $houses[$k]['hd_status']=$this->getStatus($v['hd_status']);
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

        $this->assign('houses',$houses);
        return $this->fetch();
    }

    /*
     * 房源加载更多
     * **/

    public function housemore(){
        $where='h_isable = 2';
        if($_POST){
            $page=intval(trim($_POST['page']));
            $keywords=trim($_POST['keywords']);
            $where.=" and ( h_name like '%".$keywords."%' or h_building like '%".$keywords."%' or h_address like '%".$keywords."%'  or h_description like '%".$keywords."%' )";
        }else{
            $page=1;
        }
        $limit=8;
        $houses=Db::table('dcxw_house')
            ->join('dcxw_house_decorate','dcxw_house.h_b_id = dcxw_house_decorate.hd_house_code')
            ->where(['h_isable' => 2])
            ->where($where)
            ->limit(($page-1)*$limit,$limit)
            ->order('h_addtime desc')
            ->select();
        $connomModel=new \app\marketm\controller\Common();
        if($houses){
            foreach($houses as $k =>$v){
                $houses[$k]['hd_status']=$this->getStatus($v['hd_status']);
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
        if($houses){
            $this->success('更多完成','',$houses);
        }else{
            $this->error('更多失败','',$houses);
        }
    }














    public function person(){
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



    public function dailylog(){
        $h_id=trim($_GET['h_id']);
        //根据房源编号找到装修状态
        $decoInfo=Db::table('dcxw_house_decorate')
            ->where(['hd_house_code' => $h_id])
            ->find();
        $status=$decoInfo['hd_status'];
        $dailyLog=Db::table('dcxw_house_decorate_log')
            ->where(['hdl_house_code' => $h_id])
            ->limit(12)
            ->order('hdl_addtime desc')
            ->select();
        $count=Db::table('dcxw_house_decorate_log')
            ->where(['hdl_house_code' => $h_id])
            ->count();
        if($dailyLog){
            foreach($dailyLog as $k =>$v){
                $dailyLog[$k]['hdl_img']=explode(',',$v['hdl_img'])[0];
                $dailyLog[$k]['hdl_addtime']=date("Y-m-d H:i:s", $v['hdl_addtime']);

            }
        }
        $this->assign('count',$count);
        $this->assign('status',$status);
        $this->assign('h_id',$h_id);
        $this->assign('dailyLog',$dailyLog);
        return $this->fetch();
    }



    public function logmore(){
        $h_id=trim($_POST['h_id']);
        $where=' hdl_house_code = '.$h_id;
        if($_POST){
            $page=intval(trim($_POST['page']));
        }else{
            $page=1;
        }
        $limit=8;
        $logs=Db::table('dcxw_house_decorate_log')
            ->where($where)
            ->limit(($page-1)*$limit,$limit)
            ->order('hdl_addtime desc')
            ->select();
        if($logs){
            foreach($logs as $k =>$v){
                $logs[$k]['hdl_img']=explode(',',$v['hdl_img'])[0];
                $logs[$k]['hdl_addtime']=date("Y-m-d H:i:s", $v['hdl_addtime']);
            }
        }
        if($logs){
            $this->success('更多完成','',$logs);
        }else{
            $this->error('更多失败','',$logs);
        }
    }


    public function addlog(){
        $userInfo=session('userInfo');
        $h_id=trim($_GET['h_id']);
        //根据房源编号找到装修状态
        $decoInfo=Db::table('dcxw_house_decorate')
            ->where(['hd_house_code' => $h_id])
            ->find();
        //房源信息
        $house=Db::table('dcxw_house')
            ->where(['h_b_id' => $h_id])
            ->field('h_building,h_address')
            ->find();
        $this->assign('house',$house);
        $status=$decoInfo['hd_status'];
        if($_POST){
            $data=$_POST;
            $data['hdl_addtime']=time();
            $img=$_POST['hdl_img'];
            $hpl_img='';
            for ($i=0;$i<sizeof($img);$i++){
                $hpl_img.=$img[$i].",";
            }
            $data['hdl_img']=trim($hpl_img,',');
            $data['hdl_status']=$status;
            $data['hdl_admin']=$userInfo['u_id'];
            $data['hdl_house_code']=$h_id;
            $add=Db::table('dcxw_house_decorate_log')->insert($data);
            if($add){
                $this->success('添加成功！');
            }else{
                $this->error('添加失败！');
            }
        }else{
            $statusTip=$this->getStatus($status);
            $nextStatus=$this->getStatus(intval(intval($status)+1));
            $this->assign('statusStart',$statusTip);
            $this->assign('nextStatus',$nextStatus);
            $this->assign('status',$status);
            $this->assign('h_id',$h_id);
            return $this->fetch();
        }
    }


    /*
     * 根据装修状态码返回相应的状态文字
     * */
    public function getStatus($status){
        $statusTip='';
        switch ($status) {
            case 1:
                $statusTip="接到通知";
                break;
            case 2:
                $statusTip="开始开工";
                break;
            case 3:
                $statusTip="进场检查";
                break;
            case 4:
                $statusTip="水电验收";
                break;
            case 5:
                $statusTip="防水验收";
                break;
            case 6:
                $statusTip="瓦工验收";
                break;
            case 7:
                $statusTip="乳胶漆验收";
                break;
            case 8:
                $statusTip="主材验收";
                break;
            case 9:
                $statusTip="软装验收";
                break;
            case 10:
                $statusTip="自检";
                break;
            case 11:
                $statusTip="转入运营部";
                break;
        }
        return $statusTip;
    }


    public function addlogpro(){
        $userInfo=session('userInfo');
        $h_id=trim($_POST['h_id']);
        //根据房源编号找到装修状态
        $decoInfo=Db::table('dcxw_house_decorate')
            ->where(['hd_house_code' => $h_id])
            ->find();
        $status=intval($decoInfo['hd_status']);
        if($_POST){
            $remarks=trim($_POST['trans']);
            $data['hdl_title']=trim($_POST['hdl_title']);
            $data['hdl_content']=trim($_POST['hdl_content']);
            $data['hdl_addtime']=time();
            $img=$_POST['hdl_img'];
            $hpl_img='';
            for ($i=0;$i<sizeof($img);$i++)
            {
                $hpl_img.=$img[$i].",";
            }
            $data['hdl_img']=trim($hpl_img,',');
            $data['hdl_admin']=$userInfo['u_id'];
            $data['hdl_house_code']=$h_id;
            $data['hdl_status']=$status;
            $isTrans=intval(trim($_POST['isTrans']));
            //$isTrans==1结转;==2不结转
            if($isTrans==1){
                //1.修改装修主表状态
                $decorateStatus=Db::table('dcxw_house_decorate')
                    ->where(['hd_house_code' => $h_id])
                    ->setInc('hd_status');
                //2.添加装修状态表记录
                $statusq['hds_house_code']=$h_id;
                $statusq['hds_start_status']=$status;
                $statusq['hds_change_time']=time();
                $statusq['hds_end_status']=intval(intval($status)+1);
                $statusq['hds_change_tips']=$remarks;
                $statusq['hds_user_id']=$userInfo['u_id'];
                $changeLog=Db::table('dcxw_house_decorate_status')->insert($statusq);
                //3.添加装修日志记录
                $add=Db::table('dcxw_house_decorate_log')->insert($data);
                if($status == 10){
                    Db::table('dcxw_house')
                        ->where(['h_b_id' => $h_id])
                        ->setInc('h_isable');
                }
                //4.如果转入运营部，则主表的h_isable=3；运营部配置中。
                if($add && $decorateStatus && $changeLog){
                    $this->success('添加成功！','',$_POST);
                }else{
                    $this->error('添加失败！','',$_POST);
                }
            }else{
                $add=Db::table('dcxw_house_decorate_log')->insert($data);
                if($add){
                    $this->success('添加成功！');
                }else{
                    $this->error('添加失败！');
                }
            }
        }
    }


    public function logdetails(){
        $hdl_id=trim($_GET['hdl_id']);
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
        //吧施工节点转化为文字
//        状态变更表1.事业部专项工程部；2工程部开始开工；3进场检查；4水电验收；5防水验收；6瓦工验收，7乳胶漆验收；8主材验收；9软装验收；10；自检;11,移交给运营部
        $daily['hdl_status']=$this->getStatus($daily['hdl_status']);
        $this->assign('logs',$daily);
        return $this->fetch();
    }

    public function steps(){
        return $this->fetch();
    }


    public function timeline(){
        $h_id=trim($_GET['h_id']);
        $step=Db::table('dcxw_house_decorate_status')
            ->where(['hds_house_code' => $h_id])
            ->order('hds_change_time desc')
            ->select();
        foreach ($step as $k => $v){
            $step[$k]['hds_end_statuss']=$this->getStatus($v['hds_end_status']);
            $step[$k]['hds_change_time']=$this->get_last_time($v['hds_change_time']);
        }
        $this->assign('step',$step);
        return $this->fetch();
    }



    function get_last_time($time = NULL) {
        $text = '';
        $time = $time === NULL || $time > time() ? time() : intval($time);
        $t = time() - $time; //时间差 （秒）
        $y = date('Y', $time)-date('Y', time());//是否跨年
        switch($t){
            case $t == 0:
                $text = '刚刚';
                break;
            case $t < 60:
                $text = $t . '秒前'; // 一分钟内
                break;
            case $t < 60 * 60:
                $text = floor($t / 60) . '分钟前'; //一小时内
                break;
            case $t < 60 * 60 * 24:
                $text = floor($t / (60 * 60)) . '小时前'; // 一天内
                break;
            case $t < 60 * 60 * 24 * 3:
                $text = floor($time/(60*60*24)) ==1 ?'昨天 ' . date('H:i', $time) : '前天 ' . date('H:i', $time) ; //昨天和前天
                break;
            case $t < 60 * 60 * 24 * 30:
                $text = date('m月d日 H:i', $time); //一个月内
                break;
            case $t < 60 * 60 * 24 * 365&&$y==0:
                $text = date('m月d日', $time); //一年内
                break;
            default:
                $text = date('Y年m月d日', $time); //一年以前
                break;
        }

        return $text;
    }


}