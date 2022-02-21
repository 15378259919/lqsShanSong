<?php
/**
 * 提交订单
 */

namespace LqsShansong\request;


use LqsShansong\Request;

class CreateOrderRequest extends Request
{

    /**
     * 接口路由 （http://open.ishansong.com/documentCenter/306）
     *
     */
    private $route = '/developer/v5/orderPlace';

    /**
     * 闪送订单号
     * 计费接口获取 (https://open.ishansong.com/documentCenter/305)
     */
    private $issOrderNo;

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
     * @param string $orderNo
     */
    public function setIssOrderNo($orderNo)
    {
        $this->issOrderNo = $orderNo;
    }

    /**
     * 获取闪送订单号
     */
    public function getIssOrderNo()
    {
        return $this->issOrderNo;
    }

    /**
     * 整合请求需要的参数
     */
    public function fieldOption()
    {
        $data['issOrderNo'] = $this->getIssOrderNo();
        $this->setFields($data);
    }




}