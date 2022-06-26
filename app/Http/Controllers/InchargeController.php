<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InchargeController extends Controller
{
    public function index()
    {
        return view('incharge.index');
    }
}
