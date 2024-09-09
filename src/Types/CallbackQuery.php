<?php

namespace BaleBot\Types;

class CallbackQuery extends Type
{
    protected $id;
    protected $from;
    protected $message;
    protected $data;

    public function __construct($data)
    {
        $this->id=$data->id;
        $this->from=new User($data->from);
        if(property_exists($data,'message'))
            $this->message=new Message($data->message);
        if(property_exists($data,'data'))
            $this->data=$data->data;        
    }

    public function getData()
    {
        return $this->data;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getFrom()
    {
        return $this->from;
    }
}