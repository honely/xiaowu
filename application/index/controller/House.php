<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/9/8
 * Time: 10:52
 * Name: 房屋托管
 */
namespace app\index\controller;
use think\Controller;
use think\Db;

class House extends Controller{

    /*
     * 房屋托管列表页
     * */
    public function index(){
        //热线电话
        $hotLine=Db::table('dcxw_setinfo')->where(['s_key' => 'hotline'])->column('s_value');
        $this->assign('hotLine',$hotLine[0]);
        //网站导航
        $navInfo=Db::table('dcxw_nav')
            ->where(['nav_isable' => 1])
            ->order('nav_order desc')
            ->field('nav_title,nav_url')
            ->select();
        $cityInfo=Db::table('dcxw_city')->field('c_id,c_name')->select();
        $this->assign('cityInfo',$cityInfo);
        $this->assign('navinfo',$navInfo);
        return $this->fetch();
    }



    /*
     *
     * 房屋托管预约
     * */
    public function deposit(){
        if($_POST){
            //判断电话号码是否重复提交
            $time=time();
            $sTime=strtotime(date('Y-m-d',$time) ."00:00:00");
            $eTime=strtotime(date('Y-m-d',$time) ."23:59:59");
            $phone=trim($_POST['dp_phone']);
            $isrepeat=Db::table('dcxw_deposit')
                ->where(['dp_phone' => $phone])
                ->where('dp_addtime >= '.$sTime.' and dp_addtime <= '.$eTime.'')
                ->find();
            if($isrepeat){
                return  json(['code' => '0','msg' => '您已提交托管信息，客服会在12小时内联系您！']);
            }else{
                $data['dp_name']=$_POST['dp_name'];
                $data['dp_phone']=$_POST['dp_phone'];
                $data['dp_c_id']=$_POST['dp_c_id'];
                $data['dp_addtime']=time();
                $data['dp_updatetime']=time();
                $add=Db::table('dcxw_deposit')->insert($data);
                if($add){
                    return  json(['code' => '1','msg' => '提交成功！']);
                }else{
                    return  json(['code' => '0','msg' => '预约失败！']);
                }
            }
        }
    }

}