<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/10/10
 * Time: 14:04
 * Name: Controller
 */
namespace app\admin\controller;
use think\Controller;
use think\Db;

class Question extends Controller{
    public function index(){
        return $this->fetch();
    }

    public function questionData(){
        $where="1 = 1";
        $count=Db::table('dcxw_question')
            ->where($where)
            ->count();
        $page= $this->request->param('page',1,'intval');
        $limit=$this->request->param('limit',10,'intval');
        $example=Db::table('dcxw_question')
            ->where($where)
            ->limit(($page-1)*$limit,$limit)
            ->order('q_addtime desc')
            ->select();
        foreach($example as $k => $v ){
            $example[$k]['q_addtime'] = date('Y-m-d H:i:s',$v['q_addtime']);
        }
        $res['code'] = 0;
        $res['msg'] = "";
        $res['data'] = $example;
        $res['count'] = $count;
        return json($res);
    }
}