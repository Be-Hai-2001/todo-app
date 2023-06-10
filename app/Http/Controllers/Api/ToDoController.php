<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::all();
        return response()->json( $todos, 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description'=> 'required|unique:todos,description,except,id',
        ]);

        $todo = Todo::create($request->all());
        return response()->json($todo , 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $todo)
    {

        return response()->json(Todo::find($todo), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo_tank)
    {
        // $request->validate([
        //     'description'=> 'required|unique:todos,description,except,id',
        // ]);
        // dd($request);
        $todo_tank->update($request->all());
        // dd($todo_tank);
        return response()->json($todo_tank,201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo_tank)
    {
        return response()->json($todo_tank->delete(), 204);
    }
}
