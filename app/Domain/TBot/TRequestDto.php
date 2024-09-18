<?php

namespace App\Domain\TBot;

class TRequestDto
{
    public function __construct(
        int $messageId,
        FromDto $from,
    ) {}

    public static function toDto($req)
    {
        return new TRequestDto(
            $req['message_id'],
            FromDto::toDto($req['from'])
        );
    }
}

class FromDto
{
    public function __construct(
        $id,
        $isBot,
        $firstName,
        $lastName,
        $userName,
        $languageCode
    ) {}

    public static function toDto($from)
    {
        return new FromDto(
            $from['id'],
            $from['is_bot'],
            $from['first_name'],
            $from['last_name'],
            $from['user_name'],
            $from['language_code']
        );
    }
}
