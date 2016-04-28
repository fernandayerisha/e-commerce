<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Toko;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toko = Toko::paginate(10);
        return view('toko.index', ['toko' => $toko]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('toko.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // VALIDASI
        $this->validate($request, [
            'nama_toko'   => 'required|max:30|min:5',
            'slogan'      => 'required',
            'deskripsi'   => 'required',
            'alamat'      => 'required',
        ]);
      // /VALIDASI
      // INSERT INTO DB
        $toko = new Toko;
        $toko->nama_toko  = $request->nama_toko;
        $toko->slogan     = $request->slogan;
        $toko->deskripsi  = $request->deskripsi;
        $toko->alamat     = $request->alamat;
        $toko->save();
      // /INSERT INTO DB
        return redirect('toko')->with('notifikasi', 'Toko Berhasil Ditambahkan'); //notifikasi
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nama_toko)
    {
        // $toko = Toko::find($id);
        $toko = Toko::where('nama_toko', $nama_toko)->first();
      // pesan error
        if(!$toko){
          abort(503);
        }
      // /pesan error
        return view('toko.single')->with('toko', $toko);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $toko = Toko::find($id);
      return view('toko.edit', array('toko' => $toko));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      // VALIDASI
        // $this->validate($request, [
        //     'nama_toko'   => 'required|max:30|min:5',
        //     'slogan'      => 'required',
        //     'deskripsi'   => 'required',
        //     // 'alamat'      => 'required',
        // ]);
      // /VALIDASI
      // INSERT INTO DB
        $toko = Toko::find($request->id);
            $toko->nama_toko  = $request->nama_toko;
            $toko->slogan     = $request->slogan;
            $toko->deskripsi  = $request->deskripsi;
            $toko->alamat     = $request->alamat;
        $toko->save();
      // /INSERT INTO DB
        // return redirect('toko')->with('notifikasi', 'Toko Berhasil Diubah'); //notifikasi
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $toko = Toko::find($id);
        $toko->delete();
        return redirect('toko')->with('notifikasi', 'Toko Dihapus!');
    }

    //FUNGSI VALIDASI MENGGUNAKAN AJAX
    public function validation(Request $request)
    {
        $return = array();

        $rules = array(
            'nama_toko'   => 'required|max:30|min:5',
            'slogan'      => 'required',
            'deskripsi'   => 'required',
            'alamat'      => 'required',
            '_token'      => 'required',
        );
        $messages = array(
            'required'  => 'harus diisi',
        );

        $validator  = Validator::make($request->all(), $rules, $messages);

        if (!$validator->fails()){
          $return['status'] = 'success';
        }
        else {
          $return['status'] = 'error';
          $return['message'] = $validator->messages();
        }

        return $return;
    }

    public function validasi_create(Request $request)
    {
        $validasi = $this->validation($request);
        if ($validasi['status'] == 'success')
        {
            $this->store($request);
        }
        else {
            return $validasi;
        }
    }
    public function validasi_edit(Request $request)
    {
        $validasi = $this->validation($request);
        if ($validasi['status'] == 'success')
        {
            $this->update($request);
        }
        else {
            return $validasi;
        }
    }
    public function validasi_delete(Request $request){
      $id = $request->id;
      if(empty($id)){
        $return['status'] = 'error';
      }else{
        Toko::destroy($id);
        $return['status'] = 'success';
      }
      return $return;
    }
}
