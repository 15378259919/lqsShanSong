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


}