<?php

namespace Whb\OpenStack;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ComputeV2Factory extends OpenStackFactory
{

    protected $header;
    /**
     * @return mixed
     */
    protected function createObj()
    {
        $this->client = new Client(['base_uri' => config('openstack.computeV2')]);
    }
    //实例相关操作
    public function createInstance($name,$image_id,$flavor_id){
        $res = $this->send('POST', 'servers', [
            'json' => [
                'server' => [
                    'name' => $name,
                    'imageRef' => $image_id,
                    'flavorRef' => $flavor_id,
                    'networks' => [
                        [
                            'uuid' => config('network')
                        ]
                    ]
                ]
            ]
        ]);
        if ($res && $res->getStatusCode() === 202) {
            $this->data = json_decode($res->getBody()->getContents());
            if (isset($this->data->server) && $this->data->server) {
                $this->data = $this->data->server;
            }
        } else {
            $this->data = [];
        }
        return $this;
    }
}