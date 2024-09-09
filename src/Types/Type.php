<?php

namespace BaleBot\Types;

use Illuminate\Support\Str;

class Type
{
    protected $attributes;

    public function __construct($data)
    {
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
                dump($value,Type::class,is_subclass_of($value,Type::class));
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

        dump($this->attributes);
    }


    private function getClassName()
    {
        return Str::afterLast(get_class($this),'\\');
    }




    // public function __construct($data)
    // {
    //     $variables=get_object_vars($data);
    //     foreach($variables as $key=>$value){
    //         $this->attributes[$key]=$value;
    //     }
    // }

    public function __call($nameFunc, $arguments)
    {
        if(Str::startsWith($nameFunc,'get')){
            $name=Str::lower(Str::after($nameFunc,'get'));
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