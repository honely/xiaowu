<?php
    require_once('WxPay.php');
    header("content:application/json;chartset=uft-8");
    $openid = $_POST['openid'];
    if(empty($openid)){
        echo json_encode(['code'=>-1,'msg'=>'no params']);
        exit;
    }
    if(!isset($openid)||empty($openid)){
        echo json_encode(['code'=>-2,'msg'=>'no openid']);
        exit;
    }
    $pay=new Wxpay();
    $res=$pay->wxpay_unified_order(time(),$openid);
    if($res){
        echo json_encode(['code'=>0,'msg'=>'success','data'=>$res]);
        exit;
    }else{
        echo json_encode(['code'=>-3,'msg'=>'get pay info failed']);
        exit;
    }