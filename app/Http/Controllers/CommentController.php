<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Film;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'comment' => 'required',
            'film' => 'required',
        ];

        $this->validate($request, $rules);

        $film_id = Film::where('slug', $request->film)->select('id')->first();


        Comment::create([
            'name' => $request->name,
            'film_id' => $film_id->id,
            'comment' => $request->comment,
            'user_id' => auth()->id(),
        ]);

        return response()->json(['success' => true]);
    }
}
