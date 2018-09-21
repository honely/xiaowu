<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/9/7
 * Time: 14:12
 */
namespace app\index\controller;
use think\Controller;
use think\Db;

class Index extends Controller{


    /*
     * 大城小屋首页
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
        $this->assign('navinfo',$navInfo);
        //首页banner
        $banner=Db::table('dcxw_banner')->where(['ba_isable' => 1])->order('ba_order desc')->select();
        $this->assign('banner',$banner);

        //房源
        $house=Db::table('dcxw_house')
            ->where(['h_isable' => 1,'h_rent_status' => 2])
            ->order('h_istop,h_view desc')
            ->select();
        $this->assign('house',$house);
        return $this->fetch();
    }
}