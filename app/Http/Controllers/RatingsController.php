<?php

namespace App\Http\Controllers;

use App\Models\Ratings;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Features.ratings');
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
    public function show(Ratings $ratings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ratings $ratings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ratings $ratings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ratings $ratings)
    {
        //
    }
}