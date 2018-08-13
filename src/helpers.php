<?php
if (!function_exists('getToken')) {
    function getToken()
    {
        if (!$token = Cache::get('openstack_token')) {
            $client = new Client([
                'base_uri' => config('openstack.api.identityV3')
            ]);
            $res = $client->request('POST', 'auth/tokens', [
                'json' => ['auth' => config('open_stack.auth')]
            ]);
            if ($res->getReasonPhrase() === 'Created' && $res->getStatusCode() === 201) {
                $token = $res->getHeader('X-Subject-Token');
                Cache::add('openstack_token', $token, config('openstack.token_ttl'));
            } else {
                $token = '';
            }
        }
        return $token;
    }
}