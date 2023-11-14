<?php

namespace App\Http\Controllers;

use App\Models\FarmSchedule;
use Illuminate\Http\Request;

class FarmScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    return view('Features.farmschedule');
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
    public function show(FarmSchedule $farmSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FarmSchedule $farmSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FarmSchedule $farmSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FarmSchedule $farmSchedule)
    {
        //
    }
}
