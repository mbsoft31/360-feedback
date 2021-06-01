<?php

namespace App\Http\Controllers;

use App\Models\SurveyAttempt;
use Illuminate\Http\Request;

class SurveyAttemptController extends Controller
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
        return view("survey-attempt.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SurveyAttempt  $surveyAttempt
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyAttempt $surveyAttempt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SurveyAttempt  $surveyAttempt
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyAttempt $surveyAttempt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SurveyAttempt  $surveyAttempt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurveyAttempt $surveyAttempt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SurveyAttempt  $surveyAttempt
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurveyAttempt $surveyAttempt)
    {
        //
    }
}
