<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/4/28
 * Time: 11:11
 * Name: 文章管理
 */
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;

class Article extends Controller{

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

    //文章列表
    public function artData(){
        $where = " 1 = 1";
        $keywords=trim($this->request->param('keywords'));
        $art_isable=intval(trim($this->request->param('display')));
        $art_createtime=trim($this->request->param('art_createtime'));
        $art_admin=intval(trim($this->request->param('art_admin')));
        $art_type=intval(trim($this->request->param('art_type')));
        if(isset($keywords) && !empty($keywords)){
            $where.=" and ( art_title like '%".$keywords."%' or art_bid like '%".$keywords."%' )";
        }
        if(isset($art_isable) && !empty($art_isable)){
            $where.=" and art_isable = ".$art_isable;
        }
        if(isset($art_admin) && !empty($art_admin)){
            $where.=" and art_admin = ".$art_admin;
        }
        if(isset($art_type) && !empty($art_type)){
            $where.=" and art_type = ".$art_type;
        }
        if(isset($art_createtime) && !empty($art_createtime)){
            $sdate=strtotime(substr($art_createtime,'0','10')." 00:00:00");
            $edate=strtotime(substr($art_createtime,'-10')." 23:59:59");
            $where.=" and ( art_createtime >= ".$sdate." and art_createtime <= ".$edate." ) ";
        }
        $count=Db::table('super_article')
            ->join('super_admin','super_admin.ad_id = super_article.art_admin')
            ->where($where)->count();
        $page= $this->request->param('page',1,'intval');
        $limit=$this->request->param('limit',10,'intval');
        $article=Db::table('super_article')
            ->join('super_admin','super_admin.ad_id = super_article.art_admin')
            ->limit(($page-1)*$limit,$limit)
            ->where($where)
            ->order('art_istop ASC,art_view desc')
            ->select();
        foreach ($article as $k =>$v){
            $article[$k]['art_updatetime'] = date('Y-m-d H:i:s',$v['art_updatetime']);
            $artType=$v['art_type'];
            $typeName='';
            switch($artType){
                case  1;
                    $typeName = '房租优势';
                    break;
                case 2;
                    $typeName = '精彩瞬间';
                    break;
                case  3;
                    $typeName = '企业优势';
                    break;
                case  4;
                    $typeName = '小屋快讯';
                    break;
                case  5;
                    $typeName = '装修风格';
                    break;
                case  6;
                    $typeName = '学习园地';
                    break;
            }
            $article[$k]['art_type'] = $typeName;
        }
        $res['code'] = 0;
        $res['data'] = $article;
        $res['count'] = $count;
        return json($res);
    }

    public function article(){
        if($_POST){
            $where = " 1 = 1";
            $art_admin=trim(intval($_POST['art_admin']));
            $keywords=trim($_POST['keywords']);
            $art_createtime=trim($_POST['art_createtime']);
            if(isset($keywords) && !empty($keywords)){
                $where.=" and ( art_title like '%".$keywords."%' or art_bid like '%".$keywords."%' )";
            }
            if(isset($art_isable) && !empty($art_isable)){
                $where.=" and art_isable = ".$art_isable;
            }
            if(isset($art_admin) && !empty($art_admin)){
                $where.=" and art_admin = ".$art_admin;
            }
            if(isset($art_createtime) && !empty($art_createtime)){
                $sdate=strtotime(substr($art_createtime,'0','10')." 00:00:00");
                $edate=strtotime(substr($art_createtime,'-10')." 23:59:59");
                $where.=" and ( art_createtime >= ".$sdate." and art_createtime <= ".$edate." ) ";
            }
            //已展示
            $data['display']=Db::table('super_article')->where($where)->where(['art_isable'=>1])->count();
            //未展示
            $data['none']=Db::table('super_article')->where($where)->where(['art_isable'=>2])->count();
            $data['all']=intval($data['display'])+intval($data['none']);
            return $data;
        }else{
            //操作人管理员
            $admin = Db::table('super_admin')->select();
            $this->assign('admin',$admin);
            return $this->fetch();
        }
    }

    //更改是否显示的状态
    public function status(){
        $ba_id = intval($_GET['art_id']);
        $change = intval($_GET['change']);
        if($ba_id && isset($change)){
            //如果选中状态是true,后台数据将要改为手机 显示
            if($change){
                $msg = '显示';
                $data['art_isable'] = '1';
                $data['art_admin'] = session('adminId');
            }else{
                $msg = '隐藏';
                $data['art_isable'] = '2';
                $data['art_admin'] = session('adminId');
            }
            $changeStatus = Db::table('super_article')->where(['art_id' => $ba_id])->update($data);
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

    //更改是否置顶
    public function top(){
        $ba_id = intval($_GET['art_id']);
        $change = intval(trim($_GET['change']));
        if($ba_id && isset($change)){
            //如果选中状态是true,后台数据将要改为 是
            if($change){
                $msg = '置顶';
                $data['art_istop'] = '1';
                $data['art_admin'] = session('adminId');
            }else{
                $msg = '取消置顶';
                $data['art_istop'] = '2';
                $data['art_admin'] = session('adminId');
            }
            $changeStatus = Db::table('super_article')->where(['art_id' => $ba_id])->update($data);
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



    //发布文章
    public function addArticle(){
        if($_POST){
            $stime=strtotime(date('Y-m-d 00:00:00'));
            $etime=strtotime(date('Y-m-d 23:59:59'));
            //获取当日预约的数量
            $buNum=Db::table('super_article')->where('art_createtime','between',[$stime,$etime])->count();
            //生成用户编号；
            $data['art_bid'] = date('Ymd').sprintf("%04d", $buNum+1);
            $data['art_title']=$_POST['art_title'];
            $data['art_type']=intval(trim($_POST['art_type']));
            $data['art_keywords']=$_POST['art_keywords'];
            $data['art_subtitle']=$_POST['art_subtitle'];
            $data['art_img']=$_POST['art_img'];
            $data['art_img_alt']=$_POST['art_img_alt'];
            $data['art_content']=$_POST['art_content'];
            $data['art_createtime']=time();
            $data['art_updatetime']=time();
            $data['art_istop']=$_POST['art_istop'];
            $data['art_admin'] = session('adminId');
            $add=Db::table('super_article')->insert($data);
            if($add){
                $this->success('发布文章成功！','article');
            }else{
                $this->error('发布文章失败！','article');
            }
        }else{
            $adminId=session('adminId');
            $ad_role=intval(session('ad_role'));
            if($ad_role == 1 ){// 超级管理员
                $provInfo=Db::table('super_province')->select();
                $this->assign('prov',$provInfo);
            }else{
                $adminInfo=Db::table('super_admin')
                    ->join('super_province','super_province.p_id = super_admin.ad_p_id')
                    ->join('super_city','super_city.c_id = super_admin.ad_c_id')
                    ->join('super_role','super_role.r_id = super_admin.ad_role')
                    ->join('super_branch','super_branch.b_id = super_admin.ad_branch')
                    ->field('super_admin.ad_realname,super_province.p_name,super_city.c_name,super_branch.b_name,super_role.r_name')
                    ->where(['ad_id' => $adminId])
                    ->find();
                $this->assign('admin',$adminInfo);
            }
            $this->assign('ad_role',$ad_role);
            return $this->fetch();
        }
    }




    //修改文章内容
    public function editArticle(){
        $art_id=intval($_GET['art_id']);
        if($_POST){
            $data['art_title']=$_POST['art_title'];
            $data['art_keywords']=$_POST['art_keywords'];
            $data['art_subtitle']=$_POST['art_subtitle'];
            $data['art_img']=$_POST['art_img'];
            $data['art_content']=$_POST['art_content'];
            $data['art_updatetime']=time();
            $data['art_type']=intval(trim($_POST['art_type']));
            $data['art_istop']=$_POST['art_istop'];
            $data['art_admin'] = session('adminId');
            $edit=Db::table('super_article')->where(['art_id'=>$art_id])->update($data);
            if($edit){
                $this->success('修改文章成功','article');
            }else{
                $this->error('修改文章失败','article');
            }
        }else{
            $artInfo=Db::table('super_article')->where(['art_id'=>$art_id])->find();
            $this->assign('art',$artInfo);
            return $this->fetch();
        }
    }

    //删除某一文章
    public function delArticle(){
        $art_id=intval($_GET['art_id']);
        $delArt=Db::table('super_article')->where(['art_id' => $art_id])->delete();
        if($delArt){
            $this->success('删除文章成功','article');
        }else{
            $this->error('删除文章失败','article');
        }
    }



    //刷新某一新闻数据
    public function refresh(){
        $art_id=intval($_GET['art_id']);
        $refresh=Db::table('super_article')->where(['art_id' => $art_id])->update(['art_updatetime' => time()]);
        $viewInc=Db::table('super_article')->where(['art_id' => $art_id])->setInc('art_view');
        if($refresh && $viewInc){
            $this->success('刷新文章成功','article');
        }else{
            $this->error('刷新文章失败','article');
        }
    }



    public function editUpload(Request $request)
    {
        $file 	= $request->file('file');
        $info 	= $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            $name_path =str_replace('\\',"/",$info->getSaveName());
            $result['data']["src"] = "/uploads/layui/".$name_path;
            $url 	= $info->getSaveName();
            //图片上传成功后，组好json格式，返回给前端
            $arr   = array(
                'code' => 0,
                'message'=>'',
                'data' =>array(
                    'src' => "/uploads/".$name_path
                ),
            );
        }
        echo json_encode($arr);
    }


    //文章图片上传
    public function upload(){
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/article');
        if($info){
            $path_filename =  $info->getFilename();
            $path_date=date("Ymd",time());
            $path="/uploads/article/".$path_date."/".$path_filename;
            // 成功上传后 返回上传信息
            return json(array('state'=>1,'path'=>$path,'msg'=> '图片上传成功！'));
        }else{
            // 上传失败返回错误信息
            return json(array('state'=>0,'msg'=>'上传失败,请重新上传！'));
        }
    }

}