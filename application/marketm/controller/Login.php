<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/9/22
 * Time: 13:48
 */
namespace app\marketm\controller;
use think\Controller;
use think\Db;

class Login extends Controller{
    public function login(){
        if($_POST){
            $account=trim($_POST['u_account']);
            $isExist=Db::table('dcxw_user')
                ->where('( u_phone = '.$account.' or u_email = '.$account.')')
                ->where(['u_isable' => 1])
                ->find();
            if($isExist){
                $ePassword=$isExist['u_password'];
                $password=md5(trim($_POST['u_password']));
                if($ePassword !=$password){
                    $this->error('密码输入错误，请重试！');
                }else{
                    session('userInfo',$isExist);
                    if($isExist['u_depart_id'] <= 6 && $isExist['u_depart_id'] >= 1 && isset($isExist['u_depart_id'])){
                        $this->success('登录成功！','',$isExist);
                    }else{
                        $this->error('您暂无该平台操作权限！','',$isExist);
                    }
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
        $this->success('成功退出','login', 3);
    }
}