@extends('landingpage.index')
@section('title', 'produk')
@section('cardproduct')
    <section class="py-5">
        <h1 class="fw-bold text-dark ms-5">Product</h1>
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
                @foreach ($produk as $p)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ Storage::disk('public')->url($p->gambar) }}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <p class="fw-medium text-start">{{ $p->nama_kategori }}</p>
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder text-uppercase">{{ $p->nama_produk }}</h5>
                                    <!-- Product price-->
                                    <h5 class="fw-medium">Rp. {{ number_format($p->harga) }},-</h5>
                                </div>
                                <p class="fw-normal text">{{ $p->deskripsi }}</p>

                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-end">
                                    <a class="btn btn-outline-dark mt-auto" href="{{ route('order', ['id' => $p->id]) }}"><i
                                            class="bi bi-cart-plus"></i> Buy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
