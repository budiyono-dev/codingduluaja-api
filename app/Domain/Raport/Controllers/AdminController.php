<?php

namespace App\Domain\Raport\Controllers;

class AdminController extends BaseController
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        return view('domain.raport.admin.dashboard-admin');
    }
}
