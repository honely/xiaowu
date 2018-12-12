<?php
/**
 * Created by PhpStorm.
 * User: Dang Meng
 * Date: 2018/11/29
 * Time: 15:01
 * Name: 操作记录入库方法
 */
namespace app\marketm\model;
use app\marketm\controller\Common;
use think\Db;
use think\Model;

class Commons extends Model{
    /*
     * 用户操作记录
     *$ol_type 1.房源主表信息修改
     *         2.房源附属信息修改
     * */
    public function operationLog($nowData,$preData,$type){
        $commonModel=new Common();
        $data = [
            'now' => $nowData,
            'pre' => $preData
        ];
        if($type == 1){
            //1.房源主表信息修改
            //主键条件（根据id）
            $id = $data ? (isset($data['now']) && $data['now']) ? $data['now']['h_id'] : 0 : 0;
            //条件
            $where = ['h_id' => $id];
            $log['ol_type']=1;
        }elseif ($type == 2){
            //主键条件（根据id）
            //2.房源附属信息修改
            $id = $data ? (isset($data['now']) && $data['now']) ? $data['now']['ha_id'] : 0 : 0;
            //条件
            $where = ['ha_id' => $id];
            $log['ol_type']=2;
        }

        $nowArr = $data ? (isset($data['now']) && $data['now']) ? $data['now'] : [] : [];
        $preArr = $data ? (isset($data['pre']) && $data['pre']) ? $data['pre'] : [] : [];
        //需要修改的数据
        $updateArr = array_diff($nowArr,$preArr);

        //不同数据的键
        $keys = array_keys($updateArr);
        //日志
        $logTxt = '';
        if($preArr && $nowArr)
        {
            if($keys)
            {
                foreach ($keys as $val)
                {
                    $logTxt .= "把$val:【{$preArr[$val]}】->【{$nowArr[$val]}】；\n";
                }
            }
        }
        $userIp=$_SERVER["REMOTE_ADDR"];
        $userAgent=$_SERVER['HTTP_USER_AGENT'];
        $userInfo=session('userInfo');
        $log['ol_content']=$logTxt;
        $log['ol_admin']=$userInfo['u_id'];
        $log['ol_add_time']=time();
        $log['ol_net_states']=$commonModel->getUserNetStatus($userAgent);
        $log['ol_user_device']=$commonModel->getUserOperationSys($userAgent);
        $log['ol_user_browser']=$commonModel->getBrowserType($userAgent);
        $log['ol_ip']=$userIp;
        $log['ol_is_delete']=1;
        $insertLog=Db::table('dcxw_operation_log')->insert($log);
        return $insertLog?true:false;
    }
}