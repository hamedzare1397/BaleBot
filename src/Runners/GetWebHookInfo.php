<?php

namespace BaleBot\Runners;

use BaleBot\Models\Logger;
use BaleBot\Response\ResponseGetMe;
use BaleBot\Response\ResponseGetWebHookInfo;
use BaleBot\Types\User;

class GetWebHookInfo
{
    public function __invoke()
    {
        dump('start GetWebHookInfo');
        $logger=new Logger();

        $response=$logger->getWebhookInfo();
        // dump($response->getBody()->getContents());
        if($response)
        {
            echo (new ResponseGetWebHookInfo($response))->getUrl();
        }
        else return false;
    }
}