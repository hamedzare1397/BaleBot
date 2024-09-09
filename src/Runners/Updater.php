<?php

namespace BaleBot\Runners;

use BaleBot\Models\Logger;
use BaleBot\Response\UpdateResponse;
use BaleBot\Types\KeyboardButton;
use Illuminate\Support\Facades\Cache;

use function PHPUnit\Framework\callback;

class Updater
{
    public function __invoke()
    {
        if(!Cache::has('offset')){
            Cache::set('offset',1);
        }
        $offset=87;
        // $offset=Cache::get('offset',1);
        dump('start from offset:'.$offset);
        $logger=new Logger();
        $content=$logger->update($offset);
        // dump($content->getBody()->getContents());
        $objects=new UpdateResponse($content);
        // dump($content->getBody()->getContents());
        if(!$objects->getResult()->isEmpty()){
            foreach($objects->getResult() as $item)
            {
                if(!is_null($item->getMessage()))
                {
                    $message=$item->getMessage();
                    $chat=$message->getChat();
                    dump('user is typed: '.$message->getText());
                    [$textResponseToUser,$buttons]=$this->response($message->getText());
                }

                elseif(!is_null($item->getCallbackQuery())){
                    $message=$item->getCallbackQuery()->getMessage();
                    $chat=$message->getChat();
                    $data=$item->getCallbackQuery()->getData();
                    dump('tap button: '.$data);
                    [$textResponseToUser,$buttons]=$this->response($data);
                }
                dd($message,$chat);
                $logger->sendMessage($chat->getId(),$textResponseToUser,$message->getId(),$buttons);
            }
            Cache::set('offset',$item->getUpdateId());
        }
    }

    private function response($text)
    {
        $buttons=new KeyboardButton(keys:[
            [
                ['text' => 'سلام', 'callback_data' => "سلام"],
                ['text' => '🔒 عضویت در کانال', 'url' => "https://oas.sums.ac.ir"],
                
            ],
            [
                ['text' => '🔸 برسی عضویت 🔸', 'callback_data' => 'salam']
            ],
        ]);
        switch($text){
            case '/start':
            case 'salam':
                return['وقت بخیر',
                $buttons->toJson(),
            ];
            case 'سلام':
                return ['سلام به بازوی اطلاع رسانی دانشگاه علوم پزشکی شیراز خوش آمدید',
                $buttons->toJson(),
            ];
                break;
            case 'تغییر رمز':
                return ['برای تغییر رمز از لینک زیر استفاده نمایید.',
                $buttons->toJson(),
            ];
            default:
                return ['فرمان شما قابل اجرا نیست لطفا با ارسال کلمه راهنما 
جهت دریافت راهنمایی بازو استفاده نمایید.',
                $buttons->toJson(),
            ];
        }
    }
}