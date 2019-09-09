<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/9/8
 * Time: 11:08
 * Name: 新闻资讯
 */
namespace app\index\controller;
use think\Controller;
use think\Db;

class News extends Controller{

    /*
     * 新闻资讯列表
     * */
    public function index(){
//        文章分类：1.房租优势；2精彩瞬间，3企业优势，4.小屋快讯，5.装修风格
        if($_GET){
            $art_type=intval(trim($_GET['art_type']));
        }else{
            $art_type=4;
        }
        $this->assign('art_type',$art_type);
        //热线电话
        $hotLine=Db::table('super_setinfo')->where(['s_key' => 'hotline'])->column('s_value');
        $this->assign('hotLine',$hotLine[0]);
        //网站导航
        $navInfo=Db::table('super_nav')
            ->where(['nav_isable' => 1])
            ->order('nav_order desc')
            ->field('nav_title,nav_url')
            ->select();
        $this->assign('navinfo',$navInfo);
        //文章列表
        $where=[
            'art_isable' => 1
        ];
        $page= $this->request->param('page',1,'intval');
        $limit=$this->request->param('limit',6,'intval');
        $count=Db::table('super_article')
            ->where($where)
            ->where(['art_type' => $art_type])
            ->count();
        $artInfo=Db::table('super_article')
            ->where($where)
            ->where(['art_type' => $art_type])
            ->order('art_view desc')
            ->limit(($page-1)*$limit,$limit)
            ->select();
        foreach ($artInfo as $k => $v){
            $artInfo[$k]['art_updatetime']=date('Y-m-d H:i:s',$v['art_updatetime']);
            $artInfo[$k]['art_subtitle']=mb_strlen($v['art_subtitle'])>95?mb_substr($v['art_subtitle'],0,95).'...':$v['art_subtitle'];
        }
        $this->assign('page',$page);
        $this->assign('limit',$limit);
        $this->assign('count',$count);
        $this->assign('artInfo',$artInfo);

        $hotArt=Db::table('super_article')
            ->where(['art_isable' => 1])
            ->order('art_view desc')
            ->limit(4)
            ->field('art_id,art_title,art_img,art_img_alt')
            ->select();
        $this->assign('hotArt',$hotArt);
        return $this->fetch();
    }

    /*
     * 新闻资讯详情页
     * */
    public function details(){
        $art_id=$_GET['art_id'];
        //浏览热度加一
        Db::table('super_article')->where(['art_id' => $art_id])->setInc('art_view');
        //文章详情
        $artInfo=Db::table('super_article')
            ->where(['art_id' => $art_id])
            ->find();
        $artInfo['art_updatetime']=date('Y-m-d',$artInfo['art_updatetime']);
        $this->assign('art',$artInfo);
        //热线电话
        $hotLine=Db::table('super_setinfo')->where(['s_key' => 'hotline'])->column('s_value');
        $this->assign('hotLine',$hotLine[0]);
        //网站导航
        $navInfo=Db::table('super_nav')
            ->where(['nav_isable' => 1])
            ->order('nav_order desc')
            ->field('nav_title,nav_url')
            ->select();
        $this->assign('navinfo',$navInfo);
        //首页banner
        $banner=Db::table('super_banner')->where(['ba_isable' => 1])->order('ba_order desc')->select();
        $this->assign('banner',$banner);

        $hotArt=Db::table('super_article')
            ->where('art_id','neq',$art_id)
            ->where(['art_isable' => 1])
            ->order('art_view desc')
            ->limit(4)
            ->field('art_id,art_title,art_img,art_img_alt')
            ->select();
        $this->assign('hotArt',$hotArt);
        return $this->fetch();
    }
}