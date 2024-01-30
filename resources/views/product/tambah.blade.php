@extends('template.index')
@section('content')
<form action="{{ url('saved') }}" method="POST" enctype="multipart/form-data">
  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Produk</label>
                    <input type="text" class="form-control" name="dataproduk"  id="exampleInputEmail1" placeholder="Enter Nama">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kategori id</label>
                    <select  name="dataid" id="" class="form-control">
                      @foreach ($kategori as $k)
                          <option value="{{ $k->id }}"> {{ $k->nama_kategori }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga</label>
                    <input type="number" class="form-control" name="dataharga" id="exampleInputPassword1" placeholder="Harga">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto</label>
                    <div class="input-group">
                        <input type="file" class="form-control" name="datagambar">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Deskripsi</label>
                      <input type="text" class="form-control" name="datades" id="exampleInputPassword1" placeholder="Deskripsi">
                    </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
@endsection