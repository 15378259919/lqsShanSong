<?php
/**
 * RefreshToken刷新AccessToken
 * （http://open.ishansong.com/documentCenter/327）
 **/

namespace LqsShansong\request;


use LqsShansong\Request;

class RefreshTokenRequest extends Request
{
    /**
     * 接口路由
     */
    private $route = '/oauth/refresh_token';

    /**
     * refreshToken 数据信息
     */
    private $refreshToken = '';

    /**
     * 设置接口路由
     * @param string $route
     */
    public function setRoute( string $route)
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
     * 设置接口路由
     * @param string $refreshToken
     */
    public function setRefreshToken(string $refreshToken)
    {
        $this->refreshToken = $refreshToken;
    }

    /**
     * 获取接口路由
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }


    /**
     * 整合请求需要的参数
     */
    public function fieldOption()
    {
        $data['refreshToken'] = $this->getRefreshToken();
        $data = array_filter($data);

        $this->setFields($data);
    }


}