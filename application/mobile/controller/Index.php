<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/9/26
 * Time: 9:19
 */
namespace app\mobile\controller;
use think\Controller;
use think\Db;

class Index extends Controller{
    public function index(){
        return $this->fetch();
    }

    /*
     * nav
     * */
    public function nav(){
        return $this->fetch();
    }

    /*
     * news
     * */
    public function news(){
        $news=Db::table('dcxw_article')
            ->where(['art_isable' => 1])
            ->order('art_istop,art_view desc')
            ->field('art_id,art_img,art_title')
            ->select();
        $this->assign('news',$news);
        return $this->fetch();
    }

    public function detail(){
        $art_id=intval(trim($_GET['art_id']));
        //浏览热度加一
        Db::table('dcxw_article')->where(['art_id' => $art_id])->setInc('art_view');
        $news=Db::table('dcxw_article')->where(['art_id' => $art_id])->find();
        $news['art_createtime']=date('m-d H:i',$news['art_createtime']);
        $this->assign('news',$news);
        return $this->fetch();
    }

    /*
     * house
     * */
    public function house(){
        return $this->fetch();
    }
    /*
     * deposit
     * */
    public function deposit(){
        if($_POST){
            $data['dp_name']=$_POST['dp_name'];
            $data['dp_phone']=$_POST['dp_phone'];
            $data['dp_addtime']=time();
            $data['dp_updatetime']=time();
            $add=Db::table('dcxw_deposit')->insert($data);
            if($add){
                return  json(['code' => '1','msg' => '提交成功！']);
            }else{
                return  json(['code' => '0','msg' => '预约失败！']);
            }
        }else{
            return $this->fetch();
        }
    }
    /*
     * about
     * */
    public function about(){
        return $this->fetch();
    }
}