<?php
/***
 * 新增、修改店铺
 */


namespace LqsShansong\request;


use LqsShansong\Request;

class StoreOperationRequest extends Request
{

    /**
     * 接口路由
     */
    private $route = '/developer/v5/storeOperation';

    /**
     * 店铺名称
     */
    private $storeId;
    /**
     * 店铺名称
     */
    private $storeName;
    /**
     * 城市名称
     */
    private $cityName;
    /**
     * 店铺地址
     */
    private $address;
    /**
     * 店铺详细地址
     */
    private $addressDetail;
    /**
     * 店铺纬度（百度坐标系）
     */
    private $latitude;
    /**
     * 店铺经度（百度坐标系）
     */
    private $longitude;
    /**
     * 店铺联系人手机号/座机
     */
    private $phone;
    /**
     * 店铺联系人手机号/座机
     */
    private $goodType;
    /**
     * 操作类型  1：新增店铺； 2：修改店铺
     */
    private $operationType;

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
     * @param int $storeId
     */
    public function setStoreId(int $storeId)
    {
        $this->storeId = $storeId;
    }

    /**
     * 获取接口路由
     */
    public function getStoreId()
    {
        return $this->storeId;
    }

    /**
     * 设置接口路由
     * @param string $storeName 店铺名称
     */
    public function setStoreName($storeName)
    {
        $this->storeName = $storeName;
    }

    /**
     * 获取接口路由
     */
    public function getStoreName()
    {
        return $this->storeName;
    }

    /**
     * 设置接口路由
     * @param string $cityName 城市名称,查询开通城市接口获取
     */
    public function setCityName( string  $cityName)
    {
        $this->cityName = $cityName;
    }

    /**
     * 获取接口路由
     */
    public function getCityName()
    {
        return $this->cityName;
    }

    /**
     * 设置接口路由
     * @param string $address
     */
    public function setAddress( string $address)
    {
        $this->address = $address;
    }

    /**
     * 获取接口路由
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * 设置接口路由
     * @param string $addressDetail 店铺详细地址
     */
    public function setAddressDetail( string $addressDetail)
    {
        $this->addressDetail = $addressDetail;
    }

    /**
     * 获取接口路由
     */
    public function getAddressDetail()
    {
        return $this->addressDetail;
    }

    /**
     * 设置接口路由
     * @param string $latitude 店铺纬度
     */
    public function setLatitude( string $latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * 获取接口路由
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * 设置接口路由
     * @param string $longitude 店铺经度
     */
    public function setLongitude(string $longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * 获取接口路由
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * 设置接口路由
     * @param string $phone 店铺联系人手机号/座机
     */
    public function setPhone( string $phone)
    {
        $this->phone = $phone;
    }

    /**
     * 获取接口路由
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * 设置店铺业务类型
     * @param int $goodType 店铺业务类型
     *          店铺类型标签	店铺类型标签名称
     *           1	        文件广告
     *           3	        电子产品
     *           5	        蛋糕
     *           6	        快餐水果
     *           7	        鲜花绿植
     *           8	        海鲜水产
     *           9	        汽车配件
     *           10	        其他
     *           11	        宠物
     *           12	        母婴
     *           13	        医药健康
     *           14	        教育
     */
    public function setGoodType(int $goodType)
    {
        $this->goodType = $goodType;
    }

    /**
     * 获取店铺业务类型
     */
    public function getGoodType()
    {
        return $this->goodType;
    }

    /**
     * 设置操作类型
     * @param int $operationType 操作类型 1：新增店铺； 2：修改店铺
     */
    public function setOperationType( int $operationType)
    {
        $this->operationType = $operationType;
    }

    /**
     * 获取操作类型
     */
    public function getOperationType()
    {
        return $this->operationType;
    }



    /**
     * 整合请求需要的参数
     */
    public function fieldOption()
    {
        $data['storeId'] = $this->getStoreId();
        $data['storeName'] = $this->getStoreName();
        $data['cityName'] = $this->getCityName();
        $data['address'] = $this->getAddress();
        $data['addressDetail'] = $this->getAddressDetail();
        $data['latitude'] = $this->getLatitude();
        $data['longitude'] = $this->getLongitude();
        $data['phone'] = $this->getPhone();
        $data['goodType'] = $this->getGoodType();
        $data['operationType'] = $this->getOperationType();
        $data = array_filter($data);

        $this->setFields($data);
    }

}