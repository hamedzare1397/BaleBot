<?php

namespace BaleBot\Types;

class Document
{
    protected $file_id;
    protected $file_unique_id;
    protected $thumbnail;
    protected $file_name;
    protected $mime_type;
    protected $file_size;

    public function __construct($data)
    {
        $this->file_id=$data->file_id;
        $this->file_unique_id=$data->file_unique_id;
        if(property_exists($data,'thumbnail'))
        {
            $this->thumbnail=new PhotoSize($data->thumbnail);
        }
        if(property_exists($data,'file_name'))
        {
            $this->file_name=$data->file_name;
        }
        if(property_exists($data,'file_name'))
        {
            $this->file_name=$data->file_name;
        }
        if(property_exists($data,'mime_type'))
        {
            $this->mime_type=$data->mime_type;
        }
        if(property_exists($data,'file_size'))
        {
            $this->file_size=$data->file_size;
        }
    }
}