<!DOCTYPE HTML>
<html>
<head>
  @extends('master')
  @section('content')
  <title>Edit User</title>
  <style>
    .formcolor{
      font-size:30px;
      background-color:#4CAF50;
      color:white;
      padding:10px;
    }
    .formadd{
      background-color:#f5f5f5;
      padding: 20px;
    }

  </style>
</head>
<body>
  <div class="container">
    <h3 align="center" class="formcolor">Edit User Form</h3>
    <form class="formadd"  action="/user/{{$data->id}}" method="post">
      <table>
        <tbody>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><input type="text" name="nama" value="{{$data->nama}}" placeholder="Nama"></td>
          {{ ($errors->has('nama')) ? $errors->first('nama') : '' }}
        </tr>
        <tr>
          <td>E-mail </td>
          <td>:</td>
          <td><input type="text" name="email" value="{{$data->email}}" placeholder="E-mail"></td>
          {{ ($errors->has('email')) ? $errors->first('email') : '' }}
        </tr>
        <tr>
          <td>Password </td>
          <td>:</td>
          <td><input type="password" name="password" value="{{$data->password}}" placeholder="Password..."></td>
          {{ ($errors->has('password')) ? $errors->first('password') : '' }}
        </tr>
        <tr>
          <input type="hidden" name="_method"value="put">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </tr>
        </tbody>
      </table>
      <br>
      <input type="submit" value="Save">
      <a href="{{url('user')}}"><input type="button" value="Back"></a>
    </form>
  </div>
</body>
@stop
</html>
