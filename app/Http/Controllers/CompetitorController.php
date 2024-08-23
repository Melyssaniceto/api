<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competitor;

class CompetitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competitor = Competitor::all();
        return response()->json($competitor);
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
            "team" => "nullable|string",
            ]);

            $competitor = Competitor::create($validatedData);

            return response()->json($competitor, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $competitor = Competitor::find($id);

        if(!$competitor){
          return response() -> json(["message" => "Competitor not found"], 404);
            }
            return response()->json($competitor);
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
        $competitor = Competitor::find($id);

        if(!$competitor){
          return response() -> json(["message" => "competitor not found"], 404);
            }

            $validatedData = $request->validate([
                "name" => "required|string|max:255",
                "age" => "nullable|string",
                "height" => "nullable|string",
                "weight" => "nullable|string",
                "CPF" => "nullable|string",
                "RG" => "nullable|string",
                ]);

                $competitor->update($validatedData);

                return response()->json($competitor, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $competitor = Competitor::find($id);

        if(!$competitor){
            return response() -> json(["message"=> "Competitor not found"],404);
    }
    
        $competitor->delete();

           return response() -> json(["message"=> "Competitor delete sucessfully"],200);
    }
}
