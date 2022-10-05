<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use function GuzzleHttp\Promise\all;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comic.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:255|min:5',
                'description' => 'nullable|max:65000',
                'thumb' => 'required|max:255|url',
                'price' => 'required|numeric|min:0',
                'series' => 'required|max:80|min:5',
                'sale_date' => 'required|date',
                'type' => ['required', Rule::in(['Comic Book', 'Graphic Novel'])],
            ]
        );

        $data = $request->all();

        $newComic = new Comic();

        // $newComic->title = $data['title'];
        // $newComic->description = $data['description'];
        // $newComic->thumb = $data['description'];
        // $newComic->price = $data['price'];
        // $newComic->series = $data['series'];
        // $newComic->sale_date = $data['sale_date'];
        // $newComic->type = $data['type'];
        $newComic->fill($data);
        $newComic->save();

        return redirect()->route('comics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        if ($comic) {
            return view('comic.show', compact('comic'));
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        if ($comic) {
            return view('comic.edit', compact('comic'));
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {   
        $request->validate(
            [
                'title' => 'required|max:255|min:10',
                'description' => 'nullable|max:65000',
                'thumb' => 'required|max:255|url',
                'price' => 'required|numeric|min:0',
                'series' => 'required|max:80|min:10',
                'sale_date' => 'required|date',
                'type' => ['required', Rule::in(['Comic Book', 'Graphic Novel'])],
            ]
        );

        if ($comic) {
            $data = $request->all();
            $comic->update($data);
            $comic->save();
            return redirect()->route('comics.show', compact('comic'))->with('status', 'Comic updated!');
        }

        abort(404);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        if ($comic) {
            $comic->delete();
            return redirect()->route('comics.index');
        }
        abort(404);
    }
}
