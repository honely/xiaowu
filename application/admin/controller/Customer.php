<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/9/19
 * Time: 10:09
 */
namespace app\admin\controller;
use think\Controller;
use think\Db;

class Customer extends Controller{


    /*
     * 会员管理
     * */
    public function index(){
        return $this->fetch();
    }

    /*
     * 营销管理
     * */
    public function conpon(){
        return $this->fetch();
    }


    /*
     * conponData
     * */
    public function conponData(){
        $where = " 1 = 1";
        $count=Db::table('dcxw_coupon')
            ->join('dcxw_admin','dcxw_admin.ad_id = dcxw_coupon.cp_admin')
            ->where($where)->count();
        $page= $this->request->param('page',1,'intval');
        $limit=$this->request->param('limit',10,'intval');
        $coupon=Db::table('dcxw_coupon')
            ->join('dcxw_admin','dcxw_admin.ad_id = dcxw_coupon.cp_admin')
            ->limit(($page-1)*$limit,$limit)
            ->where($where)
            ->order('cp_addtime desc')
            ->select();
        foreach ($coupon as $k =>$v){
            $coupon[$k]['cp_deadline'] = date('Y-m-d H:i:s',$v['cp_deadline']);
            $coupon[$k]['cp_addtime'] = date('Y-m-d H:i:s',$v['cp_addtime']);
        }
        $res['code'] = 0;
        $res['data'] = $coupon;
        $res['count'] = $count;
        return json($res);
    }

    public function addconpon(){
        if($_POST){
            $stime=strtotime(date('Y-m-d 00:00:00'));
            $etime=strtotime(date('Y-m-d 23:59:59'));
            //获取当日预约的数量
            $buNum=Db::table('dcxw_coupon')->where('cp_addtime','between',[$stime,$etime])->count();
            //生成用户编号；
            $data['cp_bid'] = date('Ymd').sprintf("%04d", $buNum+1);
            $data['cp_addtime'] =time();
            $data=$_POST;
            $add=Db::table('dcxw_coupon')->insert($data);
            if($add){
                $this->success('发布文章成功！','article');
            }else{
                $this->error('发布文章失败！','article');
            }
        }else{
            $adminId=session('adminId');
            $ad_role=intval(session('ad_role'));
            if($ad_role == 1 ){// 超级管理员
                $provInfo=Db::table('dcxw_coupon')->select();
                $this->assign('prov',$provInfo);
            }else{
                $adminInfo=Db::table('dcxw_coupon')
                    ->join('dcxw_province','dcxw_province.p_id = dcxw_admin.ad_p_id')
                    ->join('dcxw_city','dcxw_city.c_id = dcxw_admin.ad_c_id')
                    ->join('dcxw_role','dcxw_role.r_id = dcxw_admin.ad_role')
                    ->join('dcxw_branch','dcxw_branch.b_id = dcxw_admin.ad_branch')
                    ->field('dcxw_admin.ad_realname,dcxw_province.p_name,dcxw_city.c_name,dcxw_branch.b_name,dcxw_role.r_name')
                    ->where(['ad_id' => $adminId])
                    ->find();
                $this->assign('admin',$adminInfo);
            }
            $this->assign('ad_role',$ad_role);
            return $this->fetch();
        }
    }

    public function editconpon(){
        return $this->fetch();
    }

}