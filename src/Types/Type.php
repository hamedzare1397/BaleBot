<?php

namespace BaleBot\Types;

use ErrorException;
use Exception;
use Illuminate\Support\Str;
use TypeError;

class Type
{
    protected $attributes=[];

    public function __construct($data)
    {
        if(!is_null($data)){
            $class=$this->getClassName();
            $attributes=include(__DIR__.DIRECTORY_SEPARATOR."classMap.php");

            if(array_key_exists($class,$attributes))
            {
                $attributes=$attributes[$class];
            }
            foreach($attributes as $key=>$value)
            {
                if(property_exists($data,$key))
                {
                    if(is_null($value))
                    {
                        continue;
                    }
                    // dump($value,Type::class,is_subclass_of($value,Type::class));
                    if(is_subclass_of($value,Type::class))
                    {
                        $this->attributes[$key]=new $value($data->{$key});
                    }
                    else
                    {
                        $this->attributes[$key]=$data->{$key};
                    }
                }

            }
        }

        // dump($this->attributes);
    }


    private function getClassName()
    {
        return Str::afterLast(get_class($this),'\\');
    }


    public function __call($nameFunc, $arguments)
    {
        if(Str::startsWith($nameFunc,'get')){
            $name=Str::lower(Str::after($nameFunc,'get'));
            // dump($name,$nameFunc,$this->attributes,$this->getClassName(),$this);
            if(array_key_exists($name,$this->attributes))
            {
                return $this->attributes[$name];
            }
        }
        else{
            return call_user_func([$this,$nameFunc],$arguments);
        }
    }
}