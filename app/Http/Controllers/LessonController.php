<?php

namespace MagicJudgeTraining\Http\Controllers;

use Illuminate\Http\Request;
use MagicJudgeTraining\Lesson;
use MagicJudgeTraining\User;
use Input;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $lessons = Lesson::orderBy("order")->get();
        return view('lessons/index', ['list' => $lessons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lesson = new Lesson;
        $users = User::all()->pluck('name', 'id');
        return view('lessons/edit',['item' => $lesson, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lesson = new Lesson;
        $lesson->description = Input::get('description');
        $lesson->title = Input::get('title');
        $lesson->order = Input::get('order');
        $lesson->user_id = Input::get('user_id');
        $lesson->save();
        return redirect()->action('LessonController@show', ['id' => $lesson->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);
        $lessons = Lesson::where('id', '<>', $id)->orderBy('order')->get();
        return view('lessons/show', ['item' => $lesson, 'lessons' => $lessons]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = Lesson::find($id);
        $users = User::all()->pluck('name', 'id');
        return view('lessons/edit', ['item' => $lesson, 'users' => $users]);
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
        $lesson = Lesson::findOrFail($id);
        $lesson->description = Input::get('description');
        $lesson->title = Input::get('title');
        $lesson->order = Input::get('order');
        $lesson->user_id = Input::get('user_id');
        $lesson->save();
        return redirect()->action('LessonController@show', ['id' => $lesson->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Lesson::destroy($id);
        return redirect()->action('LessonController@index', []);
    }
}
