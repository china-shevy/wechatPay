<?php
header("Content-type: text/html; charset=utf-8");
include 'wechatPay.php';
//填写配置参数
$options = array(
	'appid' 	=> 	'',	//填写微信分配的公众账号ID
	'mch_id'	=>	'',	//填写微信支付分配的商户号
	'apikey'	=>	''	//填写微信商户支付密钥
);
//统一下单方法
$wechatPay           = new WechatPay($options);
$params['body']         = 'Ipad mini  16G  白色';			//商品描述
$params['out_trade_no'] = '20150806025321';					//自定义的订单号
$params['total_fee']    = '1';								//订单金额 只能为整数 单位为分
$params['trade_type']   = 'APP';							//交易类型 JSAPI | NATIVE | APP | WAP 
$params['notify_url']   = 'http://test.com/';				//填写微信支付结果回调地址

$result = $wechatPay->unifiedOrder( $params );
echo "<pre>";

// print_r($result);die;
//创建APP端预支付参数
if ($result['return_code'] === 'SUCCESS' ) {
	// $data = $wechatPay->getAppPayParams( $result['prepay_id'] );
	$data = $wechatPay->orderQuery( $params['out_trade_no'] );

	var_dump($data);
}