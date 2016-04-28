<!DOCTYPE HTML>
<html>
<head>
  @extends('master')
  @section('content')
  <title>Login Auth</title>
  <style>
    .title{
      background-color: #bdc3c7;
      padding: 10px;
      font-size: 50px;
    }
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
    table {
        border-collapse: collapse;
        width: 500px;
    }
    th, td {
        text-align: left;
        padding: 8px;
    }
    th{
      background-color: #4CAF50;
      color: white;
    }
  </style>
</head>
<body>
  <div class="container-fluid" align="center">
    <form class='formadd' action='#' method='post'>
      <!-- Start -->
        <table align="center">
          <thead  class='formcolor'>
            <th colspan="3"><h3 align="center" style="font-size:30px;">Detail User</h3></th>
          </thead>
          <tbody>
            <tr>
              <td>ID</td>
              <td><b>:</b></td>
              <td><input type='text'></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td><b>:</b></td>
              <td><span><input type='text'></span></td>
            </tr>
            <tr>
              <td>E-mail</td>
              <td><b>:</b></td>
              <td><span> <input type='text'></span></td>
            </tr>
          </tbody>
        </table>
      <!-- End -->
    </form>
  </div>
</body>
@stop
</html>
