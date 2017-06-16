<?php

namespace MagicJudgeTraining\Http\Controllers;

use Illuminate\Http\Request;
use MagicJudgeTraining\Question;
use MagicJudgeTraining\Lesson;
use MagicJudgeTraining\User;
use Input;

class QuestionController extends Controller
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
        $question = Question::all();
        return view('questions/index', ['list' => $question]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question;
        $lessons = Lesson::all()->pluck('title', 'id');
        $users = User::all()->pluck('name', 'id');
        return view('questions/create',['item' => $question, 'lessons' => $lessons, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = new Question;
        $question->description = Input::get('description');
        $question->answer = Input::get('answer');
        $question->title = Input::get('title');
        $question->lesson_id = Input::get('lesson_id');
        $question->user_id = Input::get('user_id');
        $question->order = Input::get('order');
        $question->save();
        return redirect()->action('QuestionController@index', ['id' => $question->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        return view('questions/show', ['item' => $question]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $lessons = Lesson::all()->pluck('title', 'id');
        $users = User::all()->pluck('name', 'id');
        return view('questions/edit', ['item' => $question, 'lessons' => $lessons, 'users' => $users]);
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
        $question = Question::findOrFail($id);
        $question->description = Input::get('description');
        $question->answer = Input::get('answer');
        $question->title = Input::get('title');
        $question->lesson_id = Input::get('lesson_id');
        $question->user_id = Input::get('user_id');
        $question->order = Input::get('order');
        $question->save();
        return redirect()->action('QuestionController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::destroy($id);
        return redirect()->action('QuestionController@index', []);
    }
}
