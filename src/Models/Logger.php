<?php

namespace BaleBot\Models;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class Logger extends Client
{
    const TOKEN='332131354:lTufGpHCymn6xlrHjvln6w68SZGtVN6uC8NjwSaa';

    public function __construct($config=[])
    {
        if(!array_key_exists('base_uri',$config))
        {
            $config=array_merge($config,['base_uri'=>'https://tapi.bale.ai/bot'.self::TOKEN.'/']);
        }
        parent::__construct($config);
    }
    public function postApi($method,array $data=[])
    {
        return $this->post($method,$data);
    }

    public function getApi($method,array $data=[])
    {
        $data=['form_params'=>$data];
        return $this->get($method,$data);
    }

    public function update($offset=1,$limit=100):Response
    {
        return $this->post('getUpdates',[
            'form_params'=>[
                'offset'=>$offset,
                'limit'=>$limit,
            ]
        ]);
    }

    public function sendMessage($chat_id,$text,$message_id=null,$reply_markup=null)
    {
        $form_params=[
            'chat_id'=>$chat_id,
            'text'=>$text,
            'reply_to_message_id'=>$message_id,
            'reply_markup'=>$reply_markup,
        ];
        dump(json_encode($form_params));
        return $this->post('sendMessage',[
            'form_params'=>$form_params,
        ]);
    }

    public function getme():Response|bool
    {
        $response=$this->post('getme');
        if($response->getStatusCode()==200)
        {
            return $response;
        }
        return false;
    }

    public function getWebhookInfo():Response|bool
    {
        $response=$this->post('getWebhookInfo');
        if($response->getStatusCode()==200)
        {
            return $response;
        }
        return false;
    }
}


// $p=new Logger();
// ($p->update())->getBody()->getContents();