<?php

namespace App\Http\Controllers;

use App\Models\SpeciesIndentifier;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SpeciesIndentifierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('Features.speciesidentifier');
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
    public function show(SpeciesIndentifier $speciesIndentifier): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SpeciesIndentifier $speciesIndentifier): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SpeciesIndentifier $speciesIndentifier): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SpeciesIndentifier $speciesIndentifier): void
    {
        //
    }
}
