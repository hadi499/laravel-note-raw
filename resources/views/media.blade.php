@extends('layouts')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>Upload Image Page</h3>
            @foreach ($images as $image)
            <div class="d-flex gap-3 align-items-center justify-content-center mt-3">

                <img src="/media/{{$image->upload}}" alt="" style="width: 200px;height:200px">
                {{-- <a href="/delete-file/{{$image->id}}"
                    onclick="return confirm('Are you sure delete this image ?')">delete</a> --}}
                <form action="/delete-file/{{$image->id}}" method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')">delete</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection