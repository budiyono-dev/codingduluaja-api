<?php

namespace App\Domain\Raport\Controllers;

class SiswaController extends BaseController
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function indexWeb()
    {
        return view('domain.raport.main-backup');
    }
}
