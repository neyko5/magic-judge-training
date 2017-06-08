<?php

namespace MagicJudgeTraining\Http\Controllers;

use Illuminate\Http\Request;
use MagicJudgeTraining\Lesson;
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
        $lessons = Lesson::all();
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
        return view('lessons/create',['item' => $lesson]);
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
        return view('lessons/show', ['item' => $lesson]);
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
        return view('lessons/edit', ['item' => $lesson]);
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
