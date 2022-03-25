龙骑士闪送接口SDK
===============

> 运行环境要求PHP7.0+

## 主要新特性

> 接口对接不完整，目前仅按需对接

* [1 > 查询开通城市](http://open.ishansong.com/documentCenter/301)
* [5 > 订单计费](http://open.ishansong.com/documentCenter/305)
* [6 > 提交订单](http://open.ishansong.com/documentCenter/306)
* [7 > 订单加价](http://open.ishansong.com/documentCenter/307)
* [8 > 查询订单状态](http://open.ishansong.com/documentCenter/308)
* [9 > 查询闪送员位置信息](http://open.ishansong.com/documentCenter/309)
* [15 > 新增&修改店铺](http://open.ishansong.com/documentCenter/315)


## 安装

~~~
composer 
~~~

## 使用案例

> [1 > 查询开通城市](http://open.ishansong.com/documentCenter/301)
~~~php
// 查询开通城市
$api = new OpenCitiesListsRequest();

$token = 'af47a538-cdee-47cf-92a3-17d3412488c9';
$main = new Main(1, $api);
$data = $main->main($token);
~~~


> [5 > 订单计费](http://open.ishansong.com/documentCenter/305)
```php
/** 方法一： **/
$data = array(
    'cityName' => '', // 城市名称
    'appointType' => 0, // 预约类型 0立即单，1预约单
    'appointmentDate' => 0, // 预约时间 只支持两个小时以后两天以内
    'storeId' => 0, // 店铺ID  不传递店铺ID订单就认为默认店铺下单
    'travelWay' => 0, // 可指定的交通工具方式
    'deliveryType' => 0, // 1.帮我送 2.帮我取 ；默认为1
    'sender' => array(
        // 发件人信息
        'fromAddress' => '', // 寄件地址
        'fromAddressDetail' => '', // 寄件详细地址
        'fromSenderName' => '', // 寄件人姓名
        'fromMobile' => '', // 寄件联系人
        'fromLatitude' => '', // 百度-寄件纬度
        'fromLongitude' => '', //  百度-寄件经度
    ),
    'receiverList' => array(
        // 收件人信息(列表)
        'orderNo' => '', // 第三方平台流水号
        'toAddress' => '', // 收件地址
        'toAddressDetail' => '', // 收件详细地址
        'toLatitude' => '', // 百度-收件纬度
        'toLongitude' => '', // 百度-收件经度
        'toReceiverName' => '', // 收件人姓名
        'toMobile' => '', // 收件联系人
        'goodType' => '', // 物品类型 详见下放物品类型标签枚举
        'weight' => '', // 物品类型 （传向上取整整数，单位为kg）
        'remarks' => '', // 备注
        'insurance' => '', // 保险费用
        'insuranceProId' => '', // 保险产品ID
        'additionFee' => '', // 小费
        'orderingSourceType' => '', // 物品来源
        'orderingSourceNo' => '', // 物品来源流水号
    ),
);
// 订单计费
$api = new OrderCalculateRequest();
$api->setFields($data);


/** 方法二： **/
$sender = array(
                  // 发件人信息
                  'fromAddress' => '', // 寄件地址
                  'fromAddressDetail' => '', // 寄件详细地址
                  'fromSenderName' => '', // 寄件人姓名
                  'fromMobile' => '', // 寄件联系人
                  'fromLatitude' => '', // 百度-寄件纬度
                  'fromLongitude' => '', //  百度-寄件经度
              );
$receiverList = array(
                  // 收件人信息(列表)
                  'orderNo' => '', // 第三方平台流水号
                  'toAddress' => '', // 收件地址
                  'toAddressDetail' => '', // 收件详细地址
                  'toLatitude' => '', // 百度-收件纬度
                  'toLongitude' => '', // 百度-收件经度
                  'toReceiverName' => '', // 收件人姓名
                  'toMobile' => '', // 收件联系人
                  'goodType' => '', // 物品类型 详见下放物品类型标签枚举
                  'weight' => '', // 物品类型 （传向上取整整数，单位为kg）
                  'remarks' => '', // 备注
                  'insurance' => '', // 保险费用
                  'insuranceProId' => '', // 保险产品ID
                  'additionFee' => '', // 小费
                  'orderingSourceType' => '', // 物品来源
                  'orderingSourceNo' => '', // 物品来源流水号
                    );
$api = new OrderCalculateRequest();
$api->setCityName();
$api->setAppointType();
$api->setAppointmentDate();
$api->setStoreId();
$api->setTravelWay();
$api->setDeliveryType();
$api->setSender($sender);
$api->setReceiverList($receiverList);


$token = 'af47a538-cdee-47cf-92a3-17d3412488c9';
$main = new Main(1, $api);
$data = $main->main($token);
```


> [6 > 提交订单](http://open.ishansong.com/documentCenter/306)
~~~php
// 提交订单
$api = new CreateOrderRequest();
$api->setIssOrderNo('1111'); // 设置订单号

$token = 'af47a538-cdee-47cf-92a3-17d3412488c9';
$main = new Main(1, $api);
$data = $main->main($token);
~~~


> [7 > 订单加价](http://open.ishansong.com/documentCenter/307)
~~~php
// 订单加价
$api = new AdditionRequest();
$api->setIssOrderNo('1111');
$api->setAdditionAmount(200);

$token = 'af47a538-cdee-47cf-92a3-17d3412488c9';
$main = new Main(1, $api);
$data = $main->main($token);
~~~


> [8 > 查询订单状态](http://open.ishansong.com/documentCenter/308)
~~~php
// 查询订单状态
$api = new OrderInfoRequest();
$api->setIssOrderNo('1111');

$token = 'af47a538-cdee-47cf-92a3-17d3412488c9';
$main = new Main(1, $api);
$data = $main->main($token);
~~~


> [9 > 查询闪送员位置信息](http://open.ishansong.com/documentCenter/309)
~~~php
// 查询闪送员位置信息
$api = new CourierInfoRequest();
$api->setIssOrderNo('1111');

$token = 'af47a538-cdee-47cf-92a3-17d3412488c9';
$main = new Main(1, $api);
$data = $main->main($token);
~~~


> [15 > 店铺操作](http://open.ishansong.com/documentCenter/315)
~~~php
// 店铺操作
$api = new StoreOperationRequest();

/** 新增店铺 **/
// 店铺名称
$api->setStoreName('');
// 城市名称，通过开通城市接口获取
$api->setCityName('');
// 店铺地址
$api->setAddress('');
// 店铺详细地址
$api->setAddressDetail('');
// 纬度（百度）
$api->setLatitude('');
// 经度（百度）
$api->setLongitude('');
// 联系人手机
$api->setPhone('');
// 店铺类型
$api->setGoodType('');
// 操作类型
$api->setOperationType(1);



/** 修改店铺 **/ 
// 店铺ID
$api->setStoreId('');
// 店铺名称
$api->setStoreName('');
// 城市名称，通过开通城市接口获取
$api->setCityName('');
// 店铺地址
$api->setAddress('');
// 店铺详细地址
$api->setAddressDetail('');
// 纬度（百度）
$api->setLatitude('');
// 经度（百度）
$api->setLongitude('');
// 联系人手机
$api->setPhone('');
// 店铺类型
$api->setGoodType('');
// 操作类型
$api->setOperationType(2);


$token = 'af47a538-cdee-47cf-92a3-17d3412488c9';
$main = new Main(1, $api);
$data = $main->main($token);
~~~
