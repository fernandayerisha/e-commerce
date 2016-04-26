<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Toko;
use App\Categoryku;
use Validator;

use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::all();

      return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('product.formproduct');

        $categorys = Categoryku::all();
        $toko = Toko::all();
        return view('product.formproduct', ['cat' => $categorys], ['toko' => $toko] );

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->nama_product = $request->nama;
        $product->harga = $request->harga;
        $product->id_category = $request->Kategori;
        $product->id_toko = $request->Toko;
        $product->save();
    }

    public function validation(Request $request)
    {
      $return = array();

      $rules = array(
          'nama'        => 'required',
          // 'kategori'    => 'required',
          'harga'       => 'required|integer',
          // 'toko'        => 'required',
          '_token'      => 'required',
      );
        $messages = array(
            'required'  => 'Kolom ini harus diisi.',
            'integer'   => 'Kolom ini harus berisi angka',
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

    public function validasi_create(Request $request)
    {
      $validasi = $this->validation($request);
      if ($validasi['status'] == 'success')
      {
        $this->store($request);
      }else {
        return $validasi;
      }
    }

    public function validasi_edit(Request $request, $id)
    {
      $validasi = $this->validation($request);
      if ($validasi['status'] == 'success')
      {
        $this->update($request, $id);
      }else {
        return $validasi;
      }
    }

    /**
     * Display the specified resource.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $category = Categoryku::all();
        $toko = Toko::all();

        if(!$product)
        {
          abort(404);
        }

        // return view('product.detail')->with('product', $product);
        return view('product.detail', array(
          'cat' => $category,
          'product' => $product,
          'toko' => $toko
        ));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $product = Product::find($id);
      // $category = Categoryku::where('id_category',$product->id_category)->get();
      $category = Categoryku::all();
      $toko = Toko::all();

        if(!$product)
        {
          abort(404);
        }

      return view('product.edit', array(
        'cat' => $category,
        'product' => $product,
        'toko' => $toko
      ));

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
          $product = Product::find($id);
          $product->nama_product = $request->nama;
          $product->harga = $request->harga;
          $product->id_category = $request->Kategori;
          $product->id_toko = $request->Toko;
          $product->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('product')->with('pesan', 'Product telah dihapus');
    }
}
