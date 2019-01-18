<?php
/**
 * 2017-07-21 by 我是个导演
 * 欢迎访问支付宝论坛：https://openclub.alipay.com/index.php
 * 
 * APP支付 RSA2签名方法
 */
require_once 'AopSdk.php';
$aop = new AopClient ();
$aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
$aop->appId = '填写您的appid';
$aop->rsaPrivateKey = '填写您的私钥';
$aop->alipayrsaPublicKey='填写您的支付宝公钥';
$aop->apiVersion = '1.0';
$aop->postCharset='utf-8';
$aop->format='json';
$aop->signType = 'RSA2';
//生成随机订单号
$date=date("YmdHis");
$arr=range(1000,9999);
shuffle($arr);
$request = new AlipayTradeAppPayRequest();
//异步地址传值方式
$request->setNotifyUrl("https://www.alipay.com");
$request->setBizContent("{\"out_trade_no\":\"".$date.$arr[0]."\",\"total_amount\":0.01,\"product_code\":\"QUICK_MSECURITY_PAY\",\"subject\":\"app测试\"}");
$result = $aop->sdkExecute($request);
print_r(htmlspecialchars($result));
?>