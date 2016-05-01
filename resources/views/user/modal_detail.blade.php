<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detail User</h4>
      </div>
      <div class="modal-body">
        <!-- Start -->
          <table align="center">
            <thead>
              <th colspan="3"><h3 align="center" style="font-size:30px;">Detail User</h3></th>
            </thead>
            <tbody>
              <tr>
                <td>ID</td>
                <td><b>:</b></td>
                <td>{{$data->id}}</td>
              </tr>
              <tr>
                <td>Nama</td>
                <td><b>:</b></td>
                <td><span> {{ $data->nama }}</span></td>
              </tr>
              <tr>
                <td>E-mail</td>
                <td><b>:</b></td>
                <td><span> {{ $data->email }}</span></td>
              </tr>
              <tr>
                <td>Action</td>
                <td><b>:</b></td>
                <td>
                  <a onClick="modalEditTriger({{$data->id}})" data-dismiss="modal">
                    <input type="button" class="btn-success btn-sm" value="Edit">
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        <!-- End -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
