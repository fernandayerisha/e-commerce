@extends('master')
@section('head')
  <title>List User</title>
  <style>
    table {
      border-collapse: collapse;
      width: 80%;
    }

    th, td {
      text-align: left;
      padding: 8px;
    }
    th{
      background-color: #4CAF50;
      color: white;
    }

    tr:nth-child(even){background-color: #f5f5f5}
  </style>
@stop
@section('content')
  <div class="container">
    <table align="center">
      <thead>
        <th colspan="3"><h3 align="center" style="font-size:30px;">Detail User</h3></th>
      </thead>
      <tbody>
        <tr>
          <td>ID</td>
          <td><b>:</b></td>
          <td>{{$data->id}}</td>
        </tr>
        <tr>
          <td>Nama</td>
          <td><b>:</b></td>
          <td><span> {{ $data->nama }}</span></td>
        </tr>
        <tr>
          <td>E-mail</td>
          <td><b>:</b></td>
          <td><span> {{ $data->email }}</span></td>
        </tr>
        <tr>
          <td>Action</td>
          <td><b>:</b></td>
          <td>
            <a href="{{$data->id}}/edit" class="btn-default btn-sm" >Edit</a>
            <a href="{{url('user')}}" class="btn-primary btn-sm" >Back to List</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div><br>
@stop
