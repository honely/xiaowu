<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/10/9
 * Time: 16:05
 * Name: Controller
 */
namespace app\decorate\controller;
use think\Controller;

class Common extends Controller{
    public function header(){

        return  $this->fetch();
    }
    //尾部渲染
    public function footer(){
        return  $this->fetch();
    }
}