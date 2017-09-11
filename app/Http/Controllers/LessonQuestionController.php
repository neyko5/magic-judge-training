<?php

namespace MagicJudgeTraining\Http\Controllers;

use Illuminate\Http\Request;
use MagicJudgeTraining\LessonQuestion;
use MagicJudgeTraining\Lesson;
use Input;

class LessonQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $question = LessonQuestion::all();
        return view('lesson_questions/index', ['list' => $question]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new LessonQuestion;
        $lessons = Lesson::all()->pluck('title', 'id');
        return view('lesson_questions/edit',['item' => $question, 'lessons' => $lessons]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = new LessonQuestion;
        $question->description = Input::get('description');
        $question->answer = Input::get('answer');
        $question->title = Input::get('title');
        $question->lesson_id = Input::get('lesson_id');
        $question->order = Input::get('order');
        $question->save();
        return redirect()->action('LessonQuestionController@index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = LessonQuestion::find($id);
        $lessons = Lesson::all()->pluck('title', 'id');
        return view('lesson_questions/edit', ['item' => $question, 'lessons' => $lessons]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = LessonQuestion::findOrFail($id);
        $question->description = Input::get('description');
        $question->answer = Input::get('answer');
        $question->title = Input::get('title');
        $question->lesson_id = Input::get('lesson_id');
        $question->order = Input::get('order');
        $question->save();
        return redirect()->action('LessonQuestionController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = LessonQuestion::destroy($id);
        return redirect()->action('LessonQuestionController@index', []);
    }
}
