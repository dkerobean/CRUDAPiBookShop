<?php

namespace App\Http\Controllers;

use App\Models\authors;
use App\Http\Requests\StoreauthorsRequest;
use App\Http\Requests\UpdateauthorsRequest;
use App\Http\Resources\AuthorsResource;
use Validator;
use App\Http\Requests\AuthorsRequest;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Authors::all();

          return AuthorsResource::collection($authors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreauthorsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorsRequest $request)
    {
        $validator = Validator::make($request->all(), [
          'name'=>'required | string'
        ]);

        if($validator->fails()) {
          return response()->json($validator->errors());
        }

        $author =  Authors::create([
          'name'=>$request->name,
        ]);

          return response()->json(['Author created', new AuthorsResource($author)]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Authors::find($id);
        if(is_null($author)){
          return response()->json('data not found', 404);
        }
          return response()->json($author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function edit(authors $authors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateauthorsRequest  $request
     * @param  \App\Models\authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorsRequest $request, authors $authors)
    {
        $validator = Validate::create($request->all(), [
          'name'=>'required'
        ]);

        if($validator->fails()){
          return response()->json($validator->errors());
        }

        $author =  Author::create([
          $author->name = $request->name
        ]);

        return response()->json(['author updated', new AurthorsResource($author)]);
    }

    /**
     * Remove the specified resourccreatee from storage.
     *
     * @param  \App\Models\authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function destroy(authors $authors)
    {
        $authors->delete();
          return response()->json('Delete sucessfull');
    }
}
