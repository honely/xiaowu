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

        //banner
        $banner=Db::table('dcxw_banner')
            ->where(['ba_isable' => 1,'ba_via' =>2])
            ->order('ba_order desc')
            ->select();
        $this->assign('banNum',count($banner));
        $this->assign('banner',$banner);
        $house=Db::table('dcxw_house')
            ->where(['h_isable' => 1,'h_rent_status' => 2])
            ->limit(4)
            ->order('h_view desc')
            ->field('h_id,h_house_img,h_name')
            ->select();
        $this->assign('house',$house);
        $news=Db::table('dcxw_article')
            ->where(['art_isable' => 1])
            ->limit(4)
            ->order('art_istop,art_view desc')
            ->field('art_id,art_img,art_title,art_subtitle')
            ->select();
        $this->assign('news',$news);
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
            ->limit(2)
            ->order('art_istop,art_view desc')
            ->field('art_id,art_img,art_title')
            ->select();
        $count=Db::table('dcxw_article')
            ->where(['art_isable' => 1])
            ->count();
        $this->assign('news',$news);
        $this->assign('count',$count);
        return $this->fetch();
    }

    public function newsMore(){
        if($_POST){
            $page=intval(trim($_POST['page']));
        }else{
            $page=1;
        }
        $limit=2;
        $news=Db::table('dcxw_article')
            ->where(['art_isable' => 1])
            ->limit(($page-1)*$limit,$limit)
            ->order('art_istop,art_view desc')
            ->field('art_id,art_img,art_title')
            ->select();
        if($news){
            $this->success('更多完成','index/news',$news);
        }else{
            $this->error('更多失败','index/news',$news);
        }

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
        $where='1 = 1 ';
        if(isset($_GET['keywords']) && !empty($_GET['keywords'])){
            $keywords=trim($_GET['keywords']);
            $where.=" and ( h_name like '%".$keywords."%' or h_building like '%".$keywords."%' or h_address like '%".$keywords."%'  or h_description like '%".$keywords."%' )";
            $this->assign('keywords',$keywords);
        }
        $house=Db::table('dcxw_house')
            ->where($where)
            ->where(['h_isable' => 1,'h_rent_status' => 2])
            ->limit(4)
            ->order('h_view desc')
            ->field('h_id,h_house_img,h_name,h_rent,h_rent_type,h_area,h_subway,h_address,h_building,h_nearbus')
            ->select();
        $this->assign('house',$house);
        return $this->fetch();
    }

    public function details(){
        $h_id=intval(trim($_GET['h_id']));
        Db::table('dcxw_house')->where(['h_id' => $h_id])->setInc('h_view');
        $house=Db::table('dcxw_house')->where(['h_id' => $h_id])->find();
        $house['h_img']=explode(',',rtrim($house['h_img'],','));
        $house['h_config']=explode(',',$house['h_config']);
        $house['config_img']=[];
        for($i=0;$i<count($house['h_config']);$i++){
            $house['config_img'][$i]=Db::table('dcxw_type')->where(['type_id' => $house['h_config'][$i]])->field('type_name,type_img')->find();
        }
        $house['h_updatetime']=date('m-d H:i',$house['h_updatetime']);
        $this->assign('house',$house);
        return $this->fetch();
    }


    /*
     * advance
     * */
    public function advance(){

        return $this->fetch();
    }




    /*
     * house
     * */
    public function promise(){

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

    /*
     * 测试模块
     * */
    public function tab(){
        return $this->fetch();
    }
    public function tabs(){
        $page= $this->request->param('page',1,'intval');
        return $this->fetch();
    }
}