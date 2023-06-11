<?php

namespace App\Traits\Component;

use Illuminate\Support\Str;

trait ToCamel
{
    // Trait methods and properties go here
    public function toCamel(string $text) : string
    {
        return Str::camel($text);
    }
}