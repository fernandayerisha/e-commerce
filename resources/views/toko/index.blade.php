<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Daftar Toko</title>
        {{ Session::get('notifikasi') }} <!-- hasil pesan notifikasi -->
        <script src="{{ url('assets/js/jquery/jquery-2.2.0.min.js') }}"></script>

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
        <div class="overlay"><span>Mohon Tunggu Sebentar...</span></div>
        <h1>List Toko Terdaftar</h1>
        @foreach($toko as $toko)
            <a href="/toko/{{$toko->nama_toko}}">
                <p> ID        : {{ $toko->id }} </p>
            </a>
                <p> Nama Toko       : {{ $toko->nama_toko }} </p>
                <p> Slogan          : {{ $toko->slogan }} </p>
                <p> Deskripsi       : {{ $toko->deskripsi }} </p>
                <p> Asal Pengiriman : {{ $toko->alamat }} </p>

                {{ date('d F Y' , strtotime($toko->created_at)) }} <br> <br>

                <form class="" id="{{$toko->id}}" action="/toko/{{$toko->id}}" method="post">
                    <a href="/toko/{{$toko->id}}/edit"><input type="button" value="UBAH"></a>
                    <input type="hidden" name="id" value="{{$toko->id}}">
                    <input type="hidden" name="_method" value="delete">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="button" value="HAPUS" onClick="deleteToko({{$toko->id}})">
                </form>
                <hr>
        @endforeach
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
</html>
