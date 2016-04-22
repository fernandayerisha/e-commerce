<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Buka Toko</title>
    </head>
    <body>
        <h1>Buka Toko Baru</h1>
      <!-- VALIDASI -->
        @if (count($errors) > 0)
            <!-- <div class="alert alert-danger"> -->
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            <!-- </div> -->
        @endif
      <!-- /VALIDASI -->
        <b>Isi Informasi Toko</b>
      <!-- FORM -->
        <form class="formcreate" action="/toko" method="post">
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
</html>
