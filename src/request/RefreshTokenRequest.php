<?php
/**
 * RefreshToken刷新AccessToken
 **/

namespace LqsShansong\request;


use LqsShansong\Request;

class RefreshTokenRequest extends Request
{
    /**
     * 接口路由 （http://open.ishansong.com/documentCenter/327）
     */
    private $route = '/oauth/refresh_token';


}