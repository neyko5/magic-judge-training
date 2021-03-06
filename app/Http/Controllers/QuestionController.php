<?php

namespace MagicJudgeTraining\Http\Controllers;

use Illuminate\Http\Request;
use MagicJudgeTraining\Question;
use MagicJudgeTraining\User;
use MagicJudgeTraining\Tag;
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
        $users = User::all()->pluck('name', 'id');
        $tags = Tag::all()->pluck('title', 'id');
        return view('questions/edit',['item' => $question, 'users' => $users, 'tags' => $tags]);
    }

    public function show($id)
    {
        $question = Question::find($id);
        $otherQuestions = Question::where('id', '<>', $id)->get();
        return view('questions/show', ['item' => $question, 'otherQuestions' => $otherQuestions]);
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
        $question->difficulty = Input::get('difficulty');
        $question->user_id = Input::get('user_id');
        
        $question->save();
        if (Input::get('tags')) {
            $question->tags()->sync(array_values(Input::get('tags')));
        } else  {
            $question->tags()->detach();
        }
        return redirect()->action('QuestionController@index');
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
        $users = User::all()->pluck('name', 'id');
        $tags = Tag::all()->pluck('title', 'id');
        return view('questions/edit', ['item' => $question, 'users' => $users, 'tags' => $tags]);
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
        $question->difficulty = Input::get('difficulty');
        $question->user_id = Input::get('user_id');
        if (Input::get('tags')) {
            $question->tags()->sync(array_values(Input::get('tags')));
        } else  {
            $question->tags()->detach();
        }

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
