<?php

namespace App\Http\Controllers;

use App\Models\candidate;
use App\Http\Requests\StorecandidateRequest;
use App\Http\Requests\UpdatecandidateRequest;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecandidateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecandidateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecandidateRequest  $request
     * @param  \App\Models\candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecandidateRequest $request, candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(candidate $candidate)
    {
        //
    }
}
