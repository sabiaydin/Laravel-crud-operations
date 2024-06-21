<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedUser = $request->validated([
        'name' => 'required',
        'email'=>'required',
        'password'=>'required'
        ]);
        $user=User::create($validatedUser);
        return response()->json($user,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $user = User::findOrFail($id);
       return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validatedUser = $request->validated([
            'name' => 'required',
            'email'=>'required',
            'password'=>'required|min:8'
            ]);
            $user = User::findOrFail($id);
            $user->update($validatedUser);
            return response()->json($user);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(null,204);
    }
}
