<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;

class MainController extends Controller
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

    // this is login method
    public function LoginUser(){
      return view('loginUser');
    }


    // this is logout method
    public function LogoutUser(){

    }
}
