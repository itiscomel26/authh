@extends('template.index')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Table Histori Transaksi/h3>
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
          <td><img src="{{ Storage::disk('public')->url( $d->gambar ) }}" alt="Gambar Product" width="70px"></td>
          <td>{{ $d->nama_produk }}</td>
          <td>Rp. {{ number_format($d->harga) }}</td>
          <td>{{ $d->quantity }}</td>
          <td>{{ $d->status }}</td>
          <td>
            <img src="{{ Storage::disk('public')->url( $d->bukti_bayar ) }}" alt="Gambar Product" width="70px">
          </td>
          <td class="text-center">
            <a href="" class="btn  btn-primary">edit</a>
            <a href="" class="btn btn-danger"data-confirm-delete="true" >delete</a>
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
