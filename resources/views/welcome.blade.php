@extends('master')
@section('head')
  <style>
    body{
      width: 100%;
      height: 100%;
    }
    /*#panel1{
      background-color: #2ecc71;
      color: white;
      height: auto;
      padding: 50px;
    }
    #panel2{
      background-color: #3498db;
      color: white;
      height: auto;
      padding: 50px;
    }
    #panel3{
      background-color: #34495e;
      color: white;
      height: auto;
      padding: 50px;
    }*/
    #headpanel{
      background-color: #bdc3c7;
      color: #2c3e50;
      height: auto;
      padding: 30px;
      text-align: center;
      height: 500px;
    }
  </style>
@stop
@section('content')
  <div class="container-fluid">
    <div class="row" id='headpanel'>
      <p style="font-size: 50px;">WELCOME TO TOKOKU.COM</p>
      <h2>
        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. View details »
      </h2>
      <a href='{{url('about')}}'><input type='button' class='btn-info btn-lg' value='More...'></a>
    </div>
  </div>
@stop
