<?php

namespace App\Http\Controllers;

use App\Models\GrowCoffee;
use Illuminate\Http\Request;

class GrowCoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Features.growcoffee');
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
    public function show(GrowCoffee $growCoffee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GrowCoffee $growCoffee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GrowCoffee $growCoffee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GrowCoffee $growCoffee)
    {
        //
    }
}
