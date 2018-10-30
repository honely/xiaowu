<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/10/13
 * Time: 9:19
 * Name: Controller
 */
namespace app\marketm\controller;
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
        $userInfo=session('userInfo');
        if($_POST){
            $data=$_POST;
            $stime=strtotime(date('Y-m-d 00:00:00'));
            $etime=strtotime(date('Y-m-d 23:59:59'));
            $buNum=Db::table('dcxw_house')->where('h_addtime','between',[$stime,$etime])->count();
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
    public function house(){
        $userInfo=session('userInfo');
        $u_id=$userInfo['u_id'];
        $where=" 1 =1 ";
        $keywords=trim($this->request->param('keywords'));
        if(isset($keywords) && !empty($keywords)){
            $where.=" and ( h_b_id like '%".$keywords."%')";
            $this->assign('keywords',$keywords);
        }
        $houses=Db::table('dcxw_house')
            ->where($where)
            ->where(['h_admin' => $u_id])
            ->order('h_addtime desc')
            ->select();
        $connomModel=new Common();
        foreach($houses as $k =>$v){
            $houses[$k]['h_isable']=$connomModel->getHouseStatus($v['h_isable']);
            $houses[$k]['m_id']=$connomModel->getMasterStatus($v['h_b_id']);
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

    /*
     * master
     * */
    public function master(){
        $h_id=trim($_GET['h_id']);
        $m_id=trim($_GET['m_id']);

        $masterInfo=Db::table('dcxw_house_master')
            ->where(['hm_house_code' => $h_id])
            ->find();
        if($masterInfo){
            if($masterInfo){
                $masterInfo['hm_addtime']=date('Y-m-d H:i:s',$masterInfo['hm_addtime']);
                $masterArr=Db::table('dcxw_user')
                    ->where(['u_id' => $masterInfo['hm_admin']])
                    ->column('u_name');
                $masterInfo['hm_admin']=$masterArr[0];
            }
            if($m_id == 2){
                $this->assign('h_b_id',$h_id);
                $this->assign('master',$masterInfo);
                return $this->fetch();
            }
            //仅做展示
            $this->assign('h_b_id',$h_id);
            $this->assign('master',$masterInfo);
            return $this->fetch('masters');
        }else{
            //户主信息添加
            $this->assign('h_b_id',$h_id);
            $this->assign('master',$masterInfo);
            return $this->fetch();
        }
    }


    public function editmaster(){
        $h_id=trim($_GET['h_id']);
        $masterInfo=Db::table('dcxw_house_master')
            ->where(['hm_house_code' => $h_id])
            ->find();
        $this->assign('h_b_id',$h_id);
        $this->assign('master',$masterInfo);
    }


    public function addmaster(){
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
    }


    /*
     * master
     * */
    public function masters(){
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
     * 回款信息
     * */
    public function payment(){
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
                ->field('u_name,u_phone,u_job')
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
                ->limit(8)
                ->field('dcxw_house_pay_log.*,dcxw_user.u_name')
                ->select();
            foreach($payLog as $k => $v){
                $payLog[$k]['hpl_img']=explode(',',$v['hpl_img'])[0];
            }
            $count=Db::table('dcxw_house_pay_log')
                ->join('dcxw_user','dcxw_user.u_id = dcxw_house_pay_log.hpl_user')
                ->where(['hpl_house_code' => $h_id])
                ->count();
            $this->assign('count',$count);
            if($payLog){
                foreach($payLog as $k => $v){
                    $payLog[$k]['hpl_addtime'] = date('m-d H:i',$v['hpl_addtime']);
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
     * 添加汇款记录
     * */
    public function addpaylog(){
        $userInfo=session('userInfo');
        $h_id=trim($_GET['h_id']);
        if($_POST){
            $data=$_POST;
            $data['hpl_house_code']=$h_id;
            $img=$_POST['hpl_img'];
            $hpl_img='';
            for ($i=0;$i<sizeof($img);$i++){
                $hpl_img.=$img[$i].",";
            }
            $money=$_POST['hpl_money'];
            $data['hpl_img']=trim($hpl_img,',');
            $data['hpl_addtime']=time();
            $data['hpl_user']=$userInfo['u_id'];
            $addPayLog=Db::table('dcxw_house_pay_log')->insert($data);
            if($addPayLog){
                //变更回款信息表数据
                //1.增加收款金额，
                $paidInc=Db::table('dcxw_house_pay')
                    ->where(['hp_house_code' => $h_id])
                    ->setInc('hp_paid',$money);
                //2.减少未收款金额
                $willDec=Db::table('dcxw_house_pay')
                    ->where(['hp_house_code' => $h_id])
                    ->setDec('hp_will_pay',$money);
                //计算回款比率，比率入库
                $paidInfo=Db::table('dcxw_house_pay')
                    ->where(['hp_house_code' => $h_id])
                    ->find();
                $paidRatio=round($paidInfo['hp_paid']/$paidInfo['hp_money'],4);
                //更新回款比率
                $updateRatio=Db::table('dcxw_house_pay')
                    ->where(['hp_house_code' => $h_id])
                    ->update(['hp_paid_ratio' =>$paidRatio]);
                if($paidInc && $willDec && $updateRatio){
                    $this->success('添加成功！');
                }else{
                    $this->error('添加失败！');
                }
            }
        }else{
            $payMoney=Db::table('dcxw_house_pay')
                ->where(['hp_house_code' => $h_id])
                ->find();
            $payMoney['hp_paid_ratio']=($payMoney['hp_paid_ratio']*100)."%";
            $this->assign('payMoney',$payMoney);
            $this->assign('h_b_id',$h_id);
            return $this->fetch();
        }
    }


    public function paylog(){
        $h_id=trim($_GET['h_id']);
        $payLog=Db::table('dcxw_house_pay_log')
            ->join('dcxw_user','dcxw_user.u_id = dcxw_house_pay_log.hpl_user')
            ->where(['hpl_house_code' => $h_id])
            ->order('hpl_addtime desc')
//            ->limit(8)
            ->field('dcxw_house_pay_log.*,dcxw_user.u_name')
            ->select();
        if($payLog){
            foreach($payLog as $k => $v){
                $payLog[$k]['hpl_addtime'] = date('m-d H:i',$v['hpl_addtime']);
            }
        }
        $this->assign('payLog',$payLog);
        return $this->fetch();
    }


    public function logdetails(){
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




    public function editpay(){
        $hpl_id=intval(trim($_GET['hpl_id']));
        dump($hpl_id);
        return $this->fetch();
    }




    /*
     * 房屋附属信息
     * */
    public function attach(){
        $h_id=trim($_GET['h_id']);
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
            $attach['ha_contact_img']=explode(',',$attach['ha_contact_img']);
            $attach['ha_deadline']=date('Y-m-d',$attach['ha_deadline']);
            $attach['ha_decorate_permit']=date('Y-m-d',$attach['ha_decorate_permit']);
        }
//        dump($attach);
        $this->assign('attach',$attach);
        $this->assign('manager',$manager);
        $this->assign('master',$master);
        $this->assign('h_b_id',$h_id);
        return $this->fetch();
    }

    public function addattach(){
        $h_id=trim($_GET['h_id']);
        $userInfo=session('userInfo');
        if($_POST){
            $attach=Db::table('dcxw_house_attachment')
                ->where(['ha_house_code' => $h_id])
                ->find();
            $data=$_POST;
            $data['ha_addtime']=time();
            $data['ha_deadline']=strtotime($_POST['ha_deadline']." 23:59:59");
            $data['ha_decorate_permit']=strtotime($_POST['ha_decorate_permit']." 23:59:59");
            $data['ha_user']=$userInfo['u_id'];
            $img=$_POST['ha_contact_img'];
            $hpl_img='';
            for ($i=0;$i<sizeof($img);$i++){
                $hpl_img.=$img[$i].",";
            }
            $data['ha_contact_img']=trim($hpl_img,',');
            if($attach){
                $update=Db::table('dcxw_house_attachment')
                    ->where(['ha_house_code' => $h_id])
                    ->update($data);
                if($update){
                    $this->success('修改成功','',$data);
                }else{
                    $this->error('修改失败','',$data);
                }
            }else{
                $add=Db::table('dcxw_house_attachment')->insert($data);
                if($add){
                    $this->success('添加成功','',$data);
                }else{
                    $this->error('添加失败','',$data);
                }
            }
        }

    }




    /*
     * 房源预览
     * */
    public function preview(){
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




    public function person(){
        return $this->fetch();
    }

    /*
     * 转施工
     * */
    public function towork(){
        $h_id=trim($_POST['h_id']);
        $transInfo=trim($_POST['transfer']);
        $userInfo=session('userInfo');
        //1.更改房屋主表的状态
        $toWork=Db::table('dcxw_house')
            ->where('h_b_id', $h_id)
            ->update(['h_isable' => 2]);
        //2.给房屋装修表添加信息；
        $data['hd_house_code']=$h_id;
        $data['hd_addtime']=time();
        $data['hd_status']=1;
        $data['hd_admin']=$userInfo['u_id'];
        $data['hd_tips']=$transInfo;
        $add=Db::table('dcxw_house_decorate')->insert($data);
//1.事业部专项工程部；2工程部开始开工；3进场检查；4水电验证；5防水验收；6瓦工验收，7乳胶漆验收；8主材验收；9软装验收；10；自检';
        //3.给房屋装修状态表添加信息
        $dataStatus['hds_house_code']=$h_id;
        $dataStatus['hds_start_status']=1;
        $dataStatus['hds_end_status']=1;
        $dataStatus['hds_change_time']=time();
        $dataStatus['hds_user_id']=$userInfo['u_id'];
        $dataStatus['hds_change_tips']=$transInfo;
        $addStatus=Db::table('dcxw_house_decorate_status')->insert($dataStatus);
        if($toWork && $add && $addStatus){
            $this->success('转交成功！','',$toWork);
        }else{
            $this->error('转交失败！','',$toWork);
        }
    }





    public function demo(){
        return $this->fetch();
    }

    public function form(){
        return $this->fetch();
    }
}