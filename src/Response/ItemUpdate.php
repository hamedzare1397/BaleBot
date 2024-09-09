<?php

namespace BaleBot\Response;

use BaleBot\Types\CallbackQuery;
use BaleBot\Types\Message;
use stdClass;

class ItemUpdate
{
    protected $update_id;
    protected $message;
    protected $callbackQuery;

    public function __construct(stdClass $data)
    {
        $this->update_id=$data->update_id;
        if(property_exists($data,'message'))
            $this->message=new Message($data->message);
        if(property_exists($data,'callback_query')){
            $this->callbackQuery=new CallbackQuery($data->callback_query);
        }
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getUpdateId(){
        return $this->update_id;
    }

    public function getChat()
    {
        return $this->message->getChat();
    }

    public function getCallbackQuery()
    {
        return $this->callbackQuery;
    }

    public function dump()
    {
        dump($this);
    }
}