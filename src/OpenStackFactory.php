<?php
/**
 * Created by PhpStorm.
 * User: wanghaibo
 * Date: 2018/8/11
 * Time: 下午6:37
 */

namespace Whb\OpenStack;


abstract class OpenStackFactory{
    protected $token;
    protected $data;
    protected $header;
    protected $client;
    abstract protected function createObj();
    public function create(){
        $obj = $this->createObj();
        $obj->token = getToken();
        $obj->header = [
            'X-Auth-Token' => $this->token
        ];
        return $obj;
    }
    public function getData(){
        return $this->data;
    }
    public function send($method,$uri,$param=[]){
        $param = array_merge_recursive(
            ['headers' => $this->header],
            $param
        );
        return $this->client->request($method, $uri, $param);
    }
}