<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit Toko</title>
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
      <!-- /VALIDASI -->
        <b>Isi Informasi Toko</b>
      <!-- FORM -->
        <form class="edittoko" action="{{ url('toko/validasi_edit') }}/{{$toko->id}}" method="post">
            <input type="text" name="nama_toko" value="{{$toko->nama_toko}}" placeholder="Nama Toko">
            <br>
            <input type="text" name="slogan" value="{{$toko->slogan}}" placeholder="Slogan Toko">
            <br>
            <textarea name="deskripsi" rows="8" cols="40" placeholder="Deskripsi Toko">{{$toko->deskripsi}}</textarea>
            <br>
            <textarea name="alamat" rows="8" cols="40" placeholder="Alamat Asal Pengiriman">{{$toko->alamat}}</textarea>
            <br>

            <!-- <input type="hidden" name="_method" value="put"> -->            
            <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
            <input type="submit" name="submit" value="UBAH">
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
            $('.edittoko').submit(function(event){
                event.preventDefault();
                var data = $('.edittoko').serializeArray();
                $.ajax({
                    url : "{{url('toko/validasi_edit')}}",
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
