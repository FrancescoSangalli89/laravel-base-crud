@extends('layout.app')

@section('page_title', 'edit')

@section('content')
    
    <div class="container">
        <form action="{{route('comics.update', ['comic' => $comic->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title', $comic->title)}}"/>
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Write description" id="description" name="description">{{old('title', $comic->description)}}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">Thumb</label>
                <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb" value="{{old('thumb', $comic->thumb)}}"/>
                @error('thumb')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" step="0.01" value="{{old('price', $comic->price)}}"/>
                @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series" value="{{old('series', $comic->series)}}"/>
                @error('series')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Sale date</label>
                <input type="date" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date" name="sale_date" value="{{old('sale_date', $comic->sale_date)}}"/>
                @error('sale_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select id="type" class="form-select @error('type') is-invalid @enderror" name="type">
                    <option {{(old('type', $comic->type)=="Comic Book")?'selected':''}} value="Comic Book">Comic Book</option>
                    <option {{(old('type', $comic->type)=="Graphic Novel")?'selected':''}} value="Graphic Novel">Graphic Novel</option>
                </select>
                @error('type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
