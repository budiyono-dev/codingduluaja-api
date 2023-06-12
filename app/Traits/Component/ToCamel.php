<?php

namespace App\Traits\Component;

use Illuminate\Support\Str;

trait ToCamel
{
    public function toCamel(string $text) : string
    {
        return Str::camel($text);
    }
}