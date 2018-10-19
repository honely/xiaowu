<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/10/19
 * Time: 9:15
 * Name: Controller
 */
namespace app\decoration\controller;
use think\Controller;

class Common extends Controller{


    /*
     * 上传监理日志的图片
     * */
    public function upload(){
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/decorate');
        if($info){
            $path_filename =  $info->getFilename();
            $path_date=date("Ymd",time());
            $path="/uploads/decorate/".$path_date."/".$path_filename;
            // 成功上传后 返回上传信息
            return json(array('state'=>1,'path'=>$path,'msg'=> '图片上传成功！'));
        }else{
            // 上传失败返回错误信息
            return json(array('state'=>0,'msg'=>'上传失败,请重新上传！'));
        }
    }

}