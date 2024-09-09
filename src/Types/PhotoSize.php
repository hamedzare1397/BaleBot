<?php

namespace BaleBot\Types;

class PhotoSize
{
    protected $file_id;
    protected $file_unique_id;
    protected $width;
    protected $height;
    protected $file_size;

    public function __construct($data)
    {
        $this->file_id=$data->file_id;        
        $this->file_unique_id=$data->file_unique_id;        
        $this->width=$data->width;        
        $this->height=$data->height;  
        if(property_exists($data,'file_size'))
        {
            $this->file_size=$data->file_size;        
        }
    }
}