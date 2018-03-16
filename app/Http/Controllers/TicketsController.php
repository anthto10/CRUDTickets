<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function index(){
        return view('tickets/register');
    }

    public function list(){
        return view('tickets/register');
    }
}
