<?php

namespace BaleBot\Response;

use GuzzleHttp\Psr7\Response;

class ResponseGetWebHookInfo
{
    protected $url;

    public function __construct(Response $response)
    {
        $response=json_decode($response->getBody()->getContents());
        if($response->ok )
        {
            $this->url=$response->url;
        }
    }

    public function getUrl()
    {
        return $this->url;
    }
}