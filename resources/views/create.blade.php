@extends('layouts')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">

            <form action="/create" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title')is-invalid @enderror" id="title" name="title"
                        value="{{ old('title') }}" autofocus>
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label ">Body</label>

                    <textarea name="body" id="editor"></textarea>


                </div>


                <button type="submit" class="btn btn-primary mb-5">Create</button>
            </form>

        </div>

    </div>
</div>
@endsection