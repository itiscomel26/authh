@extends('template.index')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with minimal features & hover style</h3>
            <div class="d-flex justify-content-end">
                <a href="" type="submit" class="btn btn-success">Add</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar Product</th>
                        <th>Nama Product</th>
                        <th>Harga Product</th>
                        <th>Quantity</th>
                        <th>Bukti Bayar</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $t)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ Storage::disk('public')->url($t->gambar) }}" alt="Gambar Product"
                                    width="70px"></td>
                            <td>{{ $t->nama_produk }}</td>
                            <td>Rp. {{ number_format($t->harga) }}</td>
                            <td>{{ $t->quantity }}</td>
                            <td><img src="{{ Storage::disk('public')->url($t->bukti_bayar) }}" alt="Gambar Product"
                                    width="70px"></td>
                            <td>{{ $t->srtatus }}</td>
                            <td class="text-center">
                                @hasrole('user')
                                    <a href="{{ route('buktiID', ['id' => $t->id]) }}" class="btn  btn-primary">Upload Bukti</a>
                                    <a href="" class="btn btn-danger"data-confirm-delete="true">delete</a>
                                @endhasrole
                                @hasrole('admin')
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Status
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @if ($t->srtatus == 1)
                                                {{-- boolean ternaryoperator --}}
                                                <a href="{{ route('status', ['id' => $t->id]) }}"
                                                    class="dropdown-item">Non-Aktifkan</a>
                                            @else
                                                <a href="{{ route('status', ['id' => $t->id]) }}"
                                                    class="dropdown-item">Aktifkan</a>
                                            @endif
                                        </div>
                                    </div>
                                @endhasrole
                            </td>
                        </tr>
                        <tr>
                            <td class="text-bold" colspan="5">Total Bayar</td>
                            <td class="text-danger">
                                @php
                                    $total = $t->harga * $t->quantity;
                                @endphp
                                Rp. {{ number_format($total) }}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <th>No</th>
                    <th>Gambar Product</th>
                    <th>Nama Product</th>
                    <th>Harga Product</th>
                    <th>Quantity</th>
                    <th>Bukti Bayar</th>
                    <th>Status</th>
                    <th>Action</th>
            </table>
        </div>
    </div>
@endsection
