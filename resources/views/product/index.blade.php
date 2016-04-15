<h1><center>Daftar Product</center></h1>

<h2><b>{{ Session::get('pesan')}}</b></h2>
<br>
Tambahkan Product?
<button><a href="/product/create">KLIK</a></button>
<?php foreach ($products as $product): ?>
  <p> {{ $product->id_product }}</p>
  <p> Nama Product : {{ $product->nama_product }} </p>
  <p> Harga        : {{ $product->harga}}  </p>


  <button><a href="/product/{{$product->id}}/edit">Edit</a></button>
  <button><a href="/product/{{$product->id}}">Detail</a></button>

  <form class="" action="/product/{{$product->id}}" method="post">
    <input type="hidden" name="_method" value="delete">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" name="delete" value="Delete">
  </form>
  <!-- <p> {{ $product->id_category}} </p>
  <p> {{ $product->id_seller}} </p> -->
  <hr>
<?php endforeach; ?>
