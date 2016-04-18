<html>
<script src="{{ url('assets/js/jquery/jquery-2.2.0.min.js') }}"></script>
<body>
<h3 align="center" style="font-size:30px;">Ini Page Edit User</h3>

<form class="formadd"  action="/user/{{$data->id}}" method="post">

    Nama : <input type="text" name="nama" value="{{$data->nama}}" placeholder="Nama"></br>
    {{ ($errors->has('nama')) ? $errors->first('nama') : '' }}<br>
    E-mail : <input type="text" name="email" value="{{$data->email}}" placeholder="E-mail"></br>
    {{ ($errors->has('email')) ? $errors->first('email') : '' }}<br>
    Password : <input type="password" name="password" value="{{$data->password}}" placeholder="Password..."></br>
    {{ ($errors->has('password')) ? $errors->first('password') : '' }}<br>

    <input type="hidden" name="_method"value="put">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" value="Save">
  </form>

</body>
</html>
