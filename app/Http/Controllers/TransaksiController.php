<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
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
        return view('landingpage.cardproduct',compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function orderID(string $id){
        $produk=DB::table('tb_produk')->where('id', $id)->first();
        return view('Order.Form', compact('produk'));
     }

     public function listTransaksi(){
        $transaksi=DB::table('tb_transaksi')->join('tb_produk','tb_transaksi.produk_id','=', 'tb_produk.id')
        ->select('tb_transaksi.*', 'tb_produk.*')->get();
        return view('transaksi.list',compact('transaksi'));
     }

     public function uploadBukti($id){
        $buktiID=DB::table('tb_transaksi')->where('id', $id)->get();
        return view('order.upload', compact('buktiID'));
     }

     public function Upload(Request $request, string $id){
        DB::table('tb_transaksi')->where('id', $id)->update([
            'bukti_bayar'=>$request->bukti_bayar->store('foto/bukti', 'public'),
        ]);
        return redirect('transaksi');
     }

     public function Status(string $id) {
        $data =DB::table('tb_transaksi')->where('id',$id)->first();

        $status_sekarang = $data->srtatus;

        if($status_sekarang == 1){
            DB::table('tb_transaksi')->where('id',$id)->update([
                'srtatus'=>0
            ]);
        }else{
            DB::table('tb_transaksi')->where('id',$id)->update([
                'srtatus'=>1
            ]);
        }


        return redirect('transaksi');
     }
    // public function orderID(string $id)
    // {
    // // Cek apakah produk dengan ID yang diberikan ada
    // $product = DB::table('tb_produk')->where('id', $id)->first();

    // // Jika produk ditemukan, lanjutkan menampilkan formulir pesanan
    // return view('order.form', compact('product'));
    // }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//     public function store(Request $request)
// {
       public function store(Request $request){
        DB::table('tb_transaksi')->insert([
            'produk_id'=>$request->produk_id,
            'quantity'=>$request->quantity,
        ]);
        return redirect('transaksi');
       }
//     // Menyimpan data pesanan ke dalam tabel transaksi menggunakan Query Builder
//     DB::table('tb_transaksi')->insert([
//         'barang_id' => $request->barang_id,
//         'quantity' => $request->quantity,
//         // Tambahkan kolom lain sesuai kebutuhan
//     ]);

//     // Redirect ke halaman atau tindakan lain setelah penyimpanan berhasil
//     return redirect()->route('transaksi');
// }

    // public function listTransaksi() {
    //     $data = DB::table('tb_transaksi')
    //         ->join('tb_produk', 'tb_transaksi.barang_id', '=', 'tb_produk.id')
    //         ->select('tb_transaksi.*', 'tb_produk.*') // Tentukan kolom yang ingin Anda ambil
    //         ->get();

    // // Hitung total harga untuk setiap item
    //     foreach ($data as $item) {
    //     $total = $item->harga * $item->quantity;
    //     }

    // return view('order.listtransaksi', compact('data', 'total'));
    // }


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
