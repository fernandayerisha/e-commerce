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
>>>>>>> ae6e86f2fc72ad2c103195d1e046939c8f8fed55

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
<head>
<body>
  <div class="container">

    <h3 align="center" style="font-size:30px;">Selamat Datang, Ini Halaman Blog</h3>
    {{ Session::get('message')}}
    <a href="/user/create"><h3>Create</h3></a>

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
      <tfoot>
    @foreach ($datauser as $data)
        <tr>
          <td>{{ $data->id }}</td>
          <td>{{ $data->nama }}</td>
          <td>{{ $data->email }}</td>
          <td>
            <form class="delForm{{$data->id}}" id="{{$data->id}}" action="/user/{{$data->id}}" method="post">
              <a href="user/{{$data->id}}"><input type="button" value="Detail"></a>
              <a href="user/{{$data->id}}/edit"><input type="button" value="Edit"></a>

              <input type="hidden" name="id_delete{{$data->id}}"value="{{$data->id}}">
              <input type="hidden" name="_method" value="delete">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="button" value="Delete" onClick="delData()">
            </form>
          </td>
        </tr>

        <script type="text/javascript">
         $.ajaxSetup({
          headers: {
           'X-CSRF-TOKEN': $('input[name="_token"]').val()
          }
         });
        </script>
        <script>

        function delData(){
          var r = confirm("Apa anda yakin akan menghapus data?");
          if (r == true) {
                var data = $('input[name="id_delete{{$data->id}}"]').val();
                $.ajax({
                  url : "{{url('user/do_delete')}}",
                  method : 'POST',
                  data : data,
                  success : function(response) {
                    if (response.status == 'error') {
                      alert('Delete Error');
                    } else {
                      alert('Delete Success!!');
                      // document.getElementById('{{$data->id}}').submit();
                    }
                  }
                });
          } else {
            alert('Delete Canceled!');
          }
        };
        </script>

    @endforeach
      </tfoot>
    </table>
    <hr>
    {{ $datauser->links() }}

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
</html>
