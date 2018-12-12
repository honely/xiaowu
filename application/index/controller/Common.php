<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/11/28
 * Time: 14:06
 */
namespace app\index\controller;
use think\Controller;

class Common extends Controller{

    public function index(){
        return $this->fetch();
    }
}