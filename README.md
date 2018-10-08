
The Alipay Composer Package
===========================
a Alipay Composer Package

Description
----------

This is for alipay app pay purpose.

Based on Alipay-SDK-PHP-20170411150151

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require davidxu/yii2-alipay "*"
```

or add

```
"davidxu/yii2-alipay": "*"
```

to the require section of your `composer.json` file.


Usage Example for App Pay Order Generation Request
--------------------------------------------------

```
use davidxu\alipay\Alipay;
use davidxu\alipay\request\AlipayTradeAppPayRequest;

$notifyUrl = 'https://<your_domain>/alipay/notify';

$alipay = new Alipay();

$alipay->gatewayUrl = "https://openapi.alipay.com/gateway.do";
$alipay->appId = "<app_id>";
$alipay->rsaPrivateKey = '<private_key_in_one_line>' ;
$alipay->format = "json";
$alipay->charset = "UTF-8";
$alipay->signType = "RSA2";
$alipay->alipayrsaPublicKey = '<alipay_public_key_NOT_DEVELOPER_PUBLIC_KEY>';

$request = new AlipayTradeAppPayRequest();

$bizcontent = json_encode([
                  'body' => 'Body of test data',
                  'subject' => 'App Pay Test',
                  'out_trade_no' => '2017012511013510000',
                  'timeout_express' => '30m',
                  'total_amount' => '0.01',
                  'product_code' => 'QUICK_MSECURITY_PAY',
              ]);
              
$request->setNotifyUrl($notifyUrl);
$request->setBizContent($bizcontent);

$orderString = $alipay->sdkExecute($request);

// Client side can use this string for orderString directly.
echo $orderString;

```

Usage Example for App Pay Async Notification
--------------------------------------------
```

Http Method: POST
Request URL: https://<your_domain>/alipay/notify  <notifyUrl>

```

```
use davidxu\alipay\Alipay;

$alipay = new Alipay();
$alipay->alipayrsaPublicKey = <alipay_public_key_NOT_DEVELOPER_PUBLIC_KEY>;

$flag = $alipay->rsaCheckV1($request, null, 'RSA2');

// Other code such as deal with business logic and etc

// Response ali post request
echo 'success';

```

Contact
-------

If anything please contact at david.xu.uts@163.com

Have fun.
