<!DOCTYPE html>
<html>
<head>
  @extends('master')
  @section('content')
  <title>Create New User</title>
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
  <style>
    .overlay{
      width: 100%;
      height: 100%;
      position: fixed;
      top: 0px;
      left: 0px;
      background-color: rgba(255, 255, 255, 0.8);
      color: #000;
      text-align: center;
      font-size: 25px;
      display: none;
    }
    .overlay span{
      position: absolute;
      top: 50%;
      width: 100%;
      text-align: center;
      left: 0px;
    }
  </style>
</head>
<body>
  <div class="overlay"><span>Data Telah di Tambahkan...</span></div>
  <div class="container-fluid">
    <h3 class="formcolor" align="center" style="font-size:30px;">Ini Page Create User</h3>
  </div>
  <div class="container-fluid">
    <form class="formadd"  action="{{url('admin/user')}}" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <table>
        <tbody>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><input type="text" name="nama" value="" placeholder="Nama"></td>
        </tr>
        <tr>
          <td>E-mail </td>
          <td>:</td>
          <td><input type="text" name="email" value="" placeholder="E-mail"></td>
        </tr>
        <tr>
          <td>Password </td>
          <td>:</td>
          <td><input type="password" name="password" value="" placeholder="Password..."></td>
        </tr>
        </tbody>
      </table>
      <br>
      <input type="submit" value="Submit">
      <a href="{{url('admin/user')}}"><input type="button" value="Back"></a>
    </form>
    <p class="alert-ajax"></p>
  </div>
</body>

<script type="text/javascript">
 $.ajaxSetup({
  headers: {
   'X-CSRF-TOKEN': $('input[name="_token"]').val()
  }
 });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.formadd').submit(function(event){
      event.preventDefault();
      var data = $('.formadd').serializeArray();
      $.ajax({
        url : "{{url('admin/user/do_create')}}",
        method : 'POST',
        data : data,
        success : function(response) {
          if (response.status == 'error') {
            var html_error = '';
            html_error += '<ul>';
            $.each(response.message, function (error_key, error_message){
              html_error += error_key;
              $.each(error_message, function (message){
                html_error += '<li>'+ this +'</li>';
              });
            });
            html_error += '</ul>';
            $('.alert-ajax').html(html_error);
            $('.alert-ajax').show();
          }else{
            alert('Data berhasil di Tambahkan');
          }
        }
      });
    });

  });
</script>
@stop
</html>
