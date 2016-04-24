<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Buka Toko</title>
        <script src="{{ url('assets/js/jquery/jquery-2.2.0.min.js') }}"></script>
    </head>
    <body>
        <h1>Buka Toko Baru</h1>
      <!-- VALIDASI -->
        <!-- @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->
        <div class="alert alert-danger" style="display:none; color:red;"></div>
        <div class="alert alert-success" style="display:none;"></div>
      <!-- /VALIDASI -->
        <b>Isi Informasi Toko</b>
      <!-- FORM -->
        <form class="createtoko" action="/toko" method="post">
            <input type="text" name="nama_toko" value="" placeholder="Nama Toko">
            <br>
            <input type="text" name="slogan" value="" placeholder="Slogan Toko">
            <br>
            <textarea name="deskripsi" rows="8" cols="40" placeholder="Deskripsi Toko"></textarea>
            <br>
            <textarea name="alamat" rows="8" cols="40" placeholder="Alamat Asal Pengiriman"></textarea>
            <br>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
            <input type="submit" name="submit" value="SIMPAN">
        </form>
      <!-- /FORM -->
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
            $('.createtoko').submit(function(event){
                event.preventDefault();
                var data = $('.createtoko').serializeArray();
                $.ajax({
                    url : "{{url('toko/validasi_create')}}",
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
                        } 
                        else {
                            $('.alert-success').html('Product sudah berhasil ditambahkan');
                            $('.alert-success').show();
                        }
                    }
                });
            });
        });
    </script>
</html>
