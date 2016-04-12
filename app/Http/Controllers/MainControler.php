<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MainControler extends Controller
{
    public function index(){
      return view('welcome');
    }

    public function single($id){
      $blogs = Blog::all();
      return view('blog.index', ['blogs' => $blogs]);
    }

    public function portofolio(){
      $datas=['html','css','php'];
      return view('portofolio')->with('data',$datas);
    }
}
