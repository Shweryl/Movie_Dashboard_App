<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
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
        $movies = Movie::with(['actors', 'genres'])->paginate(10);
        return view('movies.movie-list', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.movie-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        if ($request->hasFile('movie_image')) {
            $imagepath = Storage::disk('public')->put('movies', $request->movie_image);
        };

        $genreIds = [];
        foreach($request->genres as $genre){
            $newGenre = Genre::firstOrCreate(['name' => trim($genre)],['admin_id' => 1]);
            $genreIds[] = $newGenre->id;
        }

        $director = Director::firstOrCreate(['name' => trim($request->director)]);
        $production = Production::firstOrCreate(['company_name' => trim($request->production)]);

        $actorIds = [];
        foreach($request->males as $male){
            $newActor = Actor::firstOrCreate(['name' => trim($male), 'gender' => 'Male']);
            $actorIds[] = $newActor->id;
        };

        foreach($request->females as $female){
            $newActor = Actor::firstOrCreate(['name' => trim($female), 'gender' => 'Female']);
            $actorIds[] = $newActor->id;
        };

        $movie = Movie::create([
            'title' => $request->title,
            'description' => $request->description,
            'movie_image' => $imagepath,
            'release' => $request->release,
            'rating' => $request->rating,
            'admin_id' => 1,
            'movie_type_id' => $request->movie_type_id,
            'director_id' => $director->id,
            'production_id' => $production->id,
            'trailer_link' => $request->trailer_link,
        ]);

        $movie->actors()->attach($actorIds);
        $movie->genres()->attach($genreIds);

        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie  = Movie::with(['actors', 'genres'])->find($id);

        return $movie;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie  = Movie::with(['actors', 'genres'])->find($id);

        return view('movies.movie-edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, string $id)
    {

        $movie = Movie::findOrFail($id);

        $updateMovie = $request->except(['genres','males','females','director','production']);

        if ($request->hasFile('movie_image')) {
            $updateMovie['movie_image'] = Storage::disk('public')->put('movies', $request->movie_image);
        }


        $genreIds = [];

        foreach($request->genres as $genre){
            $newGenre = Genre::firstOrCreate(['name' => trim($genre)],['admin_id' => 1]);
            $genreIds[] = $newGenre->id;
        }

        $actorIds = [];
        foreach($request->males as $male){
            $newActor = Actor::firstOrCreate(['name' => trim($male), 'gender' => 'Male']);
            $actorIds[] = $newActor->id;
        };

        foreach($request->females as $female){
            $newActor = Actor::firstOrCreate(['name' => trim($female), 'gender' => 'Female']);
            $actorIds[] = $newActor->id;
        };


        $director = Director::firstOrCreate(['name' => trim($request->director)]);
        $updateMovie['director_id'] =  $director->id;

        $production = Production::firstOrCreate(['company_name' => trim($request->production)]);
        $updateMovie['production_id'] =  $production->id;

        $movie->update($updateMovie);


        $movie->genres()->sync($genreIds);

        $movie->actors()->sync($actorIds);

        return redirect()->route('movies.index');

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
