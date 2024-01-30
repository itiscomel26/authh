@extends('template.index')
@section('content')
@foreach ($produk as $p)
<form action="{{ url('perbarui', ['produk'=>$p->id]) }}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" value="{{ $p->id }}">
  <div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Nama Produk

      </label>
      <input type="text" class="form-control" name="dataproduk" value="{{ $p->nama_produk }}" id="exampleInputEmail1" placeholder="Enter Nama">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Kategori id</label>
      <select  name="dataid" id="" class="form-control">
           @foreach ($kategori as $k)
           <option value="{{ $k->id }}"> {{ $k->nama_kategori }} </option>
           @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Harga</label>
      <input type="number" class="form-control" name="dataharga" value="{{ $p->harga }}" id="exampleInputPassword1" placeholder="Harga">
    </div>
    <div class="form-group">
      <label for="exampleInputFile">Foto</label>
      <div class="input-group">
        <img src="{{Storage::disk('public')->url( $p->gambar ) }}" alt="" style="width: 120px">
          <input type="file" class="form-control" name="datagambar">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Deskripsi</label>
        <input type="text" class="form-control" name="datades" value="{{ $p->deskripsi }}" id="exampleInputPassword1" placeholder="Deskripsi">
      </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              @endforeach
@endsection