@extends('layout.app')

@section('page_title', 'create')

@section('content')
    
    <div class="container">
        <form action="{{route('comics.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" />
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" placeholder="Write description" id="description" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">Thumb</label>
                <input type="text" class="form-control" id="thumb" name="thumb" />
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" />
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" class="form-control" id="series" name="series" />
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Sale date</label>
                <input type="date" class="form-control" id="sale_date" name="sale_date" />
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select id="type" class="form-select" name="type">
                    <option>Comic Book</option>
                    <option>Graphic Novel</option>
                </select>
            </div>
            <button type="submit" class="btn btn-warning">create new comic</button>
        </form>
    </div>
@endsection
