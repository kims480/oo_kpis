<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategController extends Controller
{
    function index(){
        return view('categ.index');
    }
}
