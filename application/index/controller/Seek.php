<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/9/8
 * Time: 11:14
 * Name: 轻松找房
 */
namespace app\index\controller;
use think\Controller;
use think\Db;

class Seek extends Controller{
    /*
     * 轻松找房（房源管理）列表页
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

        //位置区域目前仅限西安市内
        $area=Db::table('dcxw_area')->where(['area_c_id' => 3])->select();
        $this->assign('area',$area);
        //房屋类型
        $houseType=Db::table('dcxw_type')
            ->where(['type_isable' => 1,'type_sort' => 1])
            ->order('type_order desc')
            ->select();
        $this->assign('houseType',$houseType);
        //房屋类型
        $rent=Db::table('dcxw_type')
            ->where(['type_isable' => 1,'type_sort' => 5])
            ->order('type_order desc')
            ->select();
        $this->assign('rent',$rent);
        $where='1 = 1 ';
        if(isset($_GET['keywords']) && !empty($_GET['keywords'])){
            $keywords=trim($_GET['keywords']);
            $where.=" and ( h_name like '%".$keywords."%' or h_building like '%".$keywords."%' or h_address like '%".$keywords."%'  or h_description like '%".$keywords."%' )";
            $this->assign('keywords',$keywords);
        }
        //租金帅选
        $rent_id=0;
        if(isset($_GET['rent_id']) && !empty($_GET['rent_id']) && ($_GET['rent_id'] != 0)){
            $areaInfo=Db::table('dcxw_type')
                ->where(['type_isable' => 1 ,'type_sort' => 5,'type_id' => $_GET['rent_id']])
                ->field('type_remarks')
                ->find();
            $areaRange=explode('-',$areaInfo['type_remarks']);
            $areaMin=intval($areaRange[0]);
            $areaMax=intval($areaRange[1]);
            $where.=" and h_rent >= ".$areaMin." and h_rent <= ".$areaMax;
            $rent_id=intval($_GET['rent_id']);
        }
        $this->assign('rent_id',$rent_id);

        //风格帅选
        $style_id=0;
        if(isset($_GET['style_id']) && !empty($_GET['style_id']) && ($_GET['style_id'] != 0)){
            $style_id=intval($_GET['style_id']);
            $where.=" and h_type = ".$style_id;
        }
        $this->assign('style_id',$style_id);
        //位置帅选
        $area_id=0;
        if(isset($_GET['area_id']) && !empty($_GET['area_id']) && ($_GET['area_id'] != 0)){
            $area_id=intval($_GET['area_id']);
            $where.=" and h_a_id = ".$area_id;
        }
        $this->assign('area_id',$area_id);
        //房源
        $page= $this->request->param('page',1,'intval');
        $limit=$this->request->param('limit',6,'intval');
        $house=Db::table('dcxw_house')
            ->join('dcxw_province','dcxw_province.p_id = dcxw_house.h_p_id')
            ->join('dcxw_city','dcxw_city.c_id = dcxw_house.h_c_id')
            ->join('dcxw_area','dcxw_area.area_id = dcxw_house.h_a_id')
            ->where(['h_isable' => 2])
            ->whereOr(['h_isable' => 4])
            ->where($where)
            ->order('h_istop asc,h_isable,h_view desc')
            ->limit(($page-1)*$limit,$limit)
            ->field('h_name,h_nearbus,h_b_id,h_subway,h_house_img,h_img_alt,h_video,h_address,h_building,h_rent,h_rent_type,h_id')
            ->select();
        $count=Db::table('dcxw_house')
            ->join('dcxw_province','dcxw_province.p_id = dcxw_house.h_p_id')
            ->join('dcxw_city','dcxw_city.c_id = dcxw_house.h_c_id')
            ->join('dcxw_area','dcxw_area.area_id = dcxw_house.h_a_id')
            ->where(['h_isable' => 2])
            ->whereOr(['h_isable' => 4])
            ->where($where)
            ->count();
        $this->assign('count',$count);
        $this->assign('page',$page);
        $this->assign('limit',$limit);
        $this->assign('houseInfo',$house);
        return $this->fetch();
    }

    /*
     * 轻松找房（房源管理）详情页
     * */
    public function details(){
        $h_id=intval(trim($_GET['h_id']));
        //浏览量加一
        Db::table('dcxw_house')->where(['h_id' => $h_id])->setInc('h_view');
        $house=Db::table('dcxw_house')->where(['h_id' => $h_id])->find();
        $house['h_img']=explode(',',$house['h_img']);
        $house['h_config']=explode(',',$house['h_config']);
        $house['config_img']=[];
        for($i=0;$i<count($house['h_config']);$i++){
            $house['config_img'][$i]=Db::table('dcxw_type')->where(['type_id' => $house['h_config'][$i]])->field('type_name,type_img')->find();
        }
        $this->assign('house',$house);
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
        //热门房源
        $hotHouse=Db::table('dcxw_house')->where('h_id','neq',$h_id)->order('h_view desc')->limit(4)->select();
        $this->assign('hotHouse',$hotHouse);
        return $this->fetch();
    }


    /*
     * houseOrder
     * */
    public function houseOrder(){
        if($_POST){
            $data['ho_name']=$_POST['ho_name'];
            $data['ho_phone']=$_POST['ho_phone'];
            $data['ho_remark']=$_POST['ho_remark'];
            $data['ho_addtime']=time();
            $add=Db::table('dcxw_house_order')->insert($data);
            if($add){
                return  json(['code' => '1','msg' => '提交成功！']);
            }else{
                return  json(['code' => '0','msg' => '预约失败！']);
            }
        }
    }
}