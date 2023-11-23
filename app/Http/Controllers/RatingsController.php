<?php

namespace App\Http\Controllers;

use App\Models\Ratings;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RatingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('Features.ratings');
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
    public function show(Ratings $ratings): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ratings $ratings): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ratings $ratings): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ratings $ratings): void
    {
        //
    }
}
