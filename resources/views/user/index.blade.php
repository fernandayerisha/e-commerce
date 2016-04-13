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

    <form class="" action="/user/{{$data->id}}" method="post">
      <input type="hidden" name="_method"value="delete">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="submit" value="Delete">
    </form>
  <hr>
@endforeach
