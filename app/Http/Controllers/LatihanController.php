<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LatihanController extends Controller
{
    public function index(){
      return view('latihanhome');
    }

    public function about(){
      return view('latihanabout');
    }
    
    public function portofolio(){
      return view('portofolio');
    }
}
