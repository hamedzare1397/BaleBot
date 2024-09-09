<?php

namespace BaleBot\Response;

use BaleBot\Types\User;
use GuzzleHttp\Psr7\Response;

class ResponseGetMe
{
    protected $user=null;

    public function getUser(){
        return $this->user;
    }

    public function __construct(Response $response)
    {
        $response=json_decode($response->getBody()->getContents());
        if($response->ok)
        {
            $this->user=new User($response->result);
        }
    }

    public function dump()
    {
        dump($this->user);
    }

    public function print()
    {
        if(is_null($this->user)){
            return 'من هنوز هویت نگرفته ام';
        }
        else{
            return $this->user->description();
        }
    }
}