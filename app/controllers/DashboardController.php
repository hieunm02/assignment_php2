<?php

namespace App\Controllers;

class DashboardController
{
    public function index()
    {
        return view('nav.nav-admin', []);
    }
}
