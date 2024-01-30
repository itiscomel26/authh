@extends('template.index')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">DataTable with minimal features & hover style</h3>
    <div class="d-flex justify-content-end">
      <a href="{{ url('produk')  }}" type="submit" class="btn btn-success">Add</a>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
      <thead>
      <tr>
        <th>No</th>
        <th>Nama Product</th>
        <th>Nama Kategori</th>
        <th>Harga</th>
        <th>Gambar</th>
        <th>Deskripsi</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($produk as $p)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $p->nama_produk }}</td>
          <td>{{ $p->nama_kategori }}</td>
          <td>Rp. {{ number_format($p->harga) }}</td>
          <td><img src="{{ Storage::disk('public')->url( $p->gambar ) }}" alt="Gambar Product" width="70px"></td>
          <td>{{ $p->deskripsi }}</td>
          <td class="text-center">
            <a href="{{ url('ganti', ['product' => $p->id ]) }}" class="btn  btn-primary">edit</a>
            <a href="{{ url('delete', ['product' => $p->id]) }}" class="btn btn-danger"data-confirm-delete="true" >delete</a>
          </td>
        </tr>  
        @endforeach
                   
      </tbody>
      <tfoot>
        <th>No</th>
        <th>Nama Product</th>
        <th>Nama Kategori</th>
        <th>Harga</th>
        <th>Gambar</th>
        <th>Deskripsi</th>
        <th>Action</th>
    </table>
  </div>
</div>

@endsection