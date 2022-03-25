<?php
/**
 * 订单计费
 * (https://open.ishansong.com/documentCenter/305)
 */


namespace LqsShansong\request;


use LqsShansong\Request;

class OrderCalculateRequest extends Request
{

    /**
     * 接口路由
     */
    private $route = '/developer/v5/orderCalculate';
    /**
     * 城市名称
     */
    private $cityName;
    /**
     * 预约类型 0立即单，1预约单
     */
    private $appointType;
    /**
     * 预约时间 只支持两个小时以后两天以内
     */
    private $appointmentDate;
    /**
     * 店铺ID  不传递店铺ID订单就认为默认店铺下单
     */
    private $storeId;
    /**
     * 可指定的交通工具方式
     */
    private $travelWay;
    /**
     * 帮我取 帮我送 1.帮我送 2.帮我取 ；默认为1
     */
    private $deliveryType;
    /**
     * 发件人信息
     */
    private $sender;
    /**
     * 收件人信息(列表)
     */
    private $receiverList;

    /**
     * 设置接口路由
     * @param string $route
     */
    public function setRoute($route)
    {
        $this->route = $route;
    }

    /**
     * 获取接口路由
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * 设置城市名称
     * @param string $cityName
     */
    public function setCityName($cityName)
    {
        $this->cityName = $cityName;
    }

    /**
     * 获取城市名称
     */
    public function getCityName()
    {
        return $this->cityName;
    }

    /**
     * 设置预约类型 0立即单，1预约单
     * @param int $appointType
     */
    public function setAppointType($appointType = 0)
    {
        $this->appointType = $appointType;
    }

    /**
     * 获取预约类型
     */
    public function getAppointType()
    {
        return $this->appointType;
    }

    /**
     * 设置预约时间
     * @param string|int $appointmentDate
     */
    public function setAppointmentDate($appointmentDate)
    {
        if (is_numeric($appointmentDate)) {
            $this->appointmentDate = date('Y-m-d H:i:s');
        } else {
            $this->appointmentDate = $appointmentDate;
        }
    }

    /**
     * 获取预约时间
     */
    public function getAppointmentDate()
    {
        return $this->appointmentDate;
    }

    /**
     * 设置店铺ID  不传递店铺ID订单就认为默认店铺下单
     * @param string $storeId
     */
    public function setStoreId($storeId = '')
    {
        $this->storeId = $storeId;
    }

    /**
     * 获取店铺ID
     */
    public function getStoreId()
    {
        return $this->storeId;
    }

    /**
     * 设置可指定的交通工具方式
     * @param string $travelWay
     */
    public function setTravelWay($travelWay = '')
    {
        $this->travelWay = $travelWay;
    }

    /**
     * 获取可指定的交通工具方式
     */
    public function getTravelWay()
    {
        return $this->travelWay;
    }

    /**
     * 设置 1.帮我送 2.帮我取 ；默认为1
     * @param int $deliveryType
     */
    public function setDeliveryType($deliveryType = 1)
    {
        $this->deliveryType = $deliveryType;
    }

    /**
     * 获取 1.帮我送 2.帮我取 ；默认为1
     */
    public function getDeliveryType()
    {
        return $this->deliveryType;
    }

    /**
     * 设置发件人信息
     * @param array $sender
     * $sender = array(
     *      'fromAddress' => '', // 寄件地址
     *      'fromAddressDetail' => '', // 寄件详细地址
     *      'fromSenderName' => '', // 寄件人姓名
     *      'fromMobile' => '', // 寄件联系人
     *      'fromLatitude' => '', // 百度-寄件纬度
     *      'fromLongitude' => '', //  百度-寄件经度
     * );
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
    }

    /**
     * 获取发件人信息
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * 设置收件人信息(列表)
     * @param array $receiverList
     * $sender = array(
     *      'orderNo' => '', // 第三方平台流水号
     *      'toAddress' => '', // 收件地址
     *      'toAddressDetail' => '', // 收件详细地址
     *      'toLatitude' => '', // 百度-收件纬度
     *      'toLongitude' => '', // 百度-收件经度
     *      'toReceiverName' => '', // 收件人姓名
     *      'toMobile' => '', // 收件联系人
     *      'goodType' => '', // 物品类型 详见下放物品类型标签枚举
     *      'weight' => '', // 物品类型 （传向上取整整数，单位为kg）
     *      'remarks' => '', // 备注
     *      'insurance' => '', // 保险费用
     *      'insuranceProId' => '', // 保险产品ID
     *      'additionFee' => '', // 小费
     *      'orderingSourceType' => '', // 物品来源
     *      'orderingSourceNo' => '', // 物品来源流水号
     * );
     */
    public function setReceiverList($receiverList)
    {
        $this->receiverList = $receiverList;
    }

    /**
     * 获取收件人信息(列表)
     */
    public function getReceiverList()
    {
        return $this->receiverList;
    }


    /**
     * 整合请求需要的参数
     */
    public function fieldOption()
    {
        // 参数设置
        $data['cityName'] = $this->getCityName();
        $data['appointType'] = $this->getAppointType();
        $data['appointmentDate'] = $this->getAppointmentDate();
        $data['storeId'] = $this->getStoreId();
        $data['travelWay'] = $this->getTravelWay();
        $data['deliveryType'] = $this->getDeliveryType();
        $data['sender'] = $this->getSender();
        $data['receiverList'] = $this->getReceiverList();

        // 参数过滤
        $data = $this->param_del_null($data);

        $this->setFields($data);
    }

    /**
     * 信息参数去空
     * @param array $param
     * @return array
     */
    public function param_del_null($param)
    {
        if (empty($param)) return array();

        foreach ($param AS $key => &$value) {
            if (is_array($value)) {
                $this->param_del_null($value);
            }
            if (empty($value)) {
                unset($param[$key]);
            }
        }

        return $param;
    }




}