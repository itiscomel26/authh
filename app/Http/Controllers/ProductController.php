<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $produk=DB::table('tb_produk')->join('table_categori', 'tb_produk.kategori_id', '=', 'table_categori.id')
        ->select('tb_produk.*','table_categori.nama_kategori')->get();
        $title='Delete Data!';
        $text='Are you sure you want to detele?';
        confirmDelete($title,$text);
        return view('product.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = DB::table('table_categori')->get();
        $produk=DB::table('tb_produk')->get();
         return view('product.tambah', compact('produk', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('tb_produk')-> insert([
            'nama_produk'=>$request->dataproduk,
            'kategori_id'=>$request->dataid,
            'harga'=>$request->dataharga,
            'gambar'=>$request->datagambar->store('foto/produk', 'public'),
            'deskripsi'=>$request->datades,
        ]);
        Alert::success('Hore!', 'Categories Berhasil');
        return redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = DB::table('table_categori')->get();
         $produk=DB::table('tb_produk')->where('id',$id)->get();
         return view('product.edit', compact('produk', 'kategori'));
        
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
        DB::table('tb_produk')-> where('id',$id)->update([
            'nama_produk'=>$request->dataproduk,
            'kategori_id'=>$request->dataid,
            'harga'=>$request->dataharga,
            'gambar'=>$request->datagambar->store('foto/produk', 'public'),
            'deskripsi'=>$request->datades,
        ]);
        Alert()->success('Hore!', 'Categories Berhasil');
        return redirect('product');
        
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB:: table('tb_produk') ->where('id', $id)->delete();
        return redirect('product');
    }
}
