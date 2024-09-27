<?php

namespace App\Http\Controllers;

use App\Models\Executive;
use Illuminate\Http\Request;

class ExecutiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $executives = Executive::all();
        return view('executives.index', compact('executives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'phone' => 'required',
            'address' => 'required',
            'position' => 'required',
            'state' => 'required',
        ]);

        try {
            $image = $request->file('photo');
            $imagePath = $image->store('public/images');
            $imageName = basename($imagePath);

            Executive::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'photo' => $imageName,
                'phone' => $request->phone,
                'address' => $request->address,
                'position' => $request->position,
                'state' => $request->state,
            ]);

            $executives = Executive::all();
            return response()->json([
                'executives' => $executives
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $executive = Executive::find($id);
        return response()->json([
            'executive' => $executive
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validate = $request->validate([
            'idModalEdit' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'position' => 'required',
            'state' => 'required',
        ]);

        $executive = Executive::find($request->idModalEdit);
        $executive->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'address' => $request->address,
            'position' => $request->position,
            'state' => $request->state,
        ]);
        $executives = Executive::all();
        return response()->json([
            'executives' => $executives
        ]);
        try {
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
