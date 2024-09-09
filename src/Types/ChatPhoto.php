<?php

namespace BaleBot\Types;


class ChatPhoto
{
    protected $small_file_id;
    protected $small_file_unique_id;
    protected $big_file_id;
    protected $big_file_unique_id;

    public function __construct($data)
    {
        $this->small_file_id=$data->small_file_id;
        $this->small_file_unique_id=$data->small_file_unique_id;
        $this->big_file_id=$data->big_file_id;
        $this->big_file_unique_id=$data->big_file_unique_id;
    }
}