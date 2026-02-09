<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;


class RoleController extends Controller
{
    public function index(Request $request){
        $roles = Role::all();
    }

    public function create(){
        return view('roles.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'description' => 'nullable|string|max:500',
        ]);

        Role::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function show($id){
        $role = Role::findOrFail($id);
        return view('roles.show', compact('role'));
    }

    public function edit($id){
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, $id){
        $role = Role::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'description' => 'nullable|string|max:500',
        ]);

        $role->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy($id){
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }

    
}
