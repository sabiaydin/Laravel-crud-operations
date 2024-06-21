<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $validatedRole = $request->validated([
      'name' => 'required|string|max:255'
      ]);

      $role = Role::create( $validatedRole);
      return response()->json($role);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        return response()->json($role);
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validatedRole = $request->validated([
            'name' => 'required|string|max:255'
            ]);
            $role = Role::findOrFail($id);
            $role->update( $validatedRole);
            return response()->json($role);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      Role::destroy($id);
      return response()->json(null,204);
    }
}
