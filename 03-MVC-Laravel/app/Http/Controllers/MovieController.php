<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('movie.indexMovie', ['movies' => Movie::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movie.createMovie', ['actors' => Actor::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:movies',
            'year' => 'required|date',
            'imageMovie' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2028',
            'duration' => 'required',
            'synopsis' => 'required|string',
            'mainActorId' => 'required'
        ]);

        $fileName = time() . '.' . request()->imageMovie->getClientOriginalExtension();
        request()->imageMovie->move(public_path('images/movies'), $fileName);


        $movie = new Movie();
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->imageMovie = $fileName;
        $movie->duration = $request->input('duration');
        $movie->synopsis = $request->input('synopsis');
        $movie->mainActorId = $request->input('mainActorId');
        $movie->save();

        return redirect('movie');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('movie.editMovie', ['movie' => Movie::find($id), 'actors' => Actor::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required',
            'year' => 'required|date',
            'duration' => 'required',
            'synopsis' => 'required|string',
        ]);

        $fileName = $request->hiddenImageMovie;
        $actorId = $request->hiddenMainActorId;

        if ($request->imageMovie != '') {
            $fileName = time() . '.' . request()->imageMovie->getClientOriginalExtension();
            request()->imageMovie->move(public_path('images/movies'), $fileName);
        }
        $movie = Movie::find($request->hiddenId);
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->imageMovie = $fileName;
        $movie->duration = $request->input('duration');
        $movie->synopsis = $request->input('synopsis');

        if($request->mainActorId != ''){
            $actorId = $request->input('mainActorId');
        }

        $movie->mainActorId = $actorId;
        $movie->save();


        return redirect('movie');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $imagePath = public_path()."/images/movies";
        $image = $imagePath. $movie->imageMovie;

        if(file_exists($image)){
            @unlink($image);
        }
        $movie->delete();
        return redirect('movie');
    }
}
