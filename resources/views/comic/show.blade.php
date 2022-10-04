@extends('layout.app')

@section('page_title', 'show')

@section('content')
    <div class="container">
        <h1>{{$comic->title}}</h1>
        <img src="{{$comic->thumb}}" alt="{{$comic->title}}" />
        <div>Description: {{$comic->description}}</div>
        <div>Price: {{$comic->price}} $</div>
        <div>Series: {{$comic->series}}</div>
        <div>Sale date: {{$comic->sale_date}}</div>
        <div>Type: {{$comic->type}}</div>
        <a class="btn btn-primary" href="{{route('comics.index')}}">Back to List</a>
    </div>
@endsection
