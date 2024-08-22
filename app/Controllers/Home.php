<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('/auth/login');
    }

    public function Register()
    {
        return view('/auth/register');
    }
}
