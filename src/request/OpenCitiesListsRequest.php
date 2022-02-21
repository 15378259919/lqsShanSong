<?php
/**
 * 查询开通城市 (http://open.ishansong.com/documentCenter/301)
 **/

namespace LqsShansong\request;


use LqsShansong\Request;

class OpenCitiesListsRequest extends Request
{

    /**
     * 接口路由
     */
    private $route = '/developer/v5/openCitiesLists';

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
     * 整合请求需要的参数
     */
    public function fieldOption()
    {
        $this->setFields([]);
    }
}