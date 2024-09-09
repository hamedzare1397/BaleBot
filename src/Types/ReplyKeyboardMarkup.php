<?php 

namespace BaleBot\Types;

use Iterator;

class ReplyKeyboardMarkup implements Iterator
{
    protected $data;
    protected $key=0;

    public function __construct($data)
    {
        $this->data=[];
        $count=0;
        foreach($data as $item)
            $this->data[$count++]=new KeyboardButton($item);
    }
    
    public function current(): mixed
    {
        return $this->data[$this->key];
    }

    public function next(): void
    {
        if(count($this->data)<$this->key)
            $this->key++;
    }

    public function key(): mixed
    {
        return $this->key;
    }

    public function valid(): bool
    {
        return array_key_exists($this->key,$this->data);
    }

    public function rewind(): void
    {
        if($this->key>=0)
            $this->key--;
    }
}