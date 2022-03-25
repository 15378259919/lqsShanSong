<?php
/**
 * 获取AccessToken
 * （http://open.ishansong.com/documentCenter/327）
 */

namespace LqsShansong\request;


use LqsShansong\Request;

class AccessTokenRequest extends Request
{

    /**
     * 接口路由
     *
     */
    private $route = '/oauth/token';

    /**
     * 授权到跳转页获取的code
     */
    private $code = '';

    /**
     * @param  string  $code
     */
    public function setCode ($code)
    {
        $this->code = $code;
    }


    public function getCode ()
    {
        return $this->code;
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