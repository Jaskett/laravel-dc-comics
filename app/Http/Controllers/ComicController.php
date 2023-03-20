<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::paginate(5);
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();

        $request->validate([
            'title' => 'required|max:100|min:2',
            'thumb' => 'required|max:255|min:10',
            'series' => 'max:50',
            'type' => 'max:20',
            'price' => 'required|max:10|min:2',
            'sale_date' => 'required|max:15|min:2',
        ],
        [
            'title.required' => 'Comic title is required',
            'title.max' => 'The maximum lenght for comic title is :max characters',
            'title.min' => 'The minimum lenght for comic title is :min characters',
            'thumb.required' => 'Image URL is required',
            'thumb.max' => 'The maximum lenght for Image URL is :max characters',
            'thumb.min' => 'The minimum lenght for Image URL is :min characters',
            'series.thumb' => 'The maximum lenght for series is :max characters',
            'type.thumb' => 'The maximum lenght for type is :max characters',
            'price.required' => 'Price is required',
            'price.max' => 'The maximum lenght for price is :max characters',
            'price.min' => 'The minimum lenght for price is :min characters',
            'sale_date.required' => 'Release date is required',
            'sale_date.max' => 'The maximum lenght for release date is :max characters',
            'sale_date.min' => 'The minimum lenght for release date is :min characters',
        ]);

        $new_comic = new Comic();
        // $new_comic->title = $form_data['title'];
        // $new_comic->slug = Comic::generateSlug($new_comic->title);
        // $new_comic->thumb = $form_data['image'];
        // $new_comic->description = $form_data['description'];
        // $new_comic->series = $form_data['series'];
        // $new_comic->price = $form_data['price'];
        // $new_comic->sale_date = $form_data['sale_date'];
        // $new_comic->type = $form_data['type'];
        $form_data['slug'] = Comic::generateSlug(($form_data['title']));
        $new_comic->fill($form_data);
        $new_comic->save();

        return redirect()->route('comics.show', $new_comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::findOrFail($id);

        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('comics.edit', compact('comic'));
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
        $form_data = $request->all();

        if($form_data['title'] != $comic->title){
            $form_data['slug'] = Comic::generateSlug($form_data['title']);
        }else{
            $form_data['slug'] = $comic->slug;
        }

        $comic->update($form_data);

        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index');
    }
}
