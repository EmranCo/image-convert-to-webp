@extends('layouts.app')

@section('content')
    <h1>Images</h1>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="image">Choose Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>

    <div class="row mt-4">
        @foreach ($images as $image)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ $image->thumbUrl }}" class="card-img-top" alt="{{ $image->filename }}">
                    <div class="card-body">
                        <a href="{{ $image->url }}" class="btn btn-primary" download>Download</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
