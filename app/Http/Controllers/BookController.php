<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Audit;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Book::all();
        return response()->json(['status'=>true,'message'=>'data was successfully returned','data'=>$data]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'author'=>'required',
            'edited'=>"boolean"
        ]);

        $book = book::create($data);
        return response ()->json(['status'=>true,
        'message'=>'Book created successfully',
        'data'=>$book,], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Book::find($id);
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $data = Book::find($id);
        $data ->update($request->all());
        
        $audit = new Audit();
        $audit->comment = 'test';
        $audit->new_values = $request->all();
        $audit->old_values = $data->getOriginal();
        $audit->event = 'updated';
        $audit->user_id = auth()->id();
        // $audit->comment = "this is hard coded";
        $audit->auditable_id = $data->id;
        $audit->auditable_type = get_class($data);
        $audit->save();
        return response()->json(['status'=>true,"message"=>"record updated successfully ", "data"=>$data], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}