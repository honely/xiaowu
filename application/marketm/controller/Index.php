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
            $p_ids=$_POST['h_p_id'];
            $p_id=Db::table('dcxw_province')->where(['p_id' => $p_ids])->column('p_code');
            $c_ids=$_POST['h_c_id'];
            $c_id=Db::table('dcxw_city')->where(['c_id' => $c_ids])->column('c_code');
            $a_ids=$_POST['h_a_id'];
            $a_id=Db::table('dcxw_area')->where(['area_id' => $a_ids])->column('area_code');
            $buNum=Db::table('dcxw_house')->where(['h_c_id' => $c_ids])->count();
            $data['h_b_id'] = $p_id[0].''.$c_id[0].''.$a_id[0].sprintf("%04d", $buNum+1);
            $data['h_house_type']=intval(trim($_POST['h_room'])).",".intval(trim($_POST['h_dinner'])).",".intval(trim($_POST['h_cook'])).",".intval(trim($_POST['h_bath']));
            $data['h_p_id']=trim($_POST['h_p_id']);
            $data['h_c_id']=trim($_POST['h_c_id']);
            $data['h_a_id']=trim($_POST['h_a_id']);
            $data['h_head']=trim($_POST['h_head']);
            $data['h_building']=trim($_POST['h_building']);
            $data['h_area']=trim($_POST['h_area']);
            $data['h_address']=trim($_POST['h_address']);
            $data['h_addtime']=time();
            $data['h_updatetime']=time();
            $data['h_isable']=1;
            $data['h_add_type']=2;
            $data['h_admin'] = $userInfo['u_id'];
            $add=Db::table('dcxw_house')->insert($data);
            if($add){
                return  json(['code' => '1','msg' => '发布成功！','data' => $data['h_b_id']]);
            }else{
                return  json(['code' => '2','msg' => '发布失败！','data' => $data['h_b_id']]);
            }
        }else{
            //房屋类型 备选
            $houseType=Db::table('dcxw_type')
                ->where(['type_sort' => 1,'type_isable' => 1])
                ->order('type_order')
                ->select();
            $this->assign('houseType',$houseType);
            $provInfo=Db::table('dcxw_province')->select();
            $commonM=new Common();
            $dinner=$commonM->getDinner();
            $cook=$commonM->getCook();
            $room=$commonM->getRoom();
            $bath=$commonM->getBath();
            $houseHead=$commonM->houseHeadFun();
            $this->assign('houseHead',$houseHead);
            $this->assign('dinner',$dinner);
            $this->assign('cook',$cook);
            $this->assign('room',$room);
            $this->assign('bath',$bath);
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
            ->limit(8)
            ->select();
        $count=Db::table('dcxw_house')
            ->where($where)
            ->where(['h_admin' => $u_id])
            ->count();
        $connomModel=new Common();
        foreach($houses as $k =>$v){
            $houses[$k]['h_isable']=$connomModel->getHouseStatus($v['h_isable']);
            $houses[$k]['m_id']=$connomModel->getMasterStatus($v['h_b_id']);
            $houses[$k]['a_id']=$connomModel->getAttachStatus($v['h_b_id']);
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
        $this->assign('count',$count);
        $this->assign('houses',$houses);
        return $this->fetch();
    }


    /*
     * 房源加载更多
     * **/

    public function housemore(){
        $userInfo=session('userInfo');
        $u_id=$userInfo['u_id'];
        $where='h_admin = '.$u_id;
        if($_POST){
            $page=intval(trim($_POST['page']));
            $keywords=trim($_POST['keywords']);
            $where.=" and ( h_name like '%".$keywords."%' or h_building like '%".$keywords."%' or h_address like '%".$keywords."%'  or h_description like '%".$keywords."%' )";
        }else{
            $page=1;
        }
        $limit=8;
        $houses=Db::table('dcxw_house')
            ->where($where)
            ->limit(($page-1)*$limit,$limit)
            ->order('h_addtime desc')
            ->select();
        $connomModel=new Common();
        foreach($houses as $k =>$v){
            $houses[$k]['h_isable']=$connomModel->getHouseStatus($v['h_isable']);
            $houses[$k]['m_id']=$connomModel->getMasterStatus($v['h_b_id']);
            $houses[$k]['a_id']=$connomModel->getAttachStatus($v['h_b_id']);
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
        if($houses){
            $this->success('更多完成','',$houses);
        }else{
            $this->error('更多失败','',$houses);
        }
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
                    ->field('u_name,u_job')->find();
                $masterInfo['hm_admin']=$masterArr['u_name'];
                $masterInfo['u_job']=$masterArr['u_job'];
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
            $addPay=Db::table('dcxw_house_pay')->insert($data);
            //更新主表签单状态
            $h_id=trim($_POST['hp_house_code']);
            $update=Db::table('dcxw_house')->where(['h_b_id' => $h_id])->update(['h_isable' => 6]);
            if($addPay && $update){
                $this->success('添加成功!');
            }else{
                $this->error('添加失败！');
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
            ->field('dcxw_house_pay_log.*,dcxw_user.u_name,dcxw_user.u_job')
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
        $a_id=intval(trim($_GET['a_id']));
        $commoModel=new Common();
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
        $this->assign('manager',$manager);
        $this->assign('master',$master);
        $this->assign('h_b_id',$h_id);
        $attach=Db::table('dcxw_house_attachment')
            ->where(['ha_house_code' => $h_id])
            ->find();
        if($attach){
                $attach['ha_contact_img']=explode(',',$attach['ha_contact_img']);
                $attach['ha_deadline']=date('Y-m-d',$attach['ha_deadline']);
                $attach['ha_decorate_permit']=date('Y-m-d',$attach['ha_decorate_permit']);

            if($a_id == 2){
                $electType=$commoModel->electType();
                $this->assign('electType',$electType);
                $warmType=$commoModel->warmType();
                $this->assign('warmType',$warmType);
                $wuyeFeeType=$commoModel->wuyeFeeType();
                $this->assign('wuyeFeeType',$wuyeFeeType);
                $this->assign('h_b_id',$h_id);
                $this->assign('attach',$attach);
                return $this->fetch('attachs');
            }else{
                //仅做展示
                $attach['ha_elect_type']=$commoModel->getElectTypeName($attach['ha_elect_type']);
                $attach['ha_warm_type']=$commoModel->getWarmTypeName($attach['ha_warm_type']);
                $attach['ha_wuye_fee_type']=$commoModel->getWuYeFeeTypeName($attach['ha_wuye_fee_type']);
                $this->assign('h_b_id',$h_id);
                $this->assign('attach',$attach);
                return $this->fetch();
            }
        }else{
            $electType=$commoModel->electType();
            $this->assign('electType',$electType);
            $warmType=$commoModel->warmType();
            $this->assign('warmType',$warmType);
            $wuyeFeeType=$commoModel->wuyeFeeType();
            $this->assign('wuyeFeeType',$wuyeFeeType);
            $this->assign('h_b_id',$h_id);
            $this->assign('attach',$attach);
            return $this->fetch('attachs');
        }
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
        $commoModel=new Common();
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
            $attach['ha_contact_img']=explode(',',$attach['ha_contact_img']);
            $attach['ha_deadline']=date('Y-m-d',$attach['ha_deadline']);
            $attach['ha_decorate_permit']=date('Y-m-d',$attach['ha_decorate_permit']);
            $attach['ha_elect_type']=$commoModel->getElectTypeName($attach['ha_elect_type']);
            $attach['ha_warm_type']=$commoModel->getWarmTypeName($attach['ha_warm_type']);
            $attach['ha_wuye_fee_type']=$commoModel->getWuYeFeeTypeName($attach['ha_wuye_fee_type']);
        }
        $this->assign('attach',$attach);
        return $this->fetch();
    }




    public function person(){
        return $this->fetch();
    }

    /*
     * 转行政
     * */
    public function towork(){
        $h_id=trim($_POST['h_id']);
        //转交备注
        $transInfo=trim($_POST['transfer']);
        $userInfo=session('userInfo');

        //1.更改房屋主表的状态
        $toWork=Db::table('dcxw_house')
            ->where('h_b_id', $h_id)
            ->update(['h_isable' => 7]);
        //给转交分配表增添数据
        $data['hat_house_code']=$h_id;
        $data['hat_c_id']=$userInfo['u_c_id'];
        $data['hat_sub_tips']=$transInfo;
        $data['hat_add_time']=time();
        $data['hat_is_assign']=2;
        $data['hat_type']=1;
        $data['hat_admin']=$userInfo['u_id'];
        $trans=Db::table('dcxw_house_allocate')->insert($data);
        if($toWork && $trans){
            $this->success('转交成功！','',$transInfo);
        }else{
            $this->error('转交失败！','',$transInfo);
        }
    }
}