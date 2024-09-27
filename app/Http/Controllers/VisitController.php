<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visits = Visit::all();
        return view('visits.index', compact('visits'));
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
            'ci' => 'required',
            'date' => 'required',
            'time' => 'required',
            'phone' => 'required',
            'state' => 'required',
        ]);

        try {

            Visit::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'ci' => $request->ci,
                'date' => $request->date,
                'time' => $request->time,
                'phone' => $request->phone,
                'email' => $request->email ? $request->email : null,
               'location' => $request->location ? $request->location : '',
                'state' => $request->state,
            ]);

            $visits = Visit::all();
            return response()->json([
                'visits' => $visits
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
        $visit = Visit::find($id);
        return response()->json([
            'visit' => $visit
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
            'ci' => 'required',
            'date' => 'required',
            'time' => 'required',
            'phone' => 'required',
            'state' => 'required',
        ]);

        $visit = Visit::find($request->idModalEdit);
        $visit->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'ci' => $request->ci,
            'date' => $request->date,
            'time' => $request->time,
            'phone' => $request->phone,
            'email' => $request->email ? $request->email : null,
           'location' => $request->location ? $request->location : '',
            'state' => $request->state,
        ]);
        $visits = Visit::all();
        return response()->json([
            'visits' => $visits
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
