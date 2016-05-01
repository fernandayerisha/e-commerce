<h2><center>Detail Product</center></h2>

<button><a href="/product">Back</a></button>

<p>Nama Product : {{ $product->nama_product }}</p>

<p>harga  : {{ $product->harga }}</p>

@foreach ($kategori as $data)
  @if($data->id_category == $product->id_category)
   <p>ID Kategori : {{ $data->nama_kategori }}</p>
 @endif
@endforeach

@foreach ($seller as $toko)
  @if($toko->id_seller == $product->id_seller)
    <p>ID Toko : {{ $toko->nama }}</p>
  @endif
@endforeach
