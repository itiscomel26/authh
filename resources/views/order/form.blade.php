@extends('landingpage.index')
@section('title', 'Order Form')
@section('cardproduct')
    <section class="py-5">
        <h1 class="fw-bold text-dark ms-5">Order Form</h1>
        <div class="container px-4 px-lg-5 mt-5">
            <div class="col-12 ">
                <div class="card-body d-flex justify-content-arround">
                    <div class="col-md-6 p-3 d-flex align-items-center">
                        <div class="card p-3">
                            <!-- Product image-->
                            <img class="img-thumbnail w-100" src="{{ Storage::disk('public')->url($produk->gambar) }}"
                                alt="..." />
                        </div>
                    </div>
                    <!-- Product details-->
                    <div class="col-md-6 p-3">
                        <div class="card card-body">
                            <h-3 class="text-center mb-3 fw-bold">Form Input Order</h-3>
                            <form method="POST" action="{{ route('tambah.transaksi') }}">
                                @csrf
                                <div class="form-group d-flex">
                                    <div class="col-md-6">
                                        <p class="fw-bold text-black">Nama Barang :</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="fw-bold text-black">{{ $produk->nama_produk }}</p>
                                    </div>
                                    <!-- Perbaikan: Menggunakan $product->id karena hanya satu produk yang diberikan -->
                                    <input type="hidden" name="produk_id" id="produk_id" value="{{ $produk->id }}"
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group d-flex mt-3">
                                    <div class="col-md-6">
                                        <p class="fw-bold text-black">Harga :</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="fw-bold text-black">Rp. {{ number_format($produk->harga) }},-</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="fw-bold mb-2">Quantity</label>
                                    <input type="number" name="quantity" id="quantity" class="form-control" min="1"
                                        required>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    {{-- <a href="" class="btn btn-danger" href="" >Cancel</a> --}}
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-outline-dark">Order</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
