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
        $produk = DB::table('tb_produk')->get();
        return view('landingpage.cardproduct', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderID(string $id)
    {
        // Cek apakah produk dengan ID yang diberikan ada
        $product = DB::table('tb_produk')->where('id', $id)->first();

        // Jika produk ditemukan, lanjutkan menampilkan formulir pesanan
        return view('order.form', compact('product'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Menyimpan data pesanan ke dalam tabel transaksi menggunakan Query Builder
        DB::table('tb_transaksi')->insert([
            'barang_id' => $request->barang_id,
            'quantity' => $request->quantity,
            // Tambahkan kolom lain sesuai kebutuhan
        ]);

        // Redirect ke halaman atau tindakan lain setelah penyimpanan berhasil
        return redirect()->route('transaksi');
    }

    public function listTransaksi()
    {
        $data = DB::table('tb_transaksi')
            ->join('tb_produk', 'tb_transaksi.barang_id', '=', 'tb_produk.id')
            ->select('tb_transaksi.*', 'tb_produk.*') // Tentukan kolom yang ingin Anda ambil
            ->get();

        // Hitung total harga untuk setiap item
        foreach ($data as $item) {
            $total = $item->harga * $item->quantity;
        }

        return view('order.listtransaksi', compact('data', 'total'));
    }

    public function status(string $id)
    {
        $status = DB::table('tb_transaksi')->where('id', $id)->first();

        $statusNow = $status->status;

        if ($statusNow == 1) {
            DB::table('tb_transaksi')->where('id', $id)->update([
                'status' => 0
            ]);
        } else {
            DB::table('tb_transaksi')->where('id', $id)->update([
                'status' => 1
            ]);
        }

        return redirect()->back();
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
    public function buktiBayar($id)
    {
        $bukti = DB::table('tb_transaksi')->where('id', $id)->get();
        return view('transaksi.upload', compact('bukti'));
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
