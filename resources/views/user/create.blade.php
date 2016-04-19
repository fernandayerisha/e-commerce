<!DOCTYPE html>
<html>
<script src="{{ url('assets/js/jquery/jquery-2.2.0.min.js') }}"></script>
<body>
<h3 align="center" style="font-size:30px;">Ini Page Create User</h3>

<form class="formadd"  action="/user" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
  Nama : <input type="text" name="nama" value="" placeholder="Nama"></br>
  <!-- {{ ($errors->has('nama')) ? $errors->first('nama') : '' }}<br> -->
  E-mail : <input type="text" name="email" value="" placeholder="E-mail"></br>
  <!-- {{ ($errors->has('email')) ? $errors->first('email') : '' }}<br> -->
  Password : <input type="password" name="password" value="" placeholder="Password..."></br>
  <!-- {{ ($errors->has('password')) ? $errors->first('password') : '' }}<br> -->
  <input type="submit" value="Submit">
</form>

<div class="alert alert-danger" style="display:none; background-color:red; color:white;"></div>

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
        url : "{{url('create/ajax_validate')}}",
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
            $('.alert-danger').html(html_error);
            $('.alert-danger').show();
          } else {
            $('.alert-success').html('Validasi sudah berhasil');
            $('.alert-success').show();
          }
        }
      });
    });

  });
</script>

</html>
