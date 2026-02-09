<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('can:manage permissions');
    }

    public function index()
    {
        return view('permissions.index');
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function edit($id)
    {
        return view('permissions.edit', compact('id'));
    }

    public function show($id)
    {
        return view('permissions.show', compact('id'));
    }

    public function assign(Request $request)
    {
        // Logic to assign permissions
        return redirect()->back()->with('success', 'Permissions assigned successfully.');
    }

    
}
