<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/10/18
 * Time: 10:12
 * Name: Controller
 */
namespace app\decoration\controller;
use app\marketm\model\Commons;
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
        $userInfo=session('userInfo');
        $cityId=$userInfo['u_c_id'];
        $userId=$userInfo['u_id'];
        $where=" 1 =1 ";
        $keywords=trim($this->request->param('keywords'));
        if(isset($keywords) && !empty($keywords)){
            $where.=" and ( h_b_id like '%".$keywords."%')";
            $this->assign('keywords',$keywords);
        }
        $houses=Db::table('dcxw_house_allocate')
            ->distinct(true)
            ->join('dcxw_house','dcxw_house.h_b_id = dcxw_house_allocate.hat_house_code')
            ->join('dcxw_house_decorate_status','dcxw_house_decorate_status.hds_house_code = dcxw_house_allocate.hat_house_code')
            ->where(['hat_c_id' => $cityId,'hat_assign_to' => $userId,'hat_type' => 1])
            ->where('h_isable','in',[2,3,4,5,8])
            ->where($where)
            ->field('dcxw_house_allocate.*,dcxw_house.h_area,dcxw_house.h_address,dcxw_house.h_building,dcxw_house.h_b_id,dcxw_house.h_addtime')
            ->order('hat_assign_time desc')
            ->limit(2)
            ->select();
        $connomModel=new \app\marketm\controller\Common();
        if($houses){
            foreach($houses as $k =>$v){
                $houses[$k]['hd_status']=$connomModel->getStatusByHouseCode($v['h_b_id']);
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
        $count=Db::table('dcxw_house_allocate')
            ->distinct(true)
            ->join('dcxw_house','dcxw_house.h_b_id = dcxw_house_allocate.hat_house_code')
            ->join('dcxw_house_decorate_status','dcxw_house_decorate_status.hds_house_code = dcxw_house_allocate.hat_house_code')
            ->where(['hat_c_id' => $cityId,'hat_assign_to' => $userId,'hat_type' => 1])
            ->where('h_isable','in',[2,3,4,5,8])
            ->where($where)->count('distinct hat_id');;
        $this->assign('count',$count);
        $this->assign('houses',$houses);
        return $this->fetch();
    }



    /*
    * 房源加载更多
    * **/

    public function housemore(){
        $userInfo=session('userInfo');
        $cityId=$userInfo['u_c_id'];
        $userId=$userInfo['u_id'];
        $where=" 1 =1 ";
        if($_POST){
            $page=intval(trim($this->request->param('page')));
            $keywords=trim($this->request->param('keywords'));
            $where.=" and ( h_name like '%".$keywords."%' or h_building like '%".$keywords."%' or h_address like '%".$keywords."%'  or h_description like '%".$keywords."%' )";
        }else{
            $page=1;
        }
        $limit=2;
        $houses=Db::table('dcxw_house_allocate')
            ->distinct(true)
            ->join('dcxw_house','dcxw_house.h_b_id = dcxw_house_allocate.hat_house_code')
            ->join('dcxw_house_decorate_status','dcxw_house_decorate_status.hds_house_code = dcxw_house_allocate.hat_house_code')
            ->where(['hat_c_id' => $cityId,'hat_assign_to' => $userId,'hat_type' => 1])
            ->where('h_isable','in',[2,3,4,5,8])
            ->where($where)
            ->field('dcxw_house_allocate.*,dcxw_house.h_area,dcxw_house.h_address,dcxw_house.h_building,dcxw_house.h_b_id,dcxw_house.h_addtime')
            ->order('hat_assign_time desc')
            ->limit(($page-1)*$limit,$limit)
            ->select();
        $connomModel=new \app\marketm\controller\Common();
        if($houses){
            foreach($houses as $k =>$v){
                $houses[$k]['hd_status']=$connomModel->getStatusByHouseCode($v['h_b_id']);
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



    /*
     * 装修中
     * */
    public function decorating(){
        $userInfo=session('userInfo');
        $cityId=$userInfo['u_c_id'];
        $userId=$userInfo['u_id'];
        $where=" 1 =1 ";
        $keywords=trim($this->request->param('keywords'));
        if(isset($keywords) && !empty($keywords)){
            $where.=" and ( h_b_id like '%".$keywords."%')";
            $this->assign('keywords',$keywords);
        }
        $houses=Db::table('dcxw_house_allocate')
            ->distinct(true)
            ->join('dcxw_house','dcxw_house.h_b_id = dcxw_house_allocate.hat_house_code')
            ->join('dcxw_house_decorate_status','dcxw_house_decorate_status.hds_house_code = dcxw_house_allocate.hat_house_code')
            ->where(['hat_c_id' => $cityId,'hat_assign_to' => $userId,'h_isable' => 2,'hat_type' => 1])
            ->where('hds_end_status','<',6)
            ->where($where)
            ->limit(2)
            ->field('dcxw_house_allocate.*,dcxw_house.h_area,dcxw_house.h_address,dcxw_house.h_building,dcxw_house.h_b_id,dcxw_house.h_addtime')
            ->order('hat_assign_time desc')
            ->select();
        $connomModel=new \app\marketm\controller\Common();
        if($houses){
            foreach($houses as $k =>$v){
                $houses[$k]['hd_status']=$connomModel->getStatusByHouseCode($v['h_b_id']);
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
        $count=Db::table('dcxw_house_allocate')
            ->join('dcxw_house','dcxw_house.h_b_id = dcxw_house_allocate.hat_house_code')
            ->join('dcxw_house_decorate_status','dcxw_house_decorate_status.hds_house_code = dcxw_house_allocate.hat_house_code')
            ->where(['hat_c_id' => $cityId,'hat_assign_to' => $userId,'h_isable' => 2,'hat_type' => 1])
            ->where('hds_end_status','<',6)
            ->where($where)->count('distinct hat_id');
        $this->assign('count',$count);
        $this->assign('houses',$houses);
        return $this->fetch();
    }


    /*
     * 装修中加载更多
     * */
    public function decingmore(){
        $userInfo=session('userInfo');
        $cityId=$userInfo['u_c_id'];
        $userId=$userInfo['u_id'];
        $where=" 1 =1 ";
        if($_POST){
            $page=intval(trim($this->request->param('page')));
            $keywords=trim($this->request->param('keywords'));
            $where.=" and ( h_name like '%".$keywords."%' or h_building like '%".$keywords."%' or h_address like '%".$keywords."%'  or h_description like '%".$keywords."%' )";
        }else{
            $page=1;
        }
        $limit=2;
        $houses=Db::table('dcxw_house_allocate')
            ->distinct(true)
            ->join('dcxw_house','dcxw_house.h_b_id = dcxw_house_allocate.hat_house_code')
            ->join('dcxw_house_decorate_status','dcxw_house_decorate_status.hds_house_code = dcxw_house_allocate.hat_house_code')
            ->where(['hat_c_id' => $cityId,'hat_assign_to' => $userId,'h_isable' => 2,'hat_type' => 1])
            ->where('hds_end_status','<',6)
            ->where($where)
            ->limit(($page-1)*$limit,$limit)
            ->field('dcxw_house_allocate.*,dcxw_house.h_area,dcxw_house.h_address,dcxw_house.h_building,dcxw_house.h_b_id,dcxw_house.h_addtime')
            ->order('hat_assign_time desc')
            ->select();
        $connomModel=new \app\marketm\controller\Common();
        if($houses){
            foreach($houses as $k =>$v){
                $houses[$k]['hd_status']=$connomModel->getStatusByHouseCode($v['h_b_id']);
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


    public function allocated(){
        $userInfo=session('userInfo');
        $cityId=$userInfo['u_c_id'];
        $userId=$userInfo['u_id'];
        $where=" 1 =1 ";
        $keywords=trim($this->request->param('keywords'));
        if(isset($keywords) && !empty($keywords)){
            $where.=" and ( h_b_id like '%".$keywords."%')";
            $this->assign('keywords',$keywords);
        }
        $houses=Db::table('dcxw_house_allocate')
            ->join('dcxw_house','dcxw_house.h_b_id = dcxw_house_allocate.hat_house_code')
            ->join('dcxw_house_decorate_status','dcxw_house_decorate_status.hds_house_code = dcxw_house_allocate.hat_house_code')
            ->where(['hat_c_id' => $cityId,'hat_assign_to' => $userId,'hat_type' => 1])
            ->where('h_isable','in',[3,4,5,8])
            ->where(['hds_end_status' => 6])
            ->limit(1)
            ->where($where)
            ->order('hat_assign_time desc')
            ->select();
        $connomModel=new \app\marketm\controller\Common();
        if($houses){
            foreach($houses as $k =>$v){
                $houses[$k]['hd_status']=$connomModel->getStatusByHouseCode($v['h_b_id']);
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
        $count=Db::table('dcxw_house_allocate')
            ->join('dcxw_house','dcxw_house.h_b_id = dcxw_house_allocate.hat_house_code')
            ->join('dcxw_house_decorate_status','dcxw_house_decorate_status.hds_house_code = dcxw_house_allocate.hat_house_code')
            ->where(['hat_c_id' => $cityId,'hat_assign_to' => $userId,'hat_type' => 1])
            ->where('h_isable','in',[3,4,5,8])
            ->where(['hds_end_status' => 6])
            ->where($where)->count('distinct hat_id');
        $this->assign('count',$count);
        $this->assign('houses',$houses);
        return $this->fetch();
    }


    public function alledmore(){
        $userInfo=session('userInfo');
        $cityId=$userInfo['u_c_id'];
        $userId=$userInfo['u_id'];
        $where=" 1 =1 ";
        if($_POST){
            $page=intval(trim($this->request->param('page')));
            $keywords=trim($this->request->param('keywords'));
            $where.=" and ( h_name like '%".$keywords."%' or h_building like '%".$keywords."%' or h_address like '%".$keywords."%'  or h_description like '%".$keywords."%' )";
        }else{
            $page=1;
        }
        $limit=1;
        $houses=Db::table('dcxw_house_allocate')
            ->join('dcxw_house','dcxw_house.h_b_id = dcxw_house_allocate.hat_house_code')
            ->join('dcxw_house_decorate_status','dcxw_house_decorate_status.hds_house_code = dcxw_house_allocate.hat_house_code')
            ->where(['hat_c_id' => $cityId,'hat_assign_to' => $userId,'hat_type' => 1])
            ->where('h_isable','in',[3,4,5,8])
            ->where(['hds_end_status' => 6])
            ->where($where)
            ->order('hat_assign_time desc')
            ->limit(($page-1)*$limit,$limit)
            ->field('dcxw_house_allocate.*,dcxw_house.h_area,dcxw_house.h_address,dcxw_house.h_building,dcxw_house.h_b_id,dcxw_house.h_addtime')
            ->select();
        $connomModel=new \app\marketm\controller\Common();
        if($houses){
            foreach($houses as $k =>$v){
                $houses[$k]['hd_status']=$connomModel->getStatusByHouseCode($v['h_b_id']);
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
        $userInfo=session('userInfo');
        $commonModel=new \app\marketm\controller\Common();
        if($userInfo){
            $userInfo['u_depart_id']=$commonModel->getDepartNameByDepartId($userInfo['u_depart_id']);
            $userInfo['u_c_id']=$commonModel->getCitynameByCityId($userInfo['u_c_id']);
        }
        $this->assign('user',$userInfo);
        return $this->fetch();
    }

    public function resetpwd(){
        $account=session('userInfo');
        $this->assign('account',$account);
        if($_POST){
            $u_id=intval(trim($_POST['u_id']));
            $u_password=Db::table('dcxw_user')->where(['u_id' =>$u_id])->column('u_password');
            $u_passwords=$u_password[0];
            $password=md5(trim($_POST['u_password']));
            $passNew=md5(trim($_POST['u_passwordn']));
            if($u_passwords != $password){
                $this->error('您输入的密码与原始密码不一致，请重新输入！');
            }else{
                if($u_passwords == $passNew){
                    $this->error('输入的新密码请勿与原密码相同！');
                }else{
                    $data['u_password']=md5(trim($_POST['u_passwordn']));
                    $update=Db::table('dcxw_user')->where(['u_id' =>$u_id])->update($data);
                    if($update){
                        session(null);
                        $this->success('修改成功，请重新登录！');
                    }else{
                        $this->error('修改密码失败！');
                    }
                }
            }
        }else{
            return $this->fetch();
        }
    }
    public function details(){
        $h_id=trim($_GET['h_id']);
        $type=intval(trim($_GET['type']));
        //房屋基本信息
        $house=Db::table('dcxw_house')
            ->where(['h_b_id' => $h_id])
            ->find();
        if($house){
            $house['h_addtime']=date('Y-m-d',$house['h_addtime']);
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
        $commodel=new \app\marketm\controller\Common();
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
        $this->assign('type',$type);
        $this->assign('attach',$attach);
        return $this->fetch();
    }

    /*
     * 工程部修改房源附属信息
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

    /*
     * 工程部修改房源
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



    public function dailylog(){
        $h_id=trim($_GET['h_id']);
        $type=trim($_GET['type']);
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
                $dailyLog[$k]['hdl_img']=explode(',',$v['hdl_img'])[0]?explode(',',$v['hdl_img'])[0]:'__WEB__/img/no-img.png';
                $dailyLog[$k]['hdl_addtime']=date("Y-m-d H:i:s", $v['hdl_addtime']);

            }
        }
        $this->assign('count',$count);
        $this->assign('status',$status);
        $this->assign('h_id',$h_id);
        $this->assign('type',$type);
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
        $type=trim($_GET['type']);
        $this->assign('type',$type);
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
        $connomModel=new \app\marketm\controller\Common();
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
            $statusTip=$connomModel->getStatus($status);
            $nextStatus=$connomModel->getStatus(intval(intval($status)+1));
            $this->assign('statusStart',$statusTip);
            $this->assign('nextStatus',$nextStatus);
            $this->assign('status',$status);
            $this->assign('h_id',$h_id);
            return $this->fetch();
        }
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
            $isMsg=intval(trim($_POST['isMsg']));
            //$isTrans==1结转;==2不结转
            if($isTrans==1){
                //1.修改装修主表状态
                if($status == 7){
                    //二次结转
                    $decorateStatus=Db::table('dcxw_house_decorate')
                        ->where(['hd_house_code' => $h_id])
                        ->update(['hd_status' => 6]);
                    $endStatus=$status-1;
                    //修改主表房源状态；
                    Db::table('dcxw_house')
                        ->where(['h_b_id' => $h_id])
                        ->update(['h_isable' => 8]);
                    //修改分配表显示状态；
                    Db::table('dcxw_house_allocate')
                        ->where(['hat_house_code' => $h_id , 'hat_type' => 2])
                        ->update(['hat_add_time' => time(),'hat_ishow' => 1,'hat_admin' => $userInfo['u_id']]);
                }else{
                    $decorateStatus=Db::table('dcxw_house_decorate')
                        ->where(['hd_house_code' => $h_id])
                        ->setInc('hd_status');
                    $endStatus=intval($status+1);
                }
                //2.添加装修状态表记录
                $statusq['hds_house_code']=$h_id;
                $statusq['hds_start_status']=$status;
                $statusq['hds_change_time']=time();
                $statusq['hds_end_status']=$endStatus;
                $statusq['hds_change_tips']=$remarks;
                $statusq['hds_user_id']=$userInfo['u_id'];
                $changeLog=Db::table('dcxw_house_decorate_status')->insert($statusq);
                //3.添加装修日志记录
                $add=Db::table('dcxw_house_decorate_log')->insert($data);
                if($status == 5){
                    Db::table('dcxw_house')
                        ->where(['h_b_id' => $h_id])
                        ->update(['h_isable' => 8]);
                    //给转交分配表增添数据
                    $datas['hat_house_code']=$h_id;
                    $datas['hat_c_id']=$userInfo['u_c_id'];
                    $datas['hat_sub_tips']=$remarks;
                    $datas['hat_add_time']=time();
                    $datas['hat_is_assign']=2;
                    $datas['hat_type']=2;
                    $datas['hat_admin']=$userInfo['u_id'];
                    Db::table('dcxw_house_allocate')->insert($datas);
                }
                if($isMsg == 1){
                    //发送短信
                    $commonModel=new \app\marketm\controller\Common();
                    $adminInfo=$commonModel->getOperNameViaCityId($userInfo['u_c_id']);
                    $sendMsg=$commonModel->sendMsg($adminInfo);
                    if(!empty($sendMsg) && $sendMsg == 1){
                        $this->success('转交成功！短信已发送。');
                    }else{
                        $this->error('转交失败！');
                    }
                }else{
                    //4.如果转入运营部，则主表的h_isable=3；运营部配置中。
                    if($add && $decorateStatus && $changeLog){
                        $this->success('添加成功！','',$_POST);
                    }else{
                        $this->error('添加失败！','',$_POST);
                    }
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
        $type=trim($_GET['type']);
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
        //吧施工节点转化为文字
//        状态变更表1.事业部专项工程部；2工程部开始开工；3进场检查；4水电验收；5防水验收；6瓦工验收，7乳胶漆验收；8主材验收；9软装验收；10；自检;11,移交给运营部
        $connomModel=new \app\marketm\controller\Common();
        $daily['hdl_status']=$connomModel->getStatus($daily['hdl_status']);
        $this->assign('type',$type);
        $this->assign('logs',$daily);
        return $this->fetch();
    }

    public function steps(){
        return $this->fetch();
    }


    public function timeline(){
        $h_id=trim($_GET['h_id']);
        $type=trim($_GET['type']);
        $step=Db::table('dcxw_house_decorate_status')
            ->where(['hds_house_code' => $h_id])
            ->order('hds_change_time desc')
            ->select();
        $connomModel=new \app\marketm\controller\Common();
        foreach ($step as $k => $v){
            $step[$k]['hds_end_statuss']=$connomModel->getStatus($v['hds_end_status']);
            $step[$k]['hds_change_time']=$connomModel->get_last_time($v['hds_change_time']);
        }
        $this->assign('type',$type);
        $this->assign('step',$step);
        return $this->fetch();
    }
}