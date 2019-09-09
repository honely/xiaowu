<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/5/7
 * Time: 11:33
 */
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
class Index extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $adminName=session('adminName');
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
	
	
	
    public function header(){
        $menuList=Db::table('super_menu')
            ->where(['m_fid' => '0', 'm_type' => '1'])
            ->order('m_id desc')
            ->select();
        foreach ($menuList as $k =>$v){
            $menuList[$k]['child'] = Db::table('super_menu')->where(['m_fid' => $v['m_id'], 'm_type' => '1'])->select();
        }
        $this->assign('menuList',$menuList);
        return  $this->fetch();
    }
    //尾部渲染
    public function footer(){
        return  $this->fetch();
    }
    public function index(){
        $ad_role=session('ad_role');
        $adminId = session('adminId');
        $userData = Db::table("super_admin")
                    ->alias('admin')
                    ->join('super_role role',"admin.ad_role=role.r_id")
                    ->where(['admin.ad_id' => $adminId])
                    ->find();
        if($userData){
            $power_list = explode(',',trim($userData['r_power'],','));
            if($power_list){
                foreach ($power_list as $val){
                    $menu_list = Db::table("super_menu")
                                 ->where(['m_id' =>$val])
                                 ->find();
                    $powerData[] = $menu_list;
                }
            }
        };
        if($powerData){
            $parentData = [];
            foreach ($powerData as $key => $val){
                if($val['m_fid'] == 0 && $val['m_type'] == 1){
                    $parentData[] = $val;
                }
            }
            foreach ($powerData as $key => $val){
                if($val['m_fid'] != 0 && $val['m_type'] == 1){
                    if(!empty($parentData)){
                        foreach ($parentData as $k => $v){
                            if($v !== null){
                                if($v['m_id'] == $val['m_fid']){
                                    $parentData[$k]['child'][] = $val;
                                }
                            }
                        }
                    }
                }
            }
        }
        if($ad_role == 1){
            $adminInfo=Db::table('super_admin')
                ->join('super_role','super_admin.ad_role = super_role.r_id')
                ->where(['ad_id' => $adminId])
                ->find();
        }else{
            $adminInfo=Db::table('super_admin')
                ->join('super_city','super_admin.ad_c_id = super_city.c_id')
                ->join('super_role','super_admin.ad_role = super_role.r_id')
                ->join('super_branch','super_admin.ad_branch = super_branch.b_id')
                ->where(['ad_id' => $adminId])
                ->find();
        }
        $branchId=session('ad_branch');
        $branchInfo=Db::table('super_branch')->where(['b_id' => $branchId])->field('b_prex')->find();
        $this->assign('branchWeb',$branchInfo['b_prex']);
        $this->assign('admin',$adminInfo);
        $this->assign('menuList',$parentData);
        $siteName=Db::table('super_setinfo')->where(['s_key' => 'webname'])->column('s_value');
        $this->assign('siteName',$siteName[0]);
        $this->assign('ad_role',$ad_role);
        return  $this->fetch();
    }



    //基本资料
    public function details(){
        return $this->fetch();
    }


    //网站首页。欢迎页
    public function welcome(){

        return $this->fetch();
    }

    public function resetpwd(){
        $adminId=session('adminId');
        $this->assign('admin_id',$adminId);
        return $this->fetch();
    }

    public function resetpass(){
        $adminId=session('adminId');
        if($_POST){
            $oldPwd=md5($_POST['oldPwd']);
            $newPwd=md5($_POST['newPwd']);
            $newPwd1=md5($_POST['newPwd2']);
            $adminInfo=Db::table('super_admin')->where(['ad_id' => $adminId])->field('ad_password')->find();
            $adPwd=$adminInfo['ad_password'];
            if($adPwd != $oldPwd){
                $this->error('您输入的密码与原始密码不一致，请重新输入！');
            }else{
                if($newPwd != $newPwd1){
                    $this->error('您两次输入的新密码不一致，请重新输入！');
                }else{
                    if($adPwd == $newPwd){
                        $this->error('输入的新密码请勿与原密码相同！');
                    }else{
                        $data['ad_password']=$newPwd;
                        $resetPwd=Db::table('super_admin')->where(['ad_id' => $adminId])->update($data);
                        if($resetPwd){
                            session(null);
                            $this->success('修改密码成功，请重新登录！','login/login');
                        }else{
                            $this->error('修改密码失败','index');
                        }
                    }
                }
            }
        }
    }


    public function adminDetails(){
        $ad_id= session('adminId');
        if($ad_id ==  1){
            $adminInfo=Db::table('super_admin')
                ->where(['ad_id' => $ad_id])
                ->find();;
        }else{
            $adminInfo=Db::table('super_admin')
                ->join('super_province','super_province.p_id = super_admin.ad_p_id')
                ->join('super_city','super_city.c_id = super_admin.ad_c_id')
                ->join('super_branch','super_branch.b_id = super_admin.ad_branch')
                ->field('super_admin.*,super_province.p_name,super_city.c_name,super_branch.b_name')
                ->where(['ad_id' => $ad_id])
                ->find();
        }
        $this->assign('admin',$adminInfo);
        return $this->fetch();
    }


    //完善信息
    public function updateAdmin(){
        $ad_id=intval(session('adminId'));
        if($_POST){
            $data=$_POST;
            $update=Db::table('super_admin')->where(['ad_id' => $ad_id])->update($data);
            if($update){
                $this->success('完善信息成功！');
            }else{
                $this->success('完善信息失败！');
            }
        }
    }
}
