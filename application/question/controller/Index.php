<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/10/10
 * Time: 9:56
 * Name: Controller
 */
namespace app\question\controller;
use think\Controller;
use think\Db;

class Index extends Controller{
    public function index(){
        if($_POST){
            $data=$_POST;
            $data['q_addtime']=time();
            $add=Db::table('dcxw_question')->insert($data);
            if($add){
                $this->success('提交成功！');
            }else{
                $this->error('提交失败！');
            }
        }else{
            return $this->fetch();
        }
    }
}