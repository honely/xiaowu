<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/10/9
 * Time: 15:58
 * Name: 事业部-房源输入端Controller
 */
namespace app\decorate\controller;
use think\Controller;

class Index extends Controller{


    public function index(){
        return  $this->fetch();
    }


    public function welcome(){
        return $this->fetch();
    }
}