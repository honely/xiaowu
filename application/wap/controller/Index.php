<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/9/19
 * Time: 13:34
 * Name: 手机端电子书
 */
namespace app\wap\controller;
use think\Controller;
use think\Db;
use think\Request;

class Index extends Controller{


    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $userInfo=session('userInfo');
        if(empty($userInfo) || $userInfo == null ){
            $this->redirect('login/login');
        }
    }

    /*
     * 手机站首页
     * 课程列表页
     * */
    public function index(){
        $lesson=Db::table('dcxw_lession')
            ->where(['ls_isable' => 1])
            ->order('ls_order desc')
            ->select();
        $this->assign('lesson',$lesson);
        return $this->fetch();
    }


    /*
     * 课程章节列表页
     * */
    public function chapter(){
        $ls_id=intval(trim($_GET['ls_id']));
        $lesson=Db::table('dcxw_lession')->where(['ls_id' => $ls_id])->column('ls_title');
        Db::table('dcxw_lession')->where(['ls_id' => $ls_id])->setInc('ls_view');
        $chapter=Db::table('dcxw_chapter')
            ->where(['lc_ls_id' => $ls_id,'lc_isable' => 1])
            ->order('lc_order desc')
            ->select();
        $this->assign('lesson',$lesson[0]);
        $this->assign('chapter',$chapter);
        return $this->fetch();
    }

    /*
     * 详情页
     * */
    public function details(){
        $lc_id=intval(trim($_GET['lc_id']));
        //浏览量加一
        Db::table('dcxw_chapter')->where(['lc_id' => $lc_id])->setInc('lc_view');
        $content=Db::table('dcxw_chapter')
            ->join('dcxw_lession','dcxw_chapter.lc_ls_id=dcxw_lession.ls_id')
            ->field('dcxw_chapter.*,dcxw_lession.ls_title')
            ->find($lc_id);
        $content['lc_addtime']=date('m-d H:i',$content['lc_addtime']);
        $this->assign('content',$content);
        return $this->fetch();
    }



    /*
     * 修改密码
     * */
    public function resetPwd(){
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



    public function person(){
        return $this->fetch();
    }
}
