<?php

namespace App\Http\Controllers;

use App\Models\Shopping;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('Features.shopping');
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
    public function show(Shopping $shopping): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shopping $shopping): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shopping $shopping): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shopping $shopping): void
    {
        //
    }
}
