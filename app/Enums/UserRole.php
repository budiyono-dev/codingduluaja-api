<?php

namespace App\Enums;

enum UserRole: string
{
    case SuperAdmin = 'super-admin';
    case SuperUser = 'super-user';
    case User = 'user';
}
