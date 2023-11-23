<?php

namespace App\Http\Controllers;

use App\Models\CoffeeInventory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CoffeeInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('Features.coffeeinventory');
    }

    public function redirectTo($request)
    {
        return route('login');
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
    public function show(CoffeeInventory $coffeeInventory): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CoffeeInventory $coffeeInventory): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CoffeeInventory $coffeeInventory): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CoffeeInventory $coffeeInventory): void
    {
        //
    }
}
