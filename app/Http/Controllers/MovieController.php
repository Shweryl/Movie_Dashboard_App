<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Models\Actor;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\MovieType;
use App\Models\Production;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::with(['actors', 'genres'])->get();
        return view('movies.movie-list', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = MovieType::all();
        $directors = Director::all();
        $productions = Production::all();
        $actors = Actor::all();
        $genres = Genre::all();

        return view('movies.movie-create', compact('types', 'directors', 'productions', 'actors', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {

        if($request->hasFile('movie_image')){
            $imagepath = Storage::disk('public')->put('movies', $request->movie_image);
        }
        $movie = Movie::create([
            'title' => $request->title,
            'description' => $request->description,
            'movie_image' => $imagepath,
            'release' => $request->release,
            'rating' => $request->rating,
            'admin_id' => 1,
            'movie_type_id' => $request->movie_type_id,
            'director_id' => $request->director_id,
            'production_id' => $request->production_id,
            'trailer_link' => $request->trailer_link,
        ]);

        $movie->actors()->attach($request->actors);
        $movie->genres()->attach($request->genres);

        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie  = Movie::with(['actors','genres'])->find($id);

        return $movie;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie  = Movie::with(['actors','genres'])->find($id);

        $types = MovieType::all();
        $directors = Director::all();
        $productions = Production::all();
        $actors = Actor::all();
        $genres = Genre::all();

        return view('movies.movie-edit', compact('movie', 'types', 'directors', 'productions', 'actors', 'genres'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movie = Movie::find($id);
        if($request->hasFile('movie_image')){
            $movie->movie_image = Storage::disk('public')->put('movies', $request->movie_image);
        }


        if($movie){
            $movie->title = $request->title;
            $movie->description = $request->description;
            $movie->release = $request->release;
            $movie->rating = $request->rating;
            $movie->movie_type_id = $request->movie_type_id;
            $movie->director_id = $request->director_id;
            $movie->production_id = $request->production_id;
            $movie->trailer_link = $request->trailer_link;
            $movie->update();

            $movie->actors()->sync($request->actors);
            $movie->genres()->sync($request->genres);

            return redirect()->route('movies.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);
        $movie->delete();

        return redirect()->route('movies.index');
    }
}
