<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/9/8
 * Time: 11:20
 * Name: 关于我们
 */
namespace app\index\controller;
use think\Controller;
use think\Db;

class About extends Controller{
    /*
     * 关于我们
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
        $hotArt=Db::table('dcxw_article')
            ->where(['art_isable' => 1])
            ->order('art_view desc')
            ->limit(4)
            ->field('art_id,art_title,art_img,art_img_alt')
            ->select();
        $this->assign('hotArt',$hotArt);
        return $this->fetch();
    }
}