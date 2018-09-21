<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/9/19
 * Time: 13:34
 * Name: 手机端电子书
 */
namespace app\wap\controller;
use think\Controller;
use think\Db;

class Index extends Controller{


    /*
     * 手机站首页
     * 课程列表页
     * */
    public function index(){
        $lesson=Db::table('dcxw_lession')
            ->where(['ls_isable' => 1])
            ->order('ls_order desc')
            ->select();
        $this->assign('lesson',$lesson);
        return $this->fetch();
    }


    /*
     * 课程章节列表页
     * */
    public function chapter(){
        $ls_id=intval(trim($_GET['ls_id']));
        $lesson=Db::table('dcxw_lession')->where(['ls_id' => $ls_id])->column('ls_title');
        Db::table('dcxw_lession')->where(['ls_id' => $ls_id])->setInc('ls_view');
        $chapter=Db::table('dcxw_chapter')
            ->where(['lc_ls_id' => $ls_id,'lc_isable' => 1])
            ->order('lc_order desc')
            ->select();
        $this->assign('lesson',$lesson[0]);
        $this->assign('chapter',$chapter);
        return $this->fetch();
    }

    /*
     * 详情页
     * */
    public function details(){
        $lc_id=intval(trim($_GET['lc_id']));
        //浏览量加一
        Db::table('dcxw_chapter')->where(['lc_id' => $lc_id])->setInc('lc_view');
        $content=Db::table('dcxw_chapter')
            ->join('dcxw_lession','dcxw_chapter.lc_ls_id=dcxw_lession.ls_id')
            ->field('dcxw_chapter.*,dcxw_lession.ls_title')
            ->find($lc_id);
        $content['lc_addtime']=date('m-d H:i',$content['lc_addtime']);
        $this->assign('content',$content);
        return $this->fetch();
    }


}
