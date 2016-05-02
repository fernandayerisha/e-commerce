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
                <tbody class="data_toko">
                    @foreach($toko as $toko)
                        <tr>
                            <td>{{ $toko->id }}</td>
                            <td>{{ $toko->nama_toko }}</td>
                            <td>{{ $toko->slogan }}</td>
                            <td>{{ $toko->deskripsi }}</td>
                            <td>{{ $toko->alamat }}</td>
                            <td>
                                <form class="" id="{{$toko->id}}" action="/toko/{{$toko->id}}" method="post">
                                    <a href="toko/{{$toko->id}}/edit"><input type="button" value="UBAH"></a>
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
    <!-- AJAX -->
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });
    </script>
    <!-- /AJAX -->
    <script>
        // FUNGSI DELETE
        function deleteToko(id){
          var r = confirm("Apa anda yakin akan menghapus toko?");
          if (r == true){
            $('.overlay').fadeIn(500, function(){
              $.ajax({
                url     : "{{ url('admin/toko/validasi_delete') }}",
                method  : 'POST',
                data    : {
                  'id' : id,
                },
                success : function(response){
                  if (response.status == 'error'){
                    alert('Delete Error');
                  }else{
                    alert('Delete Success!!');
                    reload_data_toko();
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
        // /FUNGSI DELETE
        // FUNGSI RELOAD DATA
        function reload_data_toko() {
            var page = $('input[name="active_page"]').val();
            var url = "{{url('admin/toko')}}" + "?page=" + page;
            $.ajax({
                url     : url,
                method  : 'GET',
                success : function(response) {
                    console.log(response);
                    $('.data_toko').html('');
                    var data_toko_html = '';
                    $.each(response.data, function(key, value) {
                        data_toko_html += '<tr>';
                            data_toko_html += '<td>'+this.id+'</td>';
                            data_toko_html += '<td>'+this.nama_toko+'</td>';
                            data_toko_html += '<td>'+this.slogan+'</td>';
                            data_toko_html += '<td>'+this.deskripsi+'</td>';
                            data_toko_html += '<td>'+this.alamat+'</td>';
                            data_toko_html += '<td>';
                                data_toko_html += '<form class="deleteToko'+this.id+'" id="'+this.id+'" action="/toko/'+this.id+'" method="post">';
                                    data_toko_html += '<a href="toko/'+this.id+'/edit"><input type="button" value="UBAH"></a>';
                                    data_toko_html += '<a href="toko/'+this.id+'"><input type="button" value="LIHAT"></a>';
                                    data_toko_html += '<input type="hidden" name="id" value="'+this.id+'">';
                                    data_toko_html += '<input type="hidden" name="_method" value="delete">';
                                    data_toko_html += '<input type="hidden" name="_token" value="{{ csrf_token() }}">';
                                    data_toko_html += '<a href="#"><input class="btn-danger btn-sm" type="button" value="HAPUS" onClick="deleteToko('+this.id+')"></a>';
                                data_toko_html += '</form>';
                            data_toko_html += '</td>';
                        data_toko_html += '</tr>';
                    });
                    $('.data_toko').html(data_toko_html);
                    $('.overlay').fadeOut(100);
                }
            });
        }
        // /FUNGSI RELOAD DATA
    </script>
    @stop
</html>
