<?php

namespace App\Http\Controllers;

use App\Country;
use App\Film;
use App\Genre;
use App\Http\Requests\CreateFilmRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class FilmController extends Controller
{
    public function index()
    {
        $data = Film::all();
        return response()->json($data);
    }

    public function show($slug)
    {
        $film = Film::where('slug', $slug)->first();

        return response()->json(array_merge($film->toArray(), ['genres' => $film->genres], ['country' => Country::find($film->country_id)->name], ['comments' => $film->comments]));

    }

    public function store(CreateFilmRequest $request)
    {


        $image = Image::make($request->get('photo'))->encode('jpg');
        $fileName = str_slug($request->name) . '.jpg';

        $id = DB::table('films')->insertGetId([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'rating' => $request->rating,
            'release_date' => date('Y-m-d', strtotime($request->release_date)),
            'ticket_price' => $request->ticket_price,
            'country_id' => $request->country_id,
            'description' => $request->description,
            'photo' => $fileName,
        ]);

        $image->save(public_path('img/') . $fileName);
        $genres = explode(',', $request->genre);

        foreach ($genres as $genre) {
            Genre::create([
                'film_id' => $id,
                'name' => $genre,
                'slug' => str_slug($genre),
            ]);
        }

        return response()->json(['success' => true]);
    }
}
