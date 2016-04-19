<html>
<head>
  <script src="{{ url('assets/js/jquery/jquery-2.2.0.min.js') }}"></script>
  <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
  <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
  <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }
    th{
      background-color: #4CAF50;
      color: white;
    }

    tr:nth-child(even){background-color: #f5f5f5}
  </style>
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
<head>
<body>
  <div class="overlay"><span>Mohon Tunggu Sebentar...</span></div>
  <div class="container">

    <h3 align="center" style="font-size:30px;">Selamat Datang, Ini Halaman User</h3>
    {{ Session::get('message')}}
    <a href="/user/create"><button>Create</button></a>

    <hr>
    <table id="example" class="display" cellspacing="0" width="80%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>E-Mail</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot class="table_content">
    @foreach ($datauser as $data)
        <tr>
          <td>{{ $data->id }}</td>
          <td>{{ $data->nama }}</td>
          <td>{{ $data->email }}</td>
          <td>
            <form class="delForm{{$data->id}}" id="{{$data->id}}" action="/user/{{$data->id}}" method="post">
              <a href="user/{{$data->id}}"><input type="button" value="Detail"></a>
              <a href="user/{{$data->id}}/edit"><input type="button" value="Edit"></a>

              <input type="hidden" name="id_delete" value="{{$data->id}}">
              <input type="hidden" name="_method" value="delete">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <!-- <input type="submit" value="Delete" onClick="alertDelete{{$data->id}}()"> -->
              <input type="button" value="Delete" onClick="delData({{$data->id}})">
            </form>
          </td>
        </tr>
    @endforeach
      </tfoot>
    </table>
    <hr>
    {{ $datauser->links() }}
    <input type="hidden" name="active_page" value="{{$datauser->currentPage()}}" >
    <script>
    function delData2(){
      var r = confirm("Apa anda yakin akan menghapus data?");
      if (r == true) {
            var data = $('.delForm{{$data->id}}').serializeArray();
            $.ajax({
              url : "{{url('user/do_delete')}}",
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
      } else {
        alert('Delete Canceled!');
      }
    };

    </script>
  </div>
</body>

<script type="text/javascript">
 $.ajaxSetup({
  headers: {
   'X-CSRF-TOKEN': $('input[name="_token"]').val()
  }
 });
</script>
<script>
// function alertDelete{{$data->id}}(){
//   var r = confirm("Apa anda yakin akan menghapus data?");
//   if (r == true){
//     alert('Delete Success!!');
//     document.getElementById('{{$data->id}}').submit();
//   }else{
//     alert('Delete Canceled!!');
//   }
// }

function delData(id_delete){
  var r = confirm("Apa anda yakin akan menghapus data?");
  if (r == true){
    $('.overlay').fadeIn(100, function(){
      $.ajax({
        url     : "{{url('user/do_delete')}}",
        method  : 'POST',
        data    : {
          'id_delete' : id_delete,
          'test' : 'testing'
        },
        success : function(response){
          if (response.status == 'error'){
            alert('Delete Error');
          }else{
            alert('Delete Success!!');
            get_data_table();
          }
        }
      });
    });
  } else {
    alert('Delete Canceled!');
  }
}

function get_data_table() {
  var url = "{{url('user')}}" + "?page=" + $('input[name="active_page"]').val();
  $.ajax({
    url     : url,
    method  : 'GET',
    success : function(response){
      console.log(response);
      $('.table_content').html('');
      var table_content_html = '';
      $.each(response.data, function(key, value){

        table_content_html += '<tr>';
          table_content_html += '<td>'+ this.id +'</td>';
          table_content_html += '<td>'+ this.nama +'</td>';
          table_content_html += '<td>'+ this.email +'</td>';
          table_content_html += '<td>';
            table_content_html += '<form class="delForm'+this.id+'" id="'+this.id+'" action="/user/'+this.id+'" method="post">';
              table_content_html += '<a href="user/'+this.id+'"><input type="button" value="Detail"></a>';
              table_content_html += '<a href="user/'+this.id+'/edit"><input type="button" value="Edit"></a>';

              table_content_html += '<input type="hidden" name="id_delete" value="'+this.id+'">';
              table_content_html += '<input type="hidden" name="_method" value="delete">';

              table_content_html += '<input type="button" value="Delete" onClick="delData('+this.id+')">';
            table_content_html += '</form>';
          table_content_html += '</td>';
        table_content_html += '</tr>';
      });
      $('.table_content').html(table_content_html);
      $('.overlay').fadeOut(100);
    }
  });
}
</script>
</html>
