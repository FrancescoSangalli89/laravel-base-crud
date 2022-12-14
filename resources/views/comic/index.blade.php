@extends('layout.app')

@section('page_title', 'Comics List')

@section('content')

    <div class="container">
        <a href="{{route('comics.create')}}" class="btn btn-primary">New Comic</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">price</th>
                    <th scope="col">series</th>
                    <th scope="col">sale_date</th>
                    <th scope="col">type</th>
                    <th scope="col">show</th>
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comics as $comic)
                    <tr>
                        <th scope="row">{{$comic->id}}</th>
                        <td>{{$comic->title}}</td>
                        <td>{{$comic->price}}</td>
                        <td>{{$comic->series}}</td>
                        <td>{{$comic->sale_date}}</td>
                        <td>{{$comic->type}}</td>
                        <td><a class="btn btn-primary" href="{{route('comics.show', $comic)}}">Show</a></td>
                        <td><a class="btn btn-warning" href="{{route('comics.edit', $comic)}}">Edit</a></td>
                        <td>
                            <form action="{{route('comics.destroy', $comic)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                {{-- <button class="btn btn-danger" type="submit" value="delete" onclick="return confirm('Are you sure you want to delete?')">Delete</button> --}}
                                <button class="btn btn-danger show_confirm" type="submit" value="delete" >Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
