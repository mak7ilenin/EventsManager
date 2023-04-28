<?php

namespace App\Http\Controllers;

use App\Models\RegisterEvents;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $register_events = RegisterEvents::orderBy('updated_at', 'ASC')->get();
        return view('register.index', compact('register_events'));
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
    public function show(RegisterEvents $registerEvents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegisterEvents $registerEvents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegisterEvents $registerEvents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegisterEvents $registerEvents)
    {
        //
    }
}
