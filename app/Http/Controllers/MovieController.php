<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;


class MovieController extends Controller
{
    //TODO ADD CACHING
    public function index(){
        return (MovieResource::collection(Movie::all()))
        ->response()
        ->header('Cache-Control', 'private, max-age=30')
        ->setStatusCode(200);
    }


    public function store(StoreMovieRequest $request){

        $movie = Movie::create($request->all());


        return (new MovieResource($movie))
            ->response()
            ->setStatusCode(201);

    }

    public function show($id){
        $movie = Movie::find($id);
        //TODO Put this in a method
        if(!isset($movie)){
            throw new HttpResponseException(
                response()->json(['data' => 'ID not found'], Response::HTTP_NOT_FOUND)
            );
        }
        return (new MovieResource($movie))
            ->response()
            ->setStatusCode(200);
    }

    public function update(UpdateMovieRequest $request, $id){
        $movie = Movie::find($id);
        //TODO Put this in a method
        if(!isset($movie)){
            throw new HttpResponseException(
                response()->json(['data' => 'ID not found'], Response::HTTP_NOT_FOUND)
            );
        }
        $movie->update($request->validated());

        return (new MovieResource($movie))
            ->response()
            ->setStatusCode(200);

    }

    public function destroy($id){
        $movie = Movie::find($id);
        //TODO Put this in a method
        if(!isset($movie)){
            throw new HttpResponseException(
                response()->json(['data' => 'ID not found'], Response::HTTP_NOT_FOUND)
            );
        }

        $movie->delete();

        return response()->json(null, 204);
    }
}
