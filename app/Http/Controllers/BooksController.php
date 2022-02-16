<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Http\Requests\StorebooksRequest;
use App\Http\Requests\UpdatebooksRequest;
use App\Http\Resources\BooksResource;
use Validator;


class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Books::all();
          return BooksResource::collection($books);
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
     * @param  \App\Http\Requests\StorebooksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BooksRequest $request)
    {
        $validator = Validate::make($request->all(), [
          'name'=>'required | string',
          'description'=>'required | string',
          'year_published'=>'required | integer',
        ]);

        if($validator->fails()){
          return response()->json($validator->errors());
        }

        $book = Books::create([
          'name'=>$request->name,
          'description'=>$request->description,
          'year_published'=>$request->year_published

        ]);

          return response()->json(['Book created', new BooksResource($book)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\books  $books
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $books = Books::find($id);
        if(is_null($books)){
          return response()->json('Book not found', 404);
        }

        return response()->json(new BooksResource($books));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebooksRequest  $request
     * @param  \App\Models\books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(BooksRequest $request, books $books)
    {
      $validator = Validate::make($request->all(), [
        'name'=>'required | string',
        'description'=>'required | string',
        'year_published'=>'required | integer',
      ]);

      if($validator->fails()){
        return response()->json($validator->errors());
      }

      $book = Books::create([
        $book->name=>$request->name,
        $book->description=>$request->description,
        $book->year_published=>$request->year_published,

      ]);

        return response()->json(['Book updated', new BooksResource($book)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(books $books)
    {
        $books->delete();
          return reponse()->json('Delete sucessfull');
    }
}
