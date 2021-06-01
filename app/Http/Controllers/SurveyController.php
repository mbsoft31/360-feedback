<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class SurveyController extends Controller
{
    /**
     * Display a listing of the surveys.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        return view("survey.index", [
            "surveys" => Survey::paginate(2),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view("survey.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $inputs = $this->validate($request, [
            'title' => ['required', 'string', 'min:3', 'unique:surveys,title'],
            'description' => ['nullable', 'string', 'max:190'],
            'meta' => ['nullable', 'array'],
        ]);

        $survey = Survey::create($inputs);

        session()->flash('flash.bannerStyle', 'success');
        session()->flash('flash.banner', __('Survey created successfully'));

        return redirect()->route('survey.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Survey $survey
     * @return Application|Factory|View|Response
     */
    public function edit(Survey $survey)
    {
        return view("survey.edit", [
            "survey" => $survey,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Survey $survey
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Survey $survey)
    {
        $inputs = $this->validate($request, [
            'title' => ['required', 'string', 'min:3'],
            'description' => ['nullable', 'string', "max:190"],
            'meta' => ['nullable', 'array'],
        ]);

        $survey->title = $inputs["title"];
        $survey->description = $inputs["description"];

        if (isset($inputs["meta"])) {
            $survey->meta = $inputs["meta"];
        }

        $survey->save();

        session()->flash('flash.bannerStyle', 'success');
        session()->flash('flash.banner', __('Survey updated successfully'));

        return redirect()->route('survey.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Survey $survey
     * @return RedirectResponse
     */
    public function destroy(Survey $survey)
    {

        $survey->delete();

        session()->flash('flash.bannerStyle', 'success');
        session()->flash('flash.banner', __('Survey deleted successfully'));

        return redirect()->route('survey.index');
    }
}
