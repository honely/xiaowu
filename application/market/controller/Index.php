<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/10/9
 * Time: 15:58
 * Name: 事业部-房源输入端Controller
 */
namespace app\market\controller;
use think\Controller;
use think\Request;

class Index extends Controller{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $userInfo=session('userInfo');
        if(!empty($userInfo)){
            $this->assign('userInfo',$userInfo);
        }
    }

    public function index(){
        return  $this->fetch();
    }


    public function welcome(){
        return $this->fetch();
    }
}