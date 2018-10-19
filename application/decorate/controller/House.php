<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/10/9
 * Time: 16:31
 * Name: Controller
 */
namespace app\decorate\controller;
use think\Controller;

class House extends Controller{
    public function index(){
        return $this->fetch();
    }
}