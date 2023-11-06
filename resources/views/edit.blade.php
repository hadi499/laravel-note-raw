@extends('layouts')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">

            <form action="/edit/{{$note->id}}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$note->title}}" autofocus>


                </div>


                <div class="mb-3">
                    <label class="form-label ">Body</label>

                    <textarea name="body" id="editor" value="{{$note->body}}">{{$note->body}}</textarea>


                </div>


                <button type="submit" class="btn btn-primary mb-5">Create</button>
            </form>


        </div>

    </div>
</div>
@endsection