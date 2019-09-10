<?php


namespace app\admin\controller;


use think\Controller;
use app\admin\model\Shops;

class Shop extends Controller
{

    /***
     * Name: 商城商品列表方法
     * Created by DangMengmeng at 2019/9/9 10:42
     */
    public function index(){
        $shopModel = new Shops();
        $list =$shopModel->getGoodsList();
        $this->assign('list',$list);
        return $this->fetch();
    }

    /***
     * Name: 商品分类列表方法
     * @return mixed
     * Created by DangMengmeng at 2019/9/9 11:10
     */


    /***
     * Name: 商品分类列表方法
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * Created by DangMengmeng at 2019/9/9 11:52
     */
    public function sort(){
        //$f_id = trim($this->request->param('f_id'));
        $f_id = 0;
        $shopModel = new Shops();
        $list =$shopModel->getSortList($f_id);
        $this->assign('list',$list);
        return $this->fetch();
    }


    /***
     * Name: 添加商品分类方法
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * Created by DangMengmeng at 2019/9/10 9:16
     */
    public function add(){
        $shopModel = new Shops();
        if($_POST){
            $data['ss_title'] = $_POST['ss_title'];
            $data['ss_f_id'] = $_POST['ss_f_id'];
            $data['ss_order'] = $_POST['ss_order'];
            $data['ss_icon'] = isset($_POST['ss_icon'])?$_POST['ss_icon']:'';
            $data['ss_del_flg'] = $_POST['ss_del_flg'];
            $data['ss_admin'] = session('adminId');
            $data['ss_add_date'] = time();
            $data['ss_change_date'] = time();
            $addNew =  $shopModel->addNewSort($data);
            if($addNew){
                $this->success('添加商品分类成功','index');
            }else{
                $this->error('添加商品分类失败','index');
            }
        }
        $f_id = 0;
        $list =$shopModel->getSortList($f_id);
        $this->assign('list',$list);
        return $this->fetch();
    }


    
    /***
     * Name: 修改商品分类方法
     * @return mixed
     * Created by DangMengmeng at 2019/9/9 14:13
     */
    public function edit(){
        $nav_id=intval($_GET['nav_id']);
        $nav_fid=intval($_GET['nav_fid']);
        $shopModel = new Shops();
        if($_POST){
            $data['ss_title'] = $_POST['ss_title'];
            $data['ss_order'] = $_POST['ss_order'];
            $data['ss_icon'] = isset($_POST['ss_icon'])?$_POST['ss_icon']:'';
            $data['ss_del_flg'] = $_POST['ss_del_flg'];
            $data['ss_admin'] = session('adminId');
            $data['ss_change_date'] = time();
            $edit = $shopModel->editSort($nav_id,$data);
            if($edit){
                $this->success('修改分类成功！','sort');
            }else{
                $this->error('修改分类成功！','sort');
            }
        }else{
            $navInfo=$shopModel->findOne($nav_id);
            $nav_f_info=$shopModel->findOne($nav_fid);
            $this->assign('nav_fid',$nav_fid);
            $this->assign('nav',$navInfo);
            $this->assign('f_name',$nav_f_info['ss_title']);
            return $this->fetch();
        }
    }



    /****
     * Name: 更改是否显示的状态方法
     * @return mixed
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     * Created by DangMengmeng at 2019/9/10 9:17
     */
    public function status(){
        $ba_id = $_POST['nav_id'];
        $change = $_POST['change'];
        $shopModel = new Shops();
        if($ba_id && isset($change)){
            if($change){
                $msg = '显示';
                $data['ss_del_flg'] = '1';
            }else{
                $msg = '隐藏';
                $data['ss_del_flg'] = '2';
            }
            $changeStatus =$shopModel->editSort($ba_id,$data);
            if($changeStatus){
                $res['code'] = 1;
                $res['msg'] = $msg.'成功！';
            }else{
                $res['code'] = 0;
                $res['msg'] = $msg.'失败！';
            }
        }else{
            $res['code'] = 0;
            $res['msg'] = '这是个意外！';
        }
        return $res;
    }



    /***
     * Name: 商品分类图标上传方法
     * @return \think\response\Json
     * Created by DangMengmeng at 2019/9/9 13:40
     */
    public function upload(){
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/sort');
        if($info){
            $path_filename =  $info->getFilename();
            $path_date=date("Ymd",time());
            $path="/uploads/sort/".$path_date."/".$path_filename;
            // 成功上传后 返回上传信息
            return json(array('state'=>1,'path'=>$path,'msg'=> '图片上传成功！'));
        }else{
            // 上传失败返回错误信息
            return json(array('state'=>0,'msg'=>'上传失败,请重新上传！'));
        }
    }


    /**
     * Name: 商品添加方法
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * Created by DangMengmeng at 2019/9/10 10:19
     */
    public function addProduct(){
        $shopModel = new Shops();
        if($_POST){
            $data['goods_name'] = $_POST['goods_name'];
            $data['goods_sort'] = $_POST['goods_sort'];
            $data['goods_price'] = $_POST['goods_price'];
            $data['goods_dis_price'] = $_POST['goods_dis_price'];
            $data['goods_img'] = isset($_POST['goods_img'])?$_POST['goods_img']:'';
            $data['goods_details'] = $_POST['goods_details'];
            $data['goods_admin'] = session('adminId');
            $data['goods_add_date'] = time();
            $data['goods_change_date'] = time();
            //是否多图
            $img=$_POST['goods_img_more'];
            $h_img='';
            for ($i=0;$i<sizeof($img);$i++){
                $h_img.=$img[$i].",";
            }
            $data['goods_img_more']=trim($h_img,',');
            $addNew =  $shopModel->addProduct($data);
            if($addNew){
                $this->success('添加商品成功','index');
            }else{
                $this->error('添加商品失败','index');
            }
        }
        $f_id = 0;
        $list =$shopModel->getSort($f_id);
        $this->assign('list',$list);
        return $this->fetch();
    }

    
    /***
     * Name: 二级联动 根据传过来的一级分类id获取改分类下的二级分类
     * @return \think\response\Json
     * Created by DangMengmeng at 2019/9/10 11:18
     */
    public function getSubSort(){
        $shopModel = new Shops();
        $ss_id = $_POST['ss_id'];
        $list =$shopModel->getSort($ss_id);
        if($list){
            return  json(['code' => '1','data' => $list]);
        }else{
            return  json(['code' => '0','data' => ['']]);
        }
    }


    public function addSpec(){
        return $this->fetch();
    }
}