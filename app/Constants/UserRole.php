<?php

namespace App\Constants;

class UserRole
{
    private function __construct(
        private string $code,
        private string $name
    ) {
        //
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public static function admin(): UserRole
    {
        return new UserRole('ADMIN', 'Admin');
    }

    public static function superUser(): UserRole
    {
        return new UserRole('SU', 'Super User');
    }

    public static function ops(): UserRole
    {
        return new UserRole('OPS', 'Operation');
    }

    public static function user(): UserRole
    {
        return new UserRole('USER', 'User');
    }
}
