<?php

namespace BaleBot\Runners;

use BaleBot\Models\Logger;
use BaleBot\Response\ResponseGetMe;
use BaleBot\Types\User;

class GetMe
{
    public function __invoke()
    {
        dump('start getData');
        $logger=new Logger();

        $response=$logger->getme();
        if($response)
        {
            echo (new ResponseGetMe($response))->dump();
        }
        else return false;
    }
}