<?php

namespace Whb\OpenStack;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ComputeV2Factory extends OpenStackFactory
{

    protected $token;
    protected $client;
    protected $data;

    /**
     * @return mixed
     */
    protected function createInstance()
    {
        $this->client = new Client(['base_uri' => config('openstack.computeV2')]);

    }
}