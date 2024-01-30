@extends('template.index')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">DataTable with minimal features & hover style</h3>
    <div class="d-flex justify-content-end">
      <a href="{{ url('add')  }}" type="submit" class="btn btn-success">Add</a>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
      <thead>
      <tr>
        <th style="width: 10%">No</th>
        <th>Nama</th>
        <th style="width: 20%">Action</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($data as $d)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $d->nama_kategori }}</td>
          <td class="text-center">
            <a href="{{ url('ubah', $d->id) }}" class="btn  btn-primary">edit</a>
            <a href="{{ url('hapus', $d->id) }}" class="btn btn-danger">delete</a>
          </td>
        </tr>  
        @endforeach
                   
      </tbody>
      <tfoot>
        <th style="width: 10%">No</th>
        <th>Nama</th>
        <th style="width: 20%">Action</th>
      </tfoot>
    </table>
  </div>
</div>

@endsection