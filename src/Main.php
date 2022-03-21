<?php

namespace LqsShansong;


class Main
{

    public $environment; // 1.正式环境 0.测试环境
    public $api;
    public $config;

    /**
     * @param int $environment 1.正式环境 0.测试环境
     * @param object $api 被操作的数据信息类
     */
    public function __construct(int $environment = 1, $api)
    {

        // 整合数据参数
        $api->fieldOption();

        $this->environment = $environment;
        $this->api = $api;

        $this->config = include 'config.php';
    }

    /**
     * 执行主体方法
     * @param string $token 授权成功获取
     *                          授权获取参考(https://open.ishansong.com/documentCenter/327)
     * @return bool|string
     */
    public function main($token = '')
    {
        var_dump('main :' . date('Y-m-d H:i:s'));

        // 获取请求参数
        $param = $this->getPublicParams($token);

        // 发起请求
        $data = $this->requestPost($param);

        if ($data['status'] == 200) {
            $arr = array('code' => 0, 'msg' => $data['msg'], 'data' => $data['data']);
        } else {
            $arr = array('code' => $data['status'], 'msg' => $data['msg']);
        }
        return $arr;
    }


    /**
     *  构造请求数据
     * @param string $token
     * @return array
     */
    public function getPublicParams($token = '')
    {
        $param = array();
        $param['clientId'] = $this->config['app_id'];
        if (!empty($token)) {
            $param['accessToken'] = $token;
        }
        $param['timestamp'] = trim(time() * 1000);
        $param['data'] = $this->api->getFields();
        if (empty($param['data'])) {
            unset($param['data']);
        }

        // 签名计算
        $param['sign'] = $this->sing($param, $this->config['app_secret']);
        return $param;
    }

    /**
     *  生成签名
     * @param array $data 加密参数
     * @param string $appSecret 开发者秘钥
     * @return string
     */
    public function sing(array $data = array(), string $appSecret = ''): string
    {
        //1.升序排序
        ksort($data);

        //2.字符串拼接
        $args = '';

        foreach ($data as $key => $value) {
            $args .= $key . $value;
        }
        $args = $appSecret . $args;
        //3.MD5签名,转为大写
        return strtoupper(md5($args));
    }

    /**
     * @desc 执行请求
     * @param $data
     * @return bool|string
     */
    public function requestPost($data)
    {
        $url = ($this->environment == 1 ? $this->config['url'] : $this->config['test_url']) . $this->api->getRoute();

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);//不抓取头部信息。只返回数据
        curl_setopt($curl, CURLOPT_TIMEOUT, 1000);//超时设置
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//1表示不返回bool值
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded;charset=utf-8']);//重点
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        $resp = curl_exec($curl);
        curl_close($curl);
        return json_decode($resp, true);
    }


}