<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/11/9
 * Time: 9:34
 */
namespace app\admin\controller;

use think\Controller;
use think\Request;

class Partner extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $adminName=session('adminId');
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


    public function index(){
        return $this->fetch();
    }

    public function add(){
        return $this->fetch();
    }
    public function edit(){
        return $this->fetch();
    }
    public function order(){
        return $this->fetch();
    }
}
