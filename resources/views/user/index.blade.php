<<<<<<< HEAD
<h3 align="center" style="font-size:30px;">Selamat Datang, Ini Halaman Blog</h3>
{{ Session::get('message')}}

<a href="/user/create"><h3>Create</h3></a>
<hr>
@foreach ($datauser as $data)
  <a href="user/{{$data->id}}">
    <h3> {{ $data->id }} </h3>
  </a>
  <h3> Nama    : {{ $data->nama }} </h3>
  <h3> E-mail  : {{ $data->email }} </h3>
  <a href="user/{{$data->id}}/edit"><input type="button" value="Edit"></a>
=======
<html>
<head>
  <script src="{{ url('assets/js/jquery/jquery-2.2.0.min.js') }}"></script>
  <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
  <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
  <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
>>>>>>> ae6e86f2fc72ad2c103195d1e046939c8f8fed55

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
<head>
<body>
  <div class="container">

    <h3 align="center" style="font-size:30px;">Selamat Datang, Ini Halaman Blog</h3>
    {{ Session::get('message')}}
    <a href="/user/create"><h3>Create</h3></a>

    <hr>
    <table id="example" class="display" cellspacing="0" width="80%" style="table-border:1px">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>E-Mail</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot>
    @foreach ($datauser as $data)
        <tr>
          <td>{{ $data->id }}</td>
          <td>{{ $data->nama }}</td>
          <td>{{ $data->email }}</td>
          <td>
            <form class="" action="/user/{{$data->id}}" method="post">
              <a href="user/{{$data->id}}"><input type="button" value="Detail"></a>
              <a href="user/{{$data->id}}/edit"><input type="button" value="Edit"></a>
              <input type="hidden" name="_method"value="delete">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="submit" value="Delete" onClick="deldata()">
            </form>
          </td>
        </tr>
    @endforeach
      </tfoot>
    </table>
    <hr>
    {{ $datauser->links() }}
  </div>
</body>
</html>
