<?php

namespace BaleBot\Types;

use Illuminate\Support\Facades\Log;

class User
{
    protected $id;
    protected $is_bot;
    protected $first_name;
    protected $last_name;
    protected $username;
    protected $language_code;

    public function __construct($data)
    {
        if(property_exists($data,'id'))
        {
            $this->id=$data->id;
        }
        $this->is_bot=$data->is_bot;
        $this->first_name=$data->first_name;
        if(property_exists($data,'last_name'))
        {
            $this->last_name=$data->last_name;
        }

        if(property_exists($data,'username'))
        {
            $this->username=$data->username;
        }

        if(property_exists($data,'language_code'))
        {
            $this->language_code=$data->language_code;
        }
    }

    public function getFullName()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function description(){
        if($this->is_bot)
        {
            return 'من یک ربات به نام '.$this->getFullName().' هستم';
        }
        else{
            return 'نام من '.$this->getFullName().' هست';
        }
    }
}