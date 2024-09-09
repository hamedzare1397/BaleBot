<?php

namespace BaleBot\Types;


class InputMediaAnimation extends InputMedia
{
    protected $type;
    protected $media;
    protected $thumbnail;
    protected $caption;
    protected $width;
    protected $height;
    protected $duration;

    public function __construct($data)
    {
        $this->type='animation';
        $this->media=$data->media;
        if(property_exists($data,'thumbnail'))
        {
            if(is_string($data->thumbnail))
            {
                $this->thumbnail=$data->thumbnail;
            }
            else
            {
                $this->thumbnail=new InputFile($data->thumbnail);
            }
        }
        if(property_exists($data,'caption'))
        {
            $this->caption=$data->caption;
        }
        if(property_exists($data,'width'))
        {
            $this->width=$data->width;
        }
        if(property_exists($data,'height'))
        {
            $this->height=$data->height;
        }
        if(property_exists($data,'duration'))
        {
            $this->duration=$data->duration;
        }
    }
}