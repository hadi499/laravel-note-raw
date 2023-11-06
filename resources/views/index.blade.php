@extends('layouts')

@section('content')
<h1>Home</h1>

<div>
    @foreach ($notes as $note)
    <h5><a href="/{{$note->id}}">{{$note->title}}</a></h5>

    @endforeach
</div>
@endsection