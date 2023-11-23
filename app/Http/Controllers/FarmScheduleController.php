<?php

namespace App\Http\Controllers;

use App\Models\FarmSchedule;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FarmScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
{
    return view('Features.farmschedule');
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
    public function show(FarmSchedule $farmSchedule): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FarmSchedule $farmSchedule): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FarmSchedule $farmSchedule): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FarmSchedule $farmSchedule): void
    {
        //
    }
}
