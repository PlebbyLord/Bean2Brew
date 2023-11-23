<?php

namespace App\Http\Controllers;

use App\Models\LocationMapping;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LocationMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('Features.locationmapping');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LocationMapping $locationMapping): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LocationMapping $locationMapping): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LocationMapping $locationMapping): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LocationMapping $locationMapping): void
    {
        //
    }
}
