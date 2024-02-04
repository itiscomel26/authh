@extends('template.index')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Bukti Bayar</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @foreach ($buktiID as $id)
                    <div class="card-body">
                        <form action="{{ route('upload.bukti', ['id' => $id->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputFile">Bukti Bayar</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="bukti bayar" class="custom-file-input"
                                            id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
            </div>
            @endforeach
        </div>
    </div>

    <!-- /.card-body -->
@endsection
