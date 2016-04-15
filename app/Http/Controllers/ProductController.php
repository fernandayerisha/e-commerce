<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sellers;
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
        $sellers = Sellers::all();
        return view('product.formproduct', ['cat' => $categorys], ['seller' => $sellers] );

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
          'nama'  => 'required',
          'harga' => 'required|integer',

        ]);

        $product = new Product;
        $product->nama_product = $request->nama;
        $product->harga = $request->harga;
        $product->id_category = $request->sKategori;
        $product->id_seller = $request->sToko;
        $product->save();

        return redirect('product')->with('pesan', 'Product telah ditambahkan');

        //
        // $return = array();

        // $rules = array(
        //     'nama'        => 'required',
        //     // 'jk'          => 'required',
        //     // 'kondisi'     => 'required',
        //     'harga'       => 'required|integer',
        //     // 'ket'         => 'required',
        //     '_token'      => 'required',
        // );
          // $messages = array(
          //     'required'  => 'Kolom ini harus diisi.',
          //     'integer'   => 'Kolom ini harus berisi angka',
          // );
          //
          // $validator  = Validator::make($request->all(), $rules, $messages);
          //
          // if (!$validator->fails()){
          //   $return['status'] = 'success';
          // } else {
          //   $return['status'] = 'error';
          //   $return['message'] = $validator->messages();
          // }
          // return $return;
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
        // $category = Categoryku::where('nama_kategori',$product->id_category);


        // $seller = Seller::find($id_seller);

        if(!$product)
        {
          abort(404);
        }

        return view('product.detail')->with('product', $product);
                                            // ['cat',$category],['seller',$seller]);
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
      $sellers = Sellers::all();

        if(!$product)
        {
          abort(404);
        }

      return view('product.edit', array(
        'cat' => $category,
        'product' => $product,
        'seller' => $sellers
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
          $this->validate($request,
          [
            'nama'  => 'required',
            'harga' => 'required|integer',

          ]);

          $product = Product::find($id);
          $product->nama_product = $request->nama;
          $product->harga = $request->harga;
          $product->id_category = $request->sKategori;
          $product->id_seller = $request->sToko;
          $product->save();

          return redirect('product')->with('pesan', 'Product telah diubah');
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
