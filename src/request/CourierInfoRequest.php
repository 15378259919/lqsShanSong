<?php
/**
 * 查询闪送员位置信息
 * （http://open.ishansong.com/documentCenter/309）
 */

namespace LqsShansong\request;


use LqsShansong\Request;

class CourierInfoRequest extends Request
{

    /**
     * 接口路由
     */
    private $route = '/developer/v5/courierInfo';
    /**
     * 闪送订单号
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
     * @param string $issOrderNo
     */
    public function setIssOrderNo($issOrderNo)
    {
        $this->issOrderNo = $issOrderNo;
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