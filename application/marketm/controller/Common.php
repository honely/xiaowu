<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/10/13
 * Time: 10:27
 * Name: Controller
 */
namespace app\marketm\controller;
use think\Controller;
use think\Db;
use think\Loader;

class Common extends Controller{
    //二级联动根据传过来的省份id获取对应的城市名称
    public function getCityName(){
        $p_id=intval($_GET['p_id']);
        $cityNames=Db::table('dcxw_city')->where(['p_id' => $p_id])->select();
        if($cityNames){
            return  json(['code' => '1','data' => $cityNames]);
        }else{
            return  json(['code' => '0','data' => ['']]);
        }
    }


    //根据城市id获取
    public function getAreaName(){
        $c_id=intval($_GET['c_id']);
        $branch=Db::table('dcxw_area')
            ->where(['area_c_id' => $c_id])
            ->field('area_id,area_name')
            ->select();
        if($branch){
            return  json(['code' => '1','data' => $branch]);
        }else{
            return  json(['code' => '0','data' => ['']]);
        }
    }



    //上传打款凭证
    public function upload(){
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/market');
        if($info){
            $path_filename =  $info->getFilename();
            $path_date=date("Ymd",time());
            $path="/uploads/market/".$path_date."/".$path_filename;
            // 成功上传后 返回上传信息
            return json(array('state'=>1,'path'=>$path,'msg'=> '图片上传成功！'));
        }else{
            // 上传失败返回错误信息
            return json(array('state'=>0,'msg'=>'上传失败,请重新上传！'));
        }
    }

    /*
        * 根据装修状态码返回相应的状态文字
        * */
    public function getStatus($status){
        $statusTip='';
        switch ($status) {
            case 1:
                $statusTip="接到通知";
                break;
            case 2:
                $statusTip="基装部分";
                break;
            case 3:
                $statusTip="主材部分";
                break;
            case 4:
                $statusTip="软装部分";
                break;
            case 5:
                $statusTip="自检";
                break;
            case 6:
                $statusTip="运营部";
                break;
            case 7:
                $statusTip="二次自检";
                break;
        }
        return $statusTip;
    }

    //根据id获取后台添加人员名称
    public function getAdminName($admin_id){
        $adminInfo=Db::table('dcxw_admin')->where(['ad_id' => $admin_id])->field('ad_realname')->find();
        $adminName=$adminInfo['ad_realname'];
        return $adminName;
    }
    //根据id获取前端添加人员名称
    public function getUserName($admin_id){
        $userInfo=Db::table('dcxw_user')->where(['u_id' => $admin_id])->field('u_name')->find();
        $username=$userInfo['u_name'];
        return $username;
    }

 //根据id获取前端添加人员名称
    public function getUserPhone($admin_id){
        $userInfo=Db::table('dcxw_user')->where(['u_id' => $admin_id])->field('u_phone')->find();
        $username=$userInfo['u_phone'];
        return $username;
    }


    //根据id获取前端添加人员名称
    public function getUserJob($admin_id){
        $userInfo=Db::table('dcxw_user')->where(['u_id' => $admin_id])->field('u_job')->find();
        $username=$userInfo['u_job'];
        return $username;
    }


    //根据房屋状态编号获取相应文字

    public function getHouseStatus($status){
//        是否可租，1，事业部，2，工程部装修中；3,运营部配置中，4，可出租，5，已出租
        $statusTip='';
        switch ($status) {
            case 1:
                $statusTip="签单中";
                break;
            case 2:
                $statusTip="装修中";
                break;
            case 3:
                $statusTip="配置中";
                break;
            case 4:
                $statusTip="可出租";
                break;
            case 5:
                $statusTip="已出租";
                break;
            case 6:
                $statusTip="已签单";
                break;
            case 7:
                $statusTip="分配中";
                break;
            case 8:
                $statusTip="分派中";
                break;
        }
        return $statusTip;
    }


    public function getMasterStatus($h_id){
        $master=Db::table('dcxw_house_master')

            ->where(['hm_house_code' =>$h_id])
            ->count();
        return $master?$master:0;
    }


    public function getAttachStatus($h_id){
        $attach=Db::table('dcxw_house_attachment')
            ->where(['ha_house_code' =>$h_id])
            ->count();
        return $attach?$attach:0;
    }


    public function getDecorateMoney($h_id){
        $money=Db::table('dcxw_house_pay')->where(['hp_house_code' => $h_id])->column('hp_money');
        if(isset($money) && !empty($money)){
            return $money[0]?$money[0]:0;
        }else{
            return 0;
        }

    }



    //根据房源编号获取装修状态
    public function getStatusByHouseCode($h_id){
        $decorateInfo=Db::table('dcxw_house_decorate')
            ->where(['hd_house_code' => $h_id])
            ->field('hd_status')
            ->find();
        $status=$decorateInfo['hd_status'];
        $statusName=$this->getStatus($status);
        return $statusName;
    }

    function get_last_time($time = NULL) {
        $text = '';
        $time = $time === NULL || $time > time() ? time() : intval($time);
        $t = time() - $time; //时间差 （秒）
        $y = date('Y', $time)-date('Y', time());//是否跨年
        switch($t){
            case $t == 0:
                $text = '刚刚';
                break;
            case $t < 60:
                $text = $t . '秒前'; // 一分钟内
                break;
            case $t < 60 * 60:
                $text = floor($t / 60) . '分钟前'; //一小时内
                break;
            case $t < 60 * 60 * 24:
                $text = floor($t / (60 * 60)) . '小时前'; // 一天内
                break;
            case $t < 60 * 60 * 24 * 3:
                $text = floor($time/(60*60*24)) ==1 ?'昨天 ' . date('H:i', $time) : '前天 ' . date('H:i', $time) ; //昨天和前天
                break;
            case $t < 60 * 60 * 24 * 30:
                $text = date('m月d日 H:i', $time); //一个月内
                break;
            case $t < 60 * 60 * 24 * 365&&$y==0:
                $text = date('m月d日', $time); //一年内
                break;
            default:
                $text = date('Y年m月d日', $time); //一年以前
                break;
        }

        return $text;
    }

    public function getDinner(){
        return [
            '1' => '一厅',
            '2' => '两厅',
            '3' => '三厅',
            '4' => '四厅',
            '5' => '五厅',
        ];
    }
    public function getDinnerName($id){
        $tip="";
        switch ($id) {
            case 1:
                $tip="一厅";
                break;
            case 2:
                $tip="两厅";
                break;
            case 3:
                $tip="三厅";
                break;
            case 4:
                $tip="四厅";
                break;
            case 5:
                $tip="五厅";
                break;
        }
        return $tip;
    }

    public function getRoom(){
        return [
            '1' => '一室',
            '2' => '两室',
            '3' => '三室',
            '4' => '四室',
            '5' => '五室',
        ];
    }



    public function getRoomName($id){
        $tip="";
        switch ($id) {
            case 1:
                $tip="一室";
                break;
            case 2:
                $tip="两室";
                break;
            case 3:
                $tip="三室";
                break;
            case 4:
                $tip="四室";
                break;
            case 5:
                $tip="五室";
                break;
        }
        return $tip;
    }

    public function getBath(){
        return [
            '1' => '一卫',
            '2' => '两卫',
            '3' => '三卫',
            '4' => '四卫',
            '5' => '五卫',
        ];
    }
    public function getBathName($id){
        $tip="";
        switch ($id) {
            case 1:
                $tip="一卫";
                break;
            case 2:
                $tip="两卫";
                break;
            case 3:
                $tip="三卫";
                break;
            case 4:
                $tip="四卫";
                break;
            case 5:
                $tip="五卫";
                break;
        }
        return $tip;
    }
    public function getCook(){
        return [
            '1' => '一厨',
            '2' => '两厨',
            '3' => '三厨',
            '4' => '四厨',
            '5' => '五厨',
        ];
    }
    public function getCookName($id){
        $tip="";
        switch ($id) {
            case 1:
                $tip="一厨";
                break;
            case 2:
                $tip="两厨";
                break;
            case 3:
                $tip="三厨";
                break;
            case 4:
                $tip="四厨";
                break;
            case 5:
                $tip="五厨";
                break;
        }
        return $tip;
    }



    /*
     * 根据房屋类型的类型id，一个由四个数字中间用逗号分隔的字符串
     * */
    public function getHouseTypeNameByTypeId($typeId){
        $typeIds=explode(',',$typeId);
        $roomType=$this->getRoomName($typeIds[0]);
        $dinnerType=$this->getDinnerName($typeIds[1]);
        $cookType=$this->getCookName($typeIds[2]);
        $bathType=$this->getBathName($typeIds[3]);
        $typeName=$roomType.''.$dinnerType.''.$cookType.''.$bathType;
        return $typeName;
    }



    //根据租客id获取租客姓名
    public function getRenterNameViaRentId($rent_id)
    {
        $rentInfo=Db::table('dcxw_house_rent')
            ->where(['hr_id' => $rent_id])
            ->column('hr_name');
        return $rentInfo[0];

    }

    //根据租客id获取租客电话
    public function getRenterPhoneViaRentId($rent_id)
    {
        $rentInfo=Db::table('dcxw_house_rent')
            ->where(['hr_id' => $rent_id])
            ->column('hr_phone');
        return $rentInfo[0];

    }

    public function houseHeadFun(){
        return [
            '1' => '东',
            '2' => '南',
            '3' => '西',
            '4' => '北',
            '5' => '东南',
            '6' => '西南',
            '7' => '东北',
            '8' => '西北',
        ];
    }


    public function houseHead($id){
        $tip="";
        switch ($id) {
            case 1:
                $tip="东";
                break;
            case 2:
                $tip="南";
                break;
            case 3:
                $tip="西";
                break;
            case 4:
                $tip="北";
                break;
            case 5:
                $tip="东南";
                break;
            case 6:
                $tip="西南";
                break;
            case 7:
                $tip="东北";
                break;
            case 8:
                $tip="西北";
                break;
        }
        return $tip;
    }

    /*
     * 根据城市id获取城市名称
     * */
    public function getCitynameByCityId($c_id){
        $cityInfo=Db::table('dcxw_city')->where(['c_id' =>$c_id])->field('c_name')->find();
        $cityName=$cityInfo['c_name'];
        return $cityName;
    }


    /*
     * 根据部门id获取部门名称
     * */
    public function getDepartNameByDepartId($depart_id){
        $departInfo=Db::table('dcxw_department')->where(['d_id' =>$depart_id])->field('d_name')->find();
        $departName=$departInfo['d_name'];
        return $departName;
    }





    /*
     * 电费缴纳方式
     * */
    public function electType()
    {
        return [
            '1' => '物业代缴',
            '2' => '国家电网'
        ];
    }


    /*
     * 根据id获取电费缴纳方式名称
     * */
    public function getElectTypeName($id)
    {
        $typeName="";
        switch ($id) {
            case 1:
                $typeName="物业代缴";
                break;
            case 2:
                $typeName="国家电网";
                break;
        }
        return $typeName;
    }


    /*
     * 供暖方式
     * */
    public function warmType()
    {
        return [
            '1' => '集中供暖',
            '2' => '天然气暖'
        ];
    }


    /*
     * 根据id获取供暖方式名称
     * */
    public function getWarmTypeName($id)
    {
        $typeName="";
        switch ($id) {
            case 1:
                $typeName="集中供暖";
                break;
            case 2:
                $typeName="天然气暖";
                break;
        }
        return $typeName;
    }


    /*
     * 物业费类型
     * */
    public function wuYeFeeType()
    {
        return [
            '1' => '平米单价',
            '2' => '每月单价'
        ];
    }


    /*
     *根据id获取物业费类型名称
     * */
    public function getWuYeFeeTypeName($id){
        $typeName="";
        switch ($id) {
            case 1:
                $typeName="平米单价";
                break;
            case 2:
                $typeName="每月单价";
                break;
        }
        return $typeName;
    }





    //根据IP获取城市信息
    public function getCityInfoViaIp($ip){
        $ip = @file_get_contents("http://ip.taobao.com/service/getIpInfo.php?ip=".$ip);
        $ip = json_decode($ip,true);
        return $ip;
    }



    //获取用户网络状态
    public function getUserNetStatus($Agent)
    {
        if (strpos($Agent, 'NetType/WIFI')) {
            $netType = "WIFI";
        } else if (strpos($Agent, 'NetType/4')) {
            $netType = "4G";
        } else if (strpos($Agent, 'NetType/3')) {
            $netType = "3G";
        } else if (strpos($Agent, 'NetType/2')) {
            $netType = "2G";
        } else {
            $netType = "Internet";
        }
        return $netType;
    }


    //获取用户设备型号
    public function getUserOperationSys($user_agent){
        if(stripos($user_agent, 'Windows')) {
            $brand = 'windows';
        } elseif(stripos($user_agent,"iPhone")!==false){
            $brand= 'iPhone';
        } else if(stripos($user_agent,"SAMSUNG")!==false||stripos($user_agent,"Galaxy")!==false||strpos($user_agent,"GT-")!==false||strpos($user_agent,"SCH-")!==false){
            $brand='三星';
        }elseif(stripos($user_agent,"Huawei")!==false||stripos($user_agent,"Honor")!==false||stripos($user_agent,"H60-")!==false||stripos($user_agent,"H30-")!==false){
            $brand='华为';
        }elseif(stripos($user_agent,"Lenovo")!==false){
            $brand='联想';
        }elseif(strpos($user_agent,"MI-ONE")!==false||strpos($user_agent,"MI 1S")!==false||strpos($user_agent,"MI 2")!==false||strpos($user_agent,"MI 3")!==false||strpos($user_agent,"MI 4")!==false||strpos($user_agent,"MI-4")!==false){
            $brand='小米';
        }elseif(strpos($user_agent,"HM NOTE")!==false||strpos($user_agent,"HM201")!==false){
            $brand='红米';
        }elseif(stripos($user_agent,"Coolpad")!==false||strpos($user_agent,"8190Q")!==false||strpos($user_agent,"5910")!==false){
            $brand='酷派';
        }elseif(stripos($user_agent,"ZTE")!==false||stripos($user_agent,"X9180")!==false||stripos($user_agent,"N9180")!==false||stripos($user_agent,"U9180")!==false){
            $brand='中兴';
        }elseif(stripos($user_agent,"OPPO")!==false||strpos($user_agent,"X9007")!==false||strpos($user_agent,"X907")!==false||strpos($user_agent,"X909")!==false||strpos($user_agent,"R831S")!==false||strpos($user_agent,"R827T")!==false||strpos($user_agent,"R821T")!==false||strpos($user_agent,"R811")!==false||strpos($user_agent,"R2017")!==false){
            $brand='OPPO';
        }elseif(strpos($user_agent,"HTC")!==false||stripos($user_agent,"Desire")!==false){
            $brand='HTC';
        }elseif(stripos($user_agent,"vivo")!==false){
            $brand='vivo';
        }elseif(stripos($user_agent,"K-Touch")!==false){
            $brand='天语';
        }elseif(stripos($user_agent,"Nubia")!==false||stripos($user_agent,"NX50")!==false||stripos($user_agent,"NX40")!==false){
            $brand='努比亚';
        }elseif(strpos($user_agent,"M045")!==false||strpos($user_agent,"M032")!==false||strpos($user_agent,"M355")!==false){
            $brand='魅族';
        }elseif(stripos($user_agent,"DOOV")!==false){
            $brand='朵唯';
        }elseif(stripos($user_agent,"GFIVE")!==false){
            $brand='基伍';
        }elseif(stripos($user_agent,"Gionee")!==false||strpos($user_agent,"GN")!==false){
            $brand='金立';
        }elseif(stripos($user_agent,"HS-U")!==false||stripos($user_agent,"HS-E")!==false){
            $brand='海信';
        }elseif(stripos($user_agent,"Nokia")!==false){
            $brand='诺基亚';
        }else{
            $brand='其他手机';
        }
        return $brand;
    }


    //获取浏览器类型
    function getBrowserType($userAgent){
        if(empty($userAgent)){
            return 'robot！';
        }
        if( (false == strpos($userAgent,'MSIE')) && (strpos($userAgent, 'Trident')!==FALSE) ){
            return 'IE 11.0';
        }
        if(false!==strpos($userAgent,'MSIE 10.0')){
            return 'IE 10.0';
        }
        if(false!==strpos($userAgent,'MSIE 9.0')){
            return 'IE 9.0';
        }
        if(false!==strpos($userAgent,'MSIE 8.0')){
            return 'IE 8.0';
        }
        if(false!==strpos($userAgent,'MSIE 7.0')){
            return 'IE 7.0';
        }
        if(false!==strpos($userAgent,'MSIE 6.0')){
            return 'IE 6.0';
        }
        if(false!==strpos($userAgent,'Edge')){
            return 'Edge';
        }
        if(false!==strpos($userAgent,'Firefox')){
            return 'Firefox';
        }
        if(false!==strpos($userAgent,'Chrome')){
            return 'Chrome';
        }
        if(false!==strpos($userAgent,'Safari')){
            return 'Safari';
        }
        if(false!==strpos($userAgent,'Opera')){
            return 'Opera';
        }
        if(false!==strpos($userAgent,'360SE')){
            return '360SE';
        }
        if(false!==strpos($userAgent,'MicroMessage')){
            return '微信浏览器';
        }
    }



    //把对象转换成数组的方法；
    public function object2array($object) {
        if (is_object($object)) {
            foreach ($object as $key => $value) {
                $array[$key] = $value;
            }
        }
        else {
            $array = $object;
        }
        return $array;
    }


    /*
     * 根据城市获取该分公司的行政部分配管理员名称
     * */
    public function getAdminNameViaCityId($cityId){
        $adminInfo=Db::table('dcxw_user')
            ->where(['u_c_id' => $cityId,'u_depart_id' => 5])
            ->field('u_name,u_phone')
            ->find();
        return $adminInfo?$adminInfo:null;
    }



    /*
     * 根据城市获取该分公司的行政部分配管理员名称
     * */
    public function getOperNameViaCityId($cityId){
        $adminInfo=Db::table('dcxw_user')
            ->where(['u_c_id' => $cityId,'u_depart_id' => 6])
            ->field('u_name,u_phone')
            ->find();
        return $adminInfo?$adminInfo:null;
    }


    public function sendMsg($adminInfo){
        //短信发送
        Loader::import('aliyun/api_demo/SmsDemo',EXTEND_PATH);
        $sms = new \SmsDemo();
        $keyInfo=Db::table('dcxw_setinfo')->where(['s_key' => 'ali_sms_key'])->find();
        $keyId=$keyInfo['s_value'];
        $secretinfo=Db::table('dcxw_setinfo')->where(['s_key' => 'ali_sms_secret'])->find();
        $keySecret=$secretinfo['s_value'];
        $signName="大城小屋";
        $phone=$adminInfo['u_phone'];
        $name=$adminInfo['u_name'];
        $templateCode="SMS_152212638";
        $sem1=$sms->sendMarToAdm($phone,$signName,$templateCode,$name,$keyId,$keySecret);
        $array=$this->object2array($sem1);
        return $array['Code'] == 'OK'?"1":"2";
    }


}