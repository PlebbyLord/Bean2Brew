<?php

namespace App\Http\Controllers;

use App\Models\LocationMapping;
use Illuminate\Http\Request;

class LocationMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Features.locationmapping');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LocationMapping $locationMapping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LocationMapping $locationMapping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LocationMapping $locationMapping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LocationMapping $locationMapping)
    {
        //
    }
}
