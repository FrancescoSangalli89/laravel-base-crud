@extends('layout.app')

@section('page_title', 'edit')

@section('content')
    
    <div class="container">
        <form action="{{route('comics.update', ['comic' => $comic->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$comic->title}}"/>
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" placeholder="Write description" id="description" name="description">{{$comic->description}}</textarea>
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">Thumb</label>
                <input type="text" class="form-control" id="thumb" name="thumb" value="{{$comic->thumb}}"/>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{$comic->price}}"/>
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" class="form-control" id="series" name="series" value="{{$comic->series}}"/>
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Sale date</label>
                <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{$comic->sale_date}}"/>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select id="type" class="form-select" name="type">
                    <option {{($comic->type=="Comic Book")?'selected':''}} value="Comic Book">Comic Book</option>
                    <option {{($comic->type=="Graphic Novel")?'selected':''}} value="Graphic Novel">Graphic Novel</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
