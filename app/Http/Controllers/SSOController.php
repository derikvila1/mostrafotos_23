<?php

namespace App\Http\Controllers;

class SSOController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view("dashboard.index");
    }
}
