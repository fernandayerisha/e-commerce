<h3 align="center" style="font-size:30px;">Ini Page Create User</h3>

<<<<<<< HEAD:resources/views/blog/create.blade.php
<form class=""  action="/blog" method="post">
=======
<form class=""  action="/user" method="post">
>>>>>>> e0ade6f375c5cd3ddc81b9deadf60894d75aa49f:resources/views/user/create.blade.php

  Nama : <input type="text" name="nama" value="" placeholder="Nama"></br>
  {{ ($errors->has('nama')) ? $errors->first('nama') : '' }}<br>
  E-mail : <input type="text" name="email" value="" placeholder="E-mail"></br>
  {{ ($errors->has('email')) ? $errors->first('email') : '' }}<br>
  Password : <input type="password" name="password" value="" placeholder="Password..."></br>
  {{ ($errors->has('password')) ? $errors->first('password') : '' }}<br>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="submit" value="Submit">
</form>
