<!DOCTYPE html>
<head>
<title>Tambah Barang</title>
<script src="{{ url('assets/js/jquery/jquery-2.2.0.min.js') }}"></script>
<style>
#model
{
margin: 60px;
padding: 20px;
}
table {width:100%;}
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
<div class="overlay"><span>Product berhasil ditambahkan</span></div>
<center><h1><u>FORMOLIR PENAMBAHAN BARANG</u></h1></center>
<div id="model">
<!-- @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
<div class="alert alert-danger" style="display:none; background-color:red; color:white;"></div>
<div class="alert alert-success" style="display:none; background-color:green; color:white;"></div>
<form class="formproduct" action="/product" method="post">
	<table>
	<tr>
		<td>Nama Barang</td>
		<td>:</td>
		<td><input type="text" name="nama" size="25"></td>
	</tr>

	<tr>
  	<td>Harga</td>
		<td>:</td>
		<td><input type="text" name="harga" ></td>
	</tr>

  <tr>
    <td>Kategori</td>
    <td>:</td>
    <td>
        <select name="Kategori">
					<option value="">Pilih Kategori</option>
          @foreach ($cat as $data)
		      <option value="{{$data->id_category}}">{{$data->nama_kategori}}</option>
          @endforeach
        </select><br>
    </td>
  </tr>

  <tr>
    <td>Nama Toko</td>
    <td>:</td>
    <td>
        <select name="Toko">
					<option value="">Pilih Nama Toko</option>
          @foreach ($toko as $data)
		      <option value="{{$data->id}}">{{$data->nama_toko}}</option>
          @endforeach
        </select><br>
    </td>
  </tr>
	</table>
<br>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="submit" value="Tambahkan">
<br>

</form>
</div>
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

    $('.formproduct').submit(function(event){
      event.preventDefault();
      var data = $('.formproduct').serializeArray();
      $('.overlay').fadeIn(100, function(){
        $.ajax({
        url : "{{url('product/validasi_create')}}",
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
          } else {
            $('.overlay').fadeOut(100);
            window.location.replace('/product');
          }
        }
      });
    });
  });

  });
</script>
<button><a href="/product">Back</a></button>
</html>
