<?php
/**
 * 订单加价 （http://open.ishansong.com/documentCenter/307）
 */

namespace LqsShansong\request;


use LqsShansong\Request;

class AdditionRequest extends Request
{

    /**
     * 接口路由
     */
    private $route = '/developer/v5/addition';

    /**
     * 闪送订单号
     */
    private $issOrderNo;
    /**
     * 加价金额 :单位（分）
     */
    private $additionAmount;

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
     * 设置加价金额
     * @param int $additionAmount  加价金额，单位：分
     */
    public function setAdditionAmount(int $additionAmount)
    {
        $this->additionAmount = $additionAmount;
    }

    /**
     * 获取加价金额
     */
    public function getAdditionAmount()
    {
        return $this->additionAmount;
    }


    /**
     * 整合请求需要的参数
     */
    public function fieldOption()
    {
        $data['issOrderNo'] = $this->getIssOrderNo();
        $data['additionAmount'] = $this->getAdditionAmount();
        $this->setFields($data);
    }



}