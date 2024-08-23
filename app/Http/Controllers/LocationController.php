<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $location = Location::all();
        return response()->json($location);
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
            "street" => "required|string|max:255",
            "neighborhood" => "nullable|string",
            "number" => "nullable|string",
            "zip code" => "nullable|string",
            "city" => "nullable|string",
            "state" => "nullable|string",
            "country" => "nullable|string",
            ]);

            $location = Location::create($validatedData);

            return response()->json($location, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $location = Location::find($id);

      if(!$location){
        return response() -> json(["message" => "Location not found"], 404);
          }
          return response()->json($location);

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
        $location = Location::find($id);

        if(!$location){
          return response() -> json(["message" => "location not found"], 404);
            }

            $validatedData = $request->validate([
                "street" => "required|string|max:255",
                "neighborhood" => "nullable|string",
                "number" => "nullable|string",
                "zip code" => "nullable|string",
                "city" => "nullable|string",
                "state" => "nullable|string",
                "country" => "nullable|string",
                ]);

                $location->update($validatedData);

                return response()->json($location, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = Location::find($id);

        if(!$location){
            return response() -> json(["message"=> "Location not found"],404);
    }
    
        $location->delete();

           return response() -> json(["message"=> "Location delete sucessfully"],200);
    }
}
