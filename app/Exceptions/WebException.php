<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class WebException extends Exception
{
    protected string $redirectRoute;

    public function __construct(string $redirectRoute = 'dasboard', $message = '', int $code = 0, ?Throwable $previous = null)
    {
        $this->redirectRoute = $redirectRoute;
        parent::__construct($message, $code, $previous);
    }

    public static function appInUse(string $routeName)
    {
        return new static($routeName,'Application Already In Use');
    }

    public static function resourceInUse(string $routeName)
    {
        return new static($routeName,'Resource In Use');
    }

    public static function haveActiveToken(string $routeName)
    {
        return new static($routeName,'Already Have Active Token');
    }

    public function render()
    {
        return redirect()->route($this->redirectRoute)->with('status', "{$this->message}|danger");
    }

    public static function tokenNotFound(string $routeName)
    {
        return new static($routeName,'Token Not Found');
    }
}
