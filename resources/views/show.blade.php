@extends('layouts')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mb-5">
            <p>{{$note->title}}</p>
            <div>{!! $note->body !!}</div>
            <div class="d-flex gap-4">
                <a href="/edit/{{$note->id}}" class="btn btn-success btn-sm">edit</a>
                <form action="/delete/{{ $note->id}}" method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')">delete</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection