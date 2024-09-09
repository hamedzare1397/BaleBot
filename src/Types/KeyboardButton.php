<?php 

namespace BaleBot\Types;

class KeyboardButton
{
    protected $keyboards;
    protected $keys;
    protected $type;
    protected $row=0;

    public function __construct($type='keyboard',array $keys=[])
    {
        $this->keys=$keys;
        $this->type=$type;
        $this->keyboards=[$this->type=>$this->keys];
    }

    public function toJson()
    {
        return json_encode($this->keyboards);
    }
}