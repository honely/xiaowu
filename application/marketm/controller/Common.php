<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/10/13
 * Time: 10:27
 * Name: Controller
 */
namespace app\marketm\controller;
use think\Controller;
use think\Db;

class Common extends Controller{
    //二级联动根据传过来的省份id获取对应的城市名称
    public function getCityName(){
        $p_id=intval($_GET['p_id']);
        $cityNames=Db::table('dcxw_city')->where(['p_id' => $p_id])->select();
        if($cityNames){
            return  json(['code' => '1','data' => $cityNames]);
        }else{
            return  json(['code' => '0','data' => ['']]);
        }
    }


    //根据城市id获取
    public function getAreaName(){
        $c_id=intval($_GET['c_id']);
        $branch=Db::table('dcxw_area')
            ->where(['area_c_id' => $c_id])
            ->field('area_id,area_name')
            ->select();
        if($branch){
            return  json(['code' => '1','data' => $branch]);
        }else{
            return  json(['code' => '0','data' => ['']]);
        }
    }



    //上传打款凭证
    public function upload(){
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/market');
        if($info){
            $path_filename =  $info->getFilename();
            $path_date=date("Ymd",time());
            $path="/uploads/market/".$path_date."/".$path_filename;
            // 成功上传后 返回上传信息
            return json(array('state'=>1,'path'=>$path,'msg'=> '图片上传成功！'));
        }else{
            // 上传失败返回错误信息
            return json(array('state'=>0,'msg'=>'上传失败,请重新上传！'));
        }
    }


    //根据房屋状态编号获取相应文字

    public function getHouseStatus($status){
//        是否可租，1，事业部，2，工程部装修中；3,运营部配置中，4，可出租，5，已出租
        $statusTip='';
        switch ($status) {
            case 1:
                $statusTip="签单中";
                break;
            case 2:
                $statusTip="装修中";
                break;
            case 3:
                $statusTip="配置中";
                break;
            case 4:
                $statusTip="可出租";
                break;
            case 5:
                $statusTip="已出租";
                break;
        }
        return $statusTip;
    }


    public function getMasterStatus($h_id){
        $master=Db::table('dcxw_house_master')
            ->where(['hm_house_code' =>$h_id])
            ->count();
        return $master?$master:0;
    }


    public function getAttachStatus($h_id){
        $attach=Db::table('dcxw_house_attachment')
            ->where(['ha_house_code' =>$h_id])
            ->count();
        return $attach?$attach:0;
    }


    public function getDecorateMoney($h_id){
        $money=Db::table('dcxw_house_pay')->where(['hp_house_code' => $h_id])->column('hp_money');
        if(isset($money) && !empty($money)){
            return $money[0]?$money[0]:0;
        }else{
            return 0;
        }

    }
}