<!DOCTYPE HTML>
<html>
<head>
  @extends('master')
  @section('content')
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
</head>
<body>
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
      </tbody>
    </table>
    <div class="container" align="center">
      <a href="{{$data->id}}/edit"><input type="button" value="Edit"></a>
    </div>
  </div>
</body>
@stop
</html>
