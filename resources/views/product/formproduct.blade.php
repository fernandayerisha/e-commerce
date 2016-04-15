<!DOCTYPE html>
<head>
<title>Tambah Barang</title>
<!-- <script src="{{ url('assets/js/jquery/jquery-2.2.0.min.js') }}"></script> -->
<style>
#model
{
margin: 60px;
padding: 20px;
}
table {width:100%;}
</style>
</head>
<body>
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
<div class="alert alert-success" style="display:none;"></div>
<form class="formproduct" action="/product" method="post">
	<table>
	<tr>
		<td>Nama Barang</td>
		<td>:</td>
		<td><input type="text" name="nama" size="25"></td>
    <td>{{ ($errors->has('nama')) ? $errors->first('nama') : '' }}</td>
    <br>
	</tr>
	
	<tr>
  	<td>Harga</td>
		<td>:</td>
		<td><input type="text" name="harga" ></td>
    <td>{{ ($errors->has('harga')) ? $errors->first('harga') : '' }}</td>
	</tr>

  <tr>
    <td>Kategori</td>
    <td>:</td>
    <td>
        <select name="sKategori">
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
        <select name="sToko">
          @foreach ($seller as $data)
		      <option value="{{$data->id_seller}}">{{$data->nama}}</option>
          @endforeach
        </select><br>
    </td>
  </tr>
  <!-- <tr>
		<td>Keterangan</td>
		<td>:</td>
		<td><textarea name="ket" rows="10" cols="50" placeholder="Isi keterangan produk disini"></textarea>
    </td>
	</tr> -->
	<table>
<br>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="submit" value="Tambahkan">
</form>
</div>
</body>
<!-- <script type="text/javascript">
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
      $.ajax({
        url : "{{url('formproduct/ajax_validate')}}",
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
            $('.alert-success').html('Validasi sudah berhasil');
            $('.alert-success').show();
          }
        }
      });
    });

  });
</script> -->
</html>
