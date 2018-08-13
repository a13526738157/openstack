<?php
/**
 * Created by PhpStorm.
 * User: wanghaibo
 * Date: 2018/8/11
 * Time: 下午6:37
 */

namespace Whb\OpenStack;


abstract class OpenStackFactory{
    abstract protected function createInstance();
    public function create(){
        $obj = $this->createInstance();
        return $obj;
    }
}