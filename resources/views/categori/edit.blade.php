@extends('template.index')
@section('content')
<div class="card">

  <div class="card-body">
    @foreach ($data as $d)
    <form action="{{ url('update', $d->id) }}" method="POST">
      @csrf
      <input type="hidden" name="id" value="{{ $d->id }}">
                    <div class="form-group">
                      <label for="exampleInputNama">Nama Kategori</label>
                      <input type="text" name="terserah" value="{{ $d->nama_kategori }}" class="form-control" id="exampleInputNama" placeholder="Enter nama">
                    </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
      </form>
    @endforeach

    </div>
</div>
@endsection