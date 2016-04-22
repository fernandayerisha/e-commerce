<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MainControler extends Controller
{
    public function index(){
      return view('welcome');
    }

    public function about(){
      return view('about');
    }

    public function portofolio(){
      return view('portofolio');
    }
}
