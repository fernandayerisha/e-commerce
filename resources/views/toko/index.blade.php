<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Daftar Toko</title>
        {{ Session::get('notifikasi') }} <!-- hasil pesan notifikasi -->
    </head>
    <body>
        <h1>List Toko Terdaftar</h1>
        @foreach($tokos as $toko)
            <a href="/toko/{{$toko->nama_toko}}">
                <p> ID        : {{ $toko->id }} </p>
            </a>
                <p> Nama Toko       : {{ $toko->nama_toko }} </p>
                <p> Slogan          : {{ $toko->slogan }} </p>
                <p> Deskripsi       : {{ $toko->deskripsi }} </p>
                <p> Asal Pengiriman : {{ $toko->alamat }} </p>

                {{ date('d F Y' , strtotime($toko->created_at)) }} <br> <br>

                <a href="/toko/{{$toko->id}}/edit">UBAH</a>

                <form class="" action="/toko/{{$toko->id}}" method="post">
                    <input type="hidden" name="_method" value="delete">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" name="hapus" value="HAPUS">
                </form>
                <hr>
        @endforeach
    </body>
</html>
