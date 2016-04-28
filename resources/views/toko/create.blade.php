<!DOCTYPE html>
<html>
    <head>
        @extends('master')
        @section('content')
        <meta charset="utf-8">
        <title>Buka Toko</title>
        <link rel="stylesheet" href="{{ url('assets/css/style_toko.css') }}">
    </head>
    <body>
        <div class="content">
            <h1>Buka Toko Baru</h1>
            <p>Isi Informasi Toko</p>
            <!-- FORM -->
            <form class="createtoko" action="/toko" method="post">
                <input type="text" name="nama_toko" value="" placeholder="NAMA TOKO">
                <input type="text" name="slogan" value="" placeholder="SLOGAN">
                <textarea name="deskripsi" rows="4" cols="40" placeholder="DESKRIPSI TOKO"></textarea>
                <input type="text" name="alamat" value="" placeholder="ALAMAT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
                <!-- ALERT ERROR -->
                <div class="alert alert-danger"></div>
                <div class="alert alert-success"></div>
                <!-- /ALERT ERROR -->
                <input type="submit" name="submit" value="SIMPAN">
            </form>
            <!-- /FORM -->
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
                                    html_error += ' ' + this + '<br>' ;
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
    @stop
</html>
