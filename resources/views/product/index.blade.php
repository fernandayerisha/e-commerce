<!DOCTYPE html>
<html img="an">
<head>
  <title>Daftar Product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.min.css') }}">
  <script src="{{ url('assets/js/jquery/jquery-2.1.3.js') }}"></script>
  <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
</head>

<body>
  <div class="container">
    <h1><center>Daftar Product</center></h1>

    <h2><b>{{ Session::get('pesan')}}</b></h2>
    <br>
    Tambahkan Product?
    <button><a href="/product/create">KLIK</a></button>
      <div class="row">
  		 <table class="table">
         <thead>
           <tr>
             <td><b>Nama Product</b></td>
             <td><b>Harga</b></td>
             <td><b>Action</b></td>
           </tr>
         </thead>
            <?php foreach ($products as $product): ?>
              <tbody>
          		  <tr>
          		   <td>{{ $product->nama_product }}</td>
                 <td>{{ $product->harga}}</td>
                 <td>
                    <button><a href="/product/{{$product->id}}/edit">Edit</a></button>
                    <button><a href="/product/{{$product->id}}">Detail</a></button>
                    <form class="" action="/product/{{$product->id}}" method="post">
                      <input type="hidden" name="_method" value="delete">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="submit" name="delete" value="Delete">
                    </form>
                  </td>
              </tr>
             </tbody>
            <?php endforeach; ?>
      </table>
    </div>
  </div>
</body>
</html>
