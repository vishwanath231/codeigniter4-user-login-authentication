<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index(){
        
        echo view('dashboard');
    }
}
