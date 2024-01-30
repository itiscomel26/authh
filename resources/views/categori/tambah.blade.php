@extends('template.index')
@section('content')
<div class="card">

  <div class="card-body">
    <form action="{{ url('/save') }}" method="POST">
      @csrf
                    <div class="form-group">
                      <label for="exampleInputNama">Nama Kategori</label>
                      <input type="text" name="terserah" class="form-control" id="exampleInputNama" placeholder="Enter nama">
                    </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
      </form>
    </div>
</div>
@endsection