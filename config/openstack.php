<?php
/**
 * Created by PhpStorm.
 * Author: whb
 * License: Apache 2.0
 * Date: 2018/8/13
 * Time: 上午9:43
 */
return [
    'api' => [
        'networkV2' => 'http://192.168.1.19:9696/v2.0/',
        'imageV2' => 'http://192.168.1.19:9292/v2/',
        'computeV2' => 'http://192.168.1.19:8774/v2.1/6e11b1be92b9484ab5103b685cd2c761/',
        'identityV3' => 'http://192.168.1.19:5000/v3/'
    ],
    'auth' => [
        'identity' => [
            'methods' => ['password'],
            'password' => [
                'user' => [
                    'name' => 'demo',
                    'domain' => [
                        'name' => 'default'
                    ],
                    'password' => '123456'
                ]
            ]
    ]
    ],
    'ttl'   =>  0,//生命周期
    'token_ttl' =>  50,//token的生命周期（分钟）

];