@extends('template.index')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Table Histori Transaksi</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Product</th>
                        <th>Harga</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Bukti Bayar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ Storage::disk('public')->url($d->gambar) }}" alt="Gambar Product" width="70px">
                            </td>
                            <td>{{ $d->nama_produk }}</td>
                            <td>Rp. {{ number_format($d->harga) }}</td>
                            <td>{{ $d->quantity }}</td>
                            <td>
                                <label
                                    class="label {{ $d->status == 1 ? 'btn btn-xs rounded-pill btn-success' : 'btn btn-xs rounded-pill btn-warning' }}">{{ $d->status == 1 ? 'bayar Diterima' : 'Pending' }}</label>
                            </td>
                            <td>
                                <img src="{{ Storage::disk('public')->url($d->bukti_bayar) }}" alt="Gambar Product"
                                    width="70px">
                            </td>
                            <td class="text-center">
                                @hasrole('user')
                                    <a href="" class="btn  btn-primary">edit</a>
                                    <a href="" class="btn btn-danger"data-confirm-delete="true">delete</a>
                                    <a href="{{ route('upload', ['id' => $d->id]) }}"
                                        class="btn btn-info mt-2"data-confirm-delete="true">Upload Bukti Bayar</a>
                                @endhasrole
                                @hasrole('admin')
                                    <div class="dropdown d-flex align-items-center">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Status
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @if ($d->status == 1)
                                                <a href="{{ route('status', ['id' => $d->id]) }}"
                                                    class="dropdown-item">Pending</a>
                                            @else
                                                <a href="{{ route('status', ['id' => $d->id]) }}"
                                                    class="dropdown-item">Pembayaran
                                                    Diterima</a>
                                            @endif
                                        </div>
                                    </div>
                                @endhasrole
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="font-weight-bold" colspan="6">Total Harga</td>
                        <td class="font-weight-bold text-danger">Rp. {{ number_format($total) }}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Product</th>
                    <th>Harga</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Bukti Bayar</th>
                    <th>Action</th>
            </table>
        </div>
    </div>
@endsection
