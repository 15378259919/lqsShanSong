<?php


namespace LqsShansong;


class Request
{

    /**
     * 全部请求参数
     */
    protected $fields;

    /**
     * 设置全部请求参数
     * @param array $data
     */
    public function setFields(array $data)
    {
        $this->fields = $data;
    }

    /**
     * 获取全部请求参数
     */
    public function getFields()
    {
        if (empty($this->fields)) {
            return NULL;
        } else {
            return json_encode($this->fields);
        }
    }





}