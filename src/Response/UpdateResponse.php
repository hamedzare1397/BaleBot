<?php

namespace BaleBot\Response;

use GuzzleHttp\Psr7\Response as GuzzleResponse;

class UpdateResponse
{
    protected $ok;
    protected $result;

    public function getResult()
    {
        return $this->result;
    }

    public function __construct(GuzzleResponse $response)
    {
        $res=json_decode($response->getBody()->getContents());
        $this->result=collect();
        $this->ok=$res->ok;
        foreach($res->result as $item)
        {
            $this->result->add(new ItemUpdate($item));
        }
    }
}