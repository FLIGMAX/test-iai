<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\User;
class MainController extends Controller
{
    public function index()
    {
        return view('main');
    }

    
}
