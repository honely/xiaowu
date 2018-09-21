<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/4/20
 * Time: 14:44
 * Name: 区域管理
 */
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
class Regin extends Controller{

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $adminName=session('adminName');
        if(empty($adminName)){
            $this->error('请先登录！','login/login');
        }
        if(isset($_SESSION['expiretime'])) {
            if($_SESSION['expiretime'] < time()) {
                unset($_SESSION['expiretime']);
                $this->error('您的登录身份已过期，请重新登录！','login/login');
                exit(0);
            } else {
                $_SESSION['expiretime'] = time() + 1800; // 刷新时间戳
            }
        }
    }
    /*
         * 省份，后台可以自定义添加、修改、删除（若该省份下有城市，城市有分站不可删除）
         * */


    //1.省份列表（2018.04.20）
    public function province(){
        $provInfo=Db::table('dcxw_province')->order('p_id desc')->select();
        $this->assign('provInfo',$provInfo);
        return $this->fetch();
    }


    //2.添加省份（2018.04.20）
    public function addprov(){
        if($_POST){
            $data['p_name']=$_POST['p_name'];
            $addProv=Db::table('dcxw_province')->insert($data);
            if($addProv){
                $this->success('添加成功','district/district');
            }else{
                $this->error('添加失败','addProvince');
            }
        }else{
            return $this->fetch();
        }
    }


    //3.修改省份（2018.04.20）
    public function editProv(){
        $pId=intval($_GET['p_id']);
        if($_POST){
            $data['p_name']=$_POST['p_name'];
            $editProv=Db::table('dcxw_province')->where(['p_id' => $pId])->update($data);
            if($editProv){
                $this->success('编辑成功','district/district');
            }else{
                $this->error('您未做任何修改','district/district');
            }
        }else{
            $ProvInfo=Db::table('dcxw_province')->where(['p_id' => $pId])->find();
            if($ProvInfo){
                $this->assign('prov',$ProvInfo);
            }
            return $this->fetch();
        }
    }


    //4.删除省份（2018.04.20）若该省份下有城市，城市有分站不可删除
    public function delProv(){
        $p_id=intval($_GET['p_id']);
        $del=Db::table('dcxw_province')->where(['p_id' =>$p_id])->delete();
        if($del){
            $this->success('删除成功','district/district');
        }else{
            $this->success('删除失败','district/district');
        }
    }

    /*
     * 区域城市、后台可以自定义添加、修改、删除（若该城市有分站不可删除）
     * */

    //1.区域城市（2018.04.19）
    public function city(){
        $cityInfo=Db::table('dcxw_city')->order('c_id desc')->select();
        $provInfo=Db::table('dcxw_province')->select();
        $this->assign('prov',$provInfo);
        $this->assign('city',$cityInfo);
        return $this->fetch();
    }

    //2.添加区域城市（2018.04.20）
    public function addCity(){
        if($_POST){
            $data['p_id']=$_POST['p_id'];
            $data['c_name']=$_POST['c_name'];
            $data['c_q_id']=rtrim($_POST['ids'],',');
            $data['c_q_price']=rtrim($_POST['prices'],',');
            $addCity=Db::table('dcxw_city')->insert($data);
            if($addCity){
                $this->success('添加成功','city');
            }else{
                $this->error('添加失败','city');
            }
        }else{
            $provInfo=Db::table('dcxw_province')->select();
            //获取所有品质
            $quality=Db::table('dcxw_type')->where(['type_isable' => 1,'type_sort' => 3] )->select();
            $this->assign('quality',$quality);
            $this->assign('prov',$provInfo);
            return $this->fetch();
        }
    }


    //3.修改城市（2018.04.20
    public function editCity(){
        $cId=intval($_GET['c_id']);
        if($_POST){
            $data['c_name']=$_POST['c_name'];
            $data['p_id']=$_POST['p_id'];
            $data['c_q_id']=rtrim($_POST['ids'],',');
            $data['c_q_price']=rtrim($_POST['prices'],',');
            $editCity=Db::table('dcxw_city')->where(['c_id' => $cId])->update($data);
            if($editCity){
                $this->success('编辑成功','city');
            }else{
                $this->error('您未做任何修改','city');
            }
        }else{
            //获取所有品质
            $quality=Db::table('dcxw_type')
                ->where(['type_isable' => 1,'type_sort' => 3] )
                ->field('type_id , type_name')
                ->select();
            $provInfo=Db::table('dcxw_province')->select();
            $this->assign('prov',$provInfo);
            $cityInfo=Db::table('dcxw_city')->where(['c_id' => $cId])->find();
            $cityInfo['c_q_price']=explode(',',$cityInfo['c_q_price']);
			if($quality){
				foreach ($quality as $k => $v){
					$quality[$k]['price'] = "";
					for($i = 0 ; $i < count($cityInfo['c_q_price']) ; $i++){
						if($i == $k){
							$quality[$k]['type_name'] = $v['type_name'];
							$quality[$k]['price'] = $cityInfo['c_q_price'][$i];
						}
					}
				}
			}
            if($cityInfo){
                $this->assign('city',$cityInfo);
            }
            $this->assign('quality',$quality);
            return $this->fetch();
        }
    }
    //4.删除城市（2018.04.20）删除（若该城市有分站不可删除）
    public function delCity(){
        $c_id=intval($_GET['c_id']);
        $delCity=Db::table('dcxw_city')->where(['c_id' =>$c_id])->delete();
        if($delCity){
            $this->success('删除成功','district/city');
        }else{
            $this->success('删除失败','district/city');
        }
    }


    //2.添加省份（2018.04.20）
    public function addAreas(){
        if($_POST){
            $data['area_p_id']=$_POST['area_p_id'];
            $data['area_c_id']=$_POST['area_c_id'];
            $data['area_name']=$_POST['area_name'];
            $addProv=Db::table('dcxw_area')->insert($data);
            if($addProv){
                $this->success('添加成功','district/area');
            }else{
                $this->error('添加失败','addAreas');
            }
        }else{
            $provInfo=Db::table('dcxw_province')->select();
//            dump($provInfo);
            $this->assign('prov',$provInfo);
            return $this->fetch();
        }
    }


    //3.修改省份（2018.04.20）
    public function editArea(){
        $area_id=intval($_GET['area_id']);
        if($_POST){
            $data['area_p_id']=$_POST['area_p_id'];
            $data['area_c_id']=$_POST['area_c_id'];
            $data['area_name']=$_POST['area_name'];
            $editProv=Db::table('dcxw_area')->where(['area_id' => $area_id])->update($data);
            if($editProv){
                $this->success('编辑成功','district/area');
            }else{
                $this->error('您未做任何修改','district/area');
            }
        }else{
            $areaInfo=Db::table('dcxw_area')->where(['area_id' => $area_id])->find();
            $provInfo=Db::table('dcxw_province')->select();
            $p_id=$areaInfo['area_p_id'];
            $cityInfo=Db::table('dcxw_city')->where(['p_id' => $p_id])->select();
            $this->assign('city',$cityInfo);
            $this->assign('prov',$provInfo);
            if($areaInfo){
                $this->assign('area',$areaInfo);
            }
            return $this->fetch();
        }
    }


    //4.删除省份（2018.04.20）若该省份下有城市，城市有分站不可删除
    public function delArea(){
        $area_id=intval($_GET['area_id']);
        $del=Db::table('dcxw_area')->where(['area_id' =>$area_id])->delete();
        if($del){
            $this->success('删除成功','district/area');
        }else{
            $this->success('删除失败','district/area');
        }
    }
}