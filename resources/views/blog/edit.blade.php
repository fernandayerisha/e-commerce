<h3 align="center" style="font-size:30px;">Ini Page Edit User</h3>

<form class=""  action="/laravel/public/blog/{{$blog->id}}" method="post">

    Nama : <input type="text" name="nama" value="{{$blog->nama}}" placeholder="Nama"></br>
    {{ ($errors->has('nama')) ? $errors->first('nama') : '' }}<br>
    E-mail : <input type="text" name="email" value="{{$blog->email}}" placeholder="E-mail"></br>
    {{ ($errors->has('email')) ? $errors->first('email') : '' }}<br>
    Password : <input type="password" name="password" value="{{$blog->password}}" placeholder="Password..."></br>
    {{ ($errors->has('password')) ? $errors->first('password') : '' }}<br>

    <input type="hidden" name="_method"value="put">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" value="Save">
  </form>
