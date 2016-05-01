@extends('master')
@section('head')
  <title>List User</title>
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
@stop

@section('content')
  <div class="overlay"><span>Mohon Tunggu Sebentar...</span></div>
  <div class="container">

    <h3 align="center" style="font-size:30px;">Selamat Datang, Ini Halaman User</h3>
    {{ Session::get('message')}}
    {{ $datauser->links() }}<br>
    <a href="/user/create"><input type="button" value="Create New User" class="btn-info btn-lg"/></a>
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
              <a onClick="modalDetailTriger({{$data->id}})"><input type="button" class="btn-info btn-sm" value="Detail"></a>
              <a onClick="modalEditTriger({{$data->id}})"><input type="button" class="btn-success btn-sm" value="Edit"></a>
              <a href="" class="modaltrig" data-id="{{$data->id}}"><input type="button" class="btn-info btn-sm" value="Detail"></a>

              <input type="hidden" name="id_delete" value="{{$data->id}}">
              <input type="hidden" name="_method" value="delete">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input class="btn-danger btn-sm" type="button" value="Delete" onClick="delData({{$data->id}})">
            </form>
          </td>
        </tr>
    @endforeach
      </tfoot>
    </table><br>
    <hr>
    {{ $datauser->links() }}
    <input type="hidden" name="active_page" value="{{$datauser->currentPage()}}">
  </div>
<div class="modalKu"></div>
<script type="text/javascript">
 $.ajaxSetup({
  headers: {
   'X-CSRF-TOKEN': $('input[name="_token"]').val()
  }
 });
</script>
<script>
// ajax untuk delete data
function delData(id_delete){
  var r = confirm("Apa anda yakin akan menghapus data?");
  if (r == true){
    $('.overlay').fadeIn(200, function(){
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
// ajax untuk refresh data di halaman
function get_data_table() {
  var page = $('input[name="active_page"]').val();
  var url = "{{url('user')}}" + "?page=" + page;
  $.ajax({
    url     : url,
    method  : 'GET',
    success : function(response){
      console.log(response);
      $('.table_content').html('');
      var table_content_html = '';
      $.each(response.data, function(key, value){

        table_content_html += '<tr>';
          table_content_html += '<td>'+this.id+'</td>';
          table_content_html += '<td>'+this.nama+'</td>';
          table_content_html += '<td>'+this.email+'</td>';
          table_content_html += '<td>';
            table_content_html += '<form class="delForm'+this.id+'" id="'+this.id+'" action="/user/'+this.id+'" method="post">';
              table_content_html += '<a onClick="modalDetailTriger('+this.id+')"><input type="button" class="btn-info btn-sm" value="Detail"></a>';
              table_content_html += '<a onClick="modalEditTriger('+this.id+')"><input type="button" class="btn-success btn-sm" value="Edit"></a>';
              table_content_html += '<a href="" class="modaltrig" data-id="'+this.id+'"><input type="button" class="btn-info btn-sm" value="Detail"></a>';

              table_content_html += '<input type="hidden" name="id_delete" value="'+this.id+'">';
              table_content_html += '<input type="hidden" name="_method" value="delete">';
              table_content_html += '<input type="hidden" name="_token" value="{{ csrf_token() }}">';
              table_content_html += '<a href="#"><input class="btn-danger btn-sm" type="button" value="Delete" onClick="delData('+this.id+')"></a>';
            table_content_html += '</form>';
          table_content_html += '</td>';
        table_content_html += '</tr>';
      });
      $('.table_content').html(table_content_html);
      $('.overlay').fadeOut(100);
    }
  });
}

// Modal Detail1
function modalDetailTriger(id){
  $.ajax({
    url     : "{{url('user/modal_detail')}}",
    method  : 'POST',
    data    : {
      'id' : id
    },
    success : function(response){
      console.log(response);
      $('.modalKu').html(response);
      $('#myModal').modal('show');
    }
  });
}

// ModalDetail2
$('.modaltrig').click(function(event){
  event.preventDefault();
  var id = $(this).attr('data-id');
  $.ajax({
    url     : "{{url('user/modal_detail')}}",
    method  : 'POST',
    data    : {
      'id' : id
    },
    success : function(response){
      console.log(response);
      $('.modalKu').html(response);
      $('#myModal').modal('show');
    }
  });
});

// Modal Edit
function modalEditTriger(id){
  $.ajax({
    url     : "{{url('user/modal_edit')}}",
    method  : 'POST',
    data    : {
      'id' : id
    },
    success : function(response){
      console.log(response);
      $('.modalKu').html(response);
      $('#myModal').modal('show');
    }
  });
}
</script>
@stop
