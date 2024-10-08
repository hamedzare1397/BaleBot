<?php

return 
[
    'User'=>[
        'id'=>'integer',
        'is_bot'=>'boolean',
        'first_name'=>'string',
        'last_name'=>'string',
        'username'=>'string',
        'language_code'=>'string',
    ],
    'Chat'=>[
        'id'=>'integer',
        'type'=>'string',
        'title'=>'string',
        'username'=>'string',
        'first_name'=>'string',
        'last_name'=>'string',
        'photo'=>BaleBot\Types\ChatPhoto::class,
    ],
    'Message'=>[
        'message_id'=>'integer',
        'from'=>BaleBot\Types\User::class,
        'date'=>'integer',
        'chat'=>BaleBot\Types\Chat::class,
        'forward_from'=>BaleBot\Types\User::class,
        'forward_from_chat'=>BaleBot\Types\Chat::class,
        'forward_from_message_id'=>'integer',
        'forward_date'=>'integer',
        'reply_to_message'=>BaleBot\Types\Message::class,
        'edite_date'=>'integer',
        'text'=>'string',
        'animation'=>BaleBot\Types\Animation::class,
        'audio'=>BaleBot\Types\Audio::class,
        'document'=>BaleBot\Types\Document::class,
        'photo'=>[
            'type'=>BaleBot\Types\PhotoSize::class,
        ],
        'sticker'=>BaleBot\Types\Sticker::class,
        'video'=>BaleBot\Types\Video::class,
        'voice'=>BaleBot\Types\Voice::class,
        'caption'=>'string',
        'contact'=>BaleBot\Types\Contact::class,
        'location'=>BaleBot\Types\Location::class,
        'new_chat_members'=>[
            'type'=>BaleBot\Types\User::class,
        ],
        'left_chat_member'=>BaleBot\Types\User::class,
        'invoice'=>'Invoice',
        'successful_payment'=>BaleBot\Types\SuccessfulPayment::class,
        'reply_markup'=>BaleBot\Types\InlineKeyboardMarkup::class,
    ],
    'MessageId'=>[
        'message_id'=>'integer',
    ],
    'PhotoSize'=>[
        'file_id'=>'string',
        'file_unique_id'=>'string',
        'width'=>'integer',
        'height'=>'integer',
        'file_size'=>'integer',
    ],
    'Animation'=>[
        'file_id'=>'string',
        'file_unique_id'=>'string',
        'width'=>'integer',
        'height'=>'integer',
        'duration'=>'integer',
        'thumbnail'=>BaleBot\Types\PhotoSize::class,
        'file_name'=>'string',
        'mime_type'=>'string',
        'file_size'=>'integer',
    ],
    'Audio'=>[
        'file_id'=>'string',
        'file_unique_id'=>'string',
        'duration'=>'integer',
        'title'=>'string',
        'file_name'=>'string',
        'mime_type'=>'string',
        'file_size'=>'Integer',
    ],
    'Document'=>[
        'file_id'=>'string',
        'file_unique_id'=>'string',
        'thumbnail'=>BaleBot\Types\PhotoSize::class,
        'file_name'=>'string',
        'mime_type'=>'string',
        'file_size'=>'string',
    ],
    'Video'=>[
        'file_id'=>'string',
        'file_unique_id'=>'string',
        'width'=>'integer',
        'height'=>'integer',
        'duration'=>'integer',
        'file_name'=>'string',
        'mime_type'=>'string',
        'file_size'=>'integer',
    ],
    'Voice'=>[
        'file_id'=>'string',
        'file_unique_id'=>'string',
    ],
    'Contact'=>[
        'phone_number'=>'string',
        'first_name'=>'string',
        'last_name'=>'string',
        'user_id'=>'integer',
    ],
    'Location'=>[
        'longitude'=>'float',
        'latitude'=>'float',
    ],
    'File'=>[
        'file_id'=>'string',
        'file_unique_id'=>'string',
        'file_size'=>'integer',
        'file_path'=>'string',
    ],
    'ReplyKeyboardMarkup'=>[
        'keyboard'=>[
            'type'=>BaleBot\Types\KeyboardButton::class,
        ]
    ],
    'KeyboardButton'=>[
        'text'=>'string',
        'request_contact'=>'boolean',
        'request_location'=>'boolean',
    ],
    'InlineKeyboardButton'=>[
        'text'=>'string',
        'url'=>'string',
        'callback_data'=>'string',
    ],
    'CallbackQuery'=>[
        'id'=>'string',
        'from'=>BaleBot\Types\User::class,
        'message'=>BaleBot\Types\Message::class,
        'data'=>'string',
    ],
    'ChatPhoto'=>[
        'small_file_id'=>'string',
        'small_file_unique_id'=>'string',
        'big_file_id'=>'string',
        'big_file_unique_id'=>'string',
    ],
    'InputMedia'=>[],
    'InputMediaPhoto'=>[
        'type'=>'string',
        'media'=>'string',
        'caption'=>'string',
    ],
    'InputMediaVideo'=>[
        'type'=>'string',
        'media'=>'string',
        'thumbnail'=>[
            'type'=>['string',BaleBot\Types\InputMedia::class,],
        ],
        'caption'=>'string',
        'width'=>'integer',
        'height'=>'integer',
        'duration'=>'integer',
    ],
    'InputMediaAnimation'=>[
        'type'=>'string',
        'media'=>'string',
        'thumbnail'=>[
            'type'=>['string',BaleBot\Types\InputMedia::class,]
        ],
        'caption'=>'string',
        'width'=>'integer',
        'height'=>'integer',
        'duration'=>'integer',
    ],
    'InputMediaAudio'=>[
        'type'=>'string',
        'media'=>'string',
        'thumbnail'=>[
            'type'=>['string',BaleBot\Types\InputMedia::class,]
        ],
        'caption'=>'string',
        'duration'=>'integer',
    ],
    'InputMediaDocument'=>[
        'type'=>'string',
        'media'=>'string',
        'thumbnail'=>[
            'type'=>['string',BaleBot\Types\InputMedia::class,
        ],
        'caption'=>'string',
    ],
    'InputFile'=>[],
]
];