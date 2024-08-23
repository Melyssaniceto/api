<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coach;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coach = Coach::all();
        return response()->json($coach);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|string|max:255",
            "age" => "nullable|string",
            "height" => "nullable|string",
            "weight" => "nullable|string",
            "sex" => "nullable|string",
            "CPF" => "nullable|string",
            "RG" => "nullable|string",
            ]);

            $coach = Coach::create($validatedData);

            return response()->json($coach, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coach = Coach::find($id);

        if(!$coach){
          return response() -> json(["message" => "Coach not found"], 404);
            }
            return response()->json($coach);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $coach = Coach::find($id);

        if(!$coach){
          return response() -> json(["message" => "coach not found"], 404);
            }

            $validatedData = $request->validate([
                "name" => "required|string|max:255",
                "age" => "nullable|string",
                "height" => "nullable|string",
                "weight" => "nullable|string",
                "sex" => "nullable|string",
                "CPF" => "nullable|string",
                "RG" => "nullable|string",
                "team" => "nullable|string",
                ]);

                $coach->update($validatedData);

                return response()->json($coach, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coach = Coach::find($id);

        if(!$coach){
            return response() -> json(["message"=> "Coach not found"],404);
    }
    
        $coach->delete();

           return response() -> json(["message"=> "Coach delete sucessfully"],200);
    }
}
