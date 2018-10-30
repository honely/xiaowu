<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/10/18
 * Time: 10:13
 * Name: Controller
 */
namespace app\decoration\controller;
use think\Controller;
use think\Db;

class Login extends Controller{
    public function login(){
        if($_POST){
            $account=trim($_POST['u_account']);
            $isExist=Db::table('dcxw_user')
                ->where(['u_phone' =>$account])
                ->whereOr(['u_email' =>$account])
                ->find();
            if($isExist){
                $ePassword=$isExist['u_password'];
                $password=md5(trim($_POST['u_password']));
                if($ePassword !=$password){
                    $this->error('密码输入错误，请重试！');
                }else{
                    session('userInfo',$isExist);
                    $this->success('登录成功！');
                }
            }else{
                $this->error('平台暂无此账户，请联系管理员！');
            }
        }else{
            return $this->fetch();
        }
    }

    /*
   * 退出登录
   * */
    public function loginout(){
        session(null);
        $this->success('成功退出','marketm/login/login', 3);
    }
}