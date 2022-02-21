<?php
/***
 * 查询订单状态 (http://open.ishansong.com/documentCenter/308)
 */

namespace LqsShansong\request;


use LqsShansong\Request;

class OrderInfoRequest extends Request
{

    /**
     * 接口路由
     */
    private $route = '/developer/v5/orderInfo';

    /**
     * 闪送订单号
     */
    private $issOrderNo;
    /**
     * 第三方平台流水号
     * 和计费接口orderNo字段保持一致
     */
    private $thirdOrderNo;

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
     * 设置闪送订单号
     * @param string $issOrderNo  闪送订单号
     */
    public function setIssOrderNo(string $issOrderNo) {
        $this->issOrderNo = $issOrderNo;
    }

    /**
     * 获取闪送订单号
     */
    public function getIssOrderNo() {
        return $this->issOrderNo;
    }

    /**
     * 设置第三方平台流水号
     * @param string $orderNo  	和计费接口orderNo字段保持一致
     */
    public function setThirdOrderNo(string $orderNo) {
        $this->thirdOrderNo = $orderNo;
    }

    /**
     * 获取第三方平台流水号
     */
    public function getThirdOrderNo() {
        return $this->thirdOrderNo;
    }



    /**
     * 整合请求需要的参数
     */
    public function fieldOption()
    {
        $data['issOrderNo'] = $this->getIssOrderNo();
        $data['thirdOrderNo'] = $this->getThirdOrderNo();
        $this->setFields($data);
    }
}