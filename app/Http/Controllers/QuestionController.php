<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class QuestionController extends Controller
{

    public const TYPES = ['mcq', 'scq', 'scale'];
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
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $inputs = $this->validate($request, [
            "text" => ['required', 'string', 'min:3'],
            "type" => ['required', Rule::in(self::TYPES)],
            "meta" => ['nullable', 'array'],
        ]);

        return Question::create($inputs);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Question $question
     * @return bool
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Question $question)
    {
        $input = $this->validate($request, [
            "text" => ['required', 'string', 'min:3'],
            "type" => ['required', Rule::in(self::TYPES)],
            "meta" => ['nullable', 'array'],
        ]);

        $question->text = $input['text'];
        $question->type = $input['type'];

        if ( isset($input['meta']) && ( count($input['meta']) > 0 ) )
            $question->meta = $input['meta'];

        return $question->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        return $question->delete();
    }
}
