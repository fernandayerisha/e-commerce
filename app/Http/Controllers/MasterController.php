<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Validator;
use DB;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $userku = User::paginate(3);
      // $userku = DB::table('users')->paginate(1);
      return view('user.index', ['datauser' => $userku]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'nama'     => 'required',
          'email'    => 'required|email',
          'password' => 'required',
        ]);

        $userku = new User;
        $userku->nama     = $request->nama;
        $userku->email    = $request->email;
        $userku->password = $request->password;

        $userku->save();
        return redirect('user')->with('message', 'Data Telah di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userku = User::find($id);

        if(!$userku){
          abort(404);
        }

        return view('user.single')->with('data', $userku);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userku = User::find($id);

        if(!$userku){
          abort(404);
        }

        return view('user.edit')->with('data', $userku);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'nama'     => 'required',
        'email'    => 'required|email',
        'password' => 'required',
      ]);

      $userku = User::find($id);
      $userku->nama     = $request->nama;
      $userku->email    = $request->email;
      $userku->password = $request->password;

      $userku->save();
      return redirect('user')->with('message', 'Data Telah di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userku = User::find($id);
        $userku->delete();
        return redirect('user')->with('message', 'Data Telah di Hapus');
    }

    public function ajax_validate(Request $request)
    {
      return $this->validation($request);
    }

    public function validation(Request $request)
    {
      $return = array();

      $rules = array(
          'nama'        => 'required',
          'email'       => 'required|email',
          'password'    => 'required',
          '_token'      => 'required',
      );
        $messages = array(
            'required'  => 'Kolom ini harus diisi.',
            'email'     => 'Kolom ini harus berisi email yang valid',
        );

        $validator  = Validator::make($request->all(), $rules, $messages);

        if (!$validator->fails()){
          $return['status'] = 'success';
        } else {
          $return['status'] = 'error';
          $return['message'] = $validator->messages();
        }
        return $return;
    }
}
