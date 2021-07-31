<?php

namespace App\Http\Controllers;


class AdminController extends Controller
{
    //
    public function index() {
        
        return view('back.index');
    }
    public function clender() {
        
        return view('back.pages.clender');
    }
    
}
