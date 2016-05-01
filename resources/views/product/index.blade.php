<!DOCTYPE html>
<html img="an">
<head>
  <title>Daftar Product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.min.css') }}">
  <script src="{{ url('assets/js/jquery/jquery-2.1.3.js') }}"></script>
  <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ url('assets/js/jquery/jquery-2.2.0.min.js') }}"></script>
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
             <td><b>Kategori</b></td>
             <td><b>Nama Toko</b></td>
             <td><b>Harga</b></td>
             <td><b>Action</b></td>
           </tr>
         </thead>
            <?php foreach ($products as $product): ?>
              <tbody class="table_content">
          		  <tr>
          		   <td>{{ $product->nama_product }}</td>
                 @foreach ($kategori as $data)
                   @if($data->id_category == $product->id_category)
       							<td>{{ $data->nama_kategori }}</td>
       						@endif
                 @endforeach
                 @foreach ($seller as $toko)
                   @if($toko->id_seller == $product->id_seller)
                     <td>{{ $toko->nama }}</td>
                   @endif
                 @endforeach
                 <td>{{ $product->harga}}</td>
                 <td>
                    <button><a href="/product/{{$product->id}}/edit">Edit</a></button>
                    <button><a href="/product/{{$product->id}}">Detail</a></button>
                    <form class="formDelete" action="/product/{{$product->id}}" method="post">
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

<script type="text/javascript">
 $.ajaxSetup({
  headers: {
   'X-CSRF-TOKEN': $('input[name="_token"]').val()
  }
 });
</script>
<!-- Deletenya kalo di cancel kok tetep KEHAPUS?? -->
<script>
$(document).ready(function(){
    $('.formDelete').submit(function(e){
      // e.preventDefault();
      var peringatan = confirm('Apakah anda yakin akan menghapus product ini?');
      if (peringatan == true) {
      $.ajax({
        url : $('.formDelete').attr('action'),
        method : 'POST',
        data : data,
        success : function(response) {
          if (response.status == 'error') {
            alert('Delete Error');
          } else {
            alert('Delete Success!!');
          }
          }
        });
      }
        else {
          alert('Delete Canceled!');
        }
      });
    });
</script>

</html>
