<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $profilies=Profile::all();
        return response()->json($profilies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedProfile = $request->validated([
            'user_id' => 'required',
            'bio' => 'required',
            'twitter' => 'required',
            'github' => 'required',
        ]);
        $profile = Profile::create($validatedProfile);
        return response()->json($profile);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        return response()->json($profile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validatedProfile = $request->validated([
            'user_id' => 'required',
            'bio' => 'required',
            'twitter' => 'required',
            'github' => 'required',
        ]);

        $profile = Profile :: findOrfail($id);
        $profile->update($validatedProfile);
        return response()->json($profile);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Profile::destroy($id);
        return response()->json(null,204);

    }
}
