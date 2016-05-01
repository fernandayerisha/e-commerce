<!DOCTYPE html>
<html>
    <head>
        @extends('master')
        @section('content')
        <meta charset="utf-8">
        <title>Daftar Toko</title>
        <link rel="stylesheet" href="{{ url('assets/css/style_indextoko.css') }}">
    </head>
    <body>
        <div class="overlay"><span>Mohon Tunggu Sebentar...</span></div>
        <div class="container">
            <h1><center>List Toko Terdaftar</center></h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAMA TOKO</th>
                        <th>SLOGAN</th>
                        <th>DESKRIPSI</th>
                        <th>ASAL PENGIRIMAN</th>
                        <th>PILIHAN</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($toko as $toko)
                        <tr>
                            <td>{{ $toko->id }}</td>
                            <td>{{ $toko->nama_toko }}</td>
                            <td>{{ $toko->slogan }}</td>
                            <td>{{ $toko->deskripsi }}</td>
                            <td>{{ $toko->alamat }}</td>
                            <td>
                                <form class="" id="{{$toko->id}}" action="/toko/{{$toko->id}}" method="post">
                                    <a href="/toko/{{$toko->id}}/edit"><input type="button" value="UBAH"></a>
                                    <input type="hidden" name="id" value="{{$toko->id}}">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="button" value="HAPUS" onClick="deleteToko({{$toko->id}})">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });
    </script>
    <script>
        function deleteToko(id){
          var r = confirm("Apa anda yakin akan menghapus toko?");
          if (r == true){
            $('.overlay').fadeIn(500, function(){
              $.ajax({
                url     : "{{ url('toko/validasi_delete') }}",
                method  : 'POST',
                data    : {
                  'id' : id,
                },
                success : function(response){
                  if (response.status == 'error'){
                    alert('Delete Error');
                  }else{
                    alert('Delete Success!!');
                  }
                }
              });
            });
            $('.overlay').fadeOut(1000);
          }
          else {
            alert('Delete Canceled!');
          }
        }
    </script>
    @stop
</html>
