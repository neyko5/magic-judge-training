<?php

namespace MagicJudgeTraining\Http\Controllers;

use Illuminate\Http\Request;
use MagicJudgeTraining\Page;
use MagicJudgeTraining\User;
use Input;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $page = Page::orderBy("order")->get();
        return view('pages/index', ['list' => $page]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = new Page;
        $users = User::all()->pluck('name', 'id');
        return view('pages/edit',['item' => $page, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new Page;
        $page->description = Input::get('description');
        $page->title = Input::get('title');
        $page->order = Input::get('order');
        $page->user_id = Input::get('user_id');
        $page->save();
        return redirect()->action('PageController@show', ['id' => $page->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::find($id);
        $pages = Page::where('id', '<>', $id)->where('title', '<>', 'Index')->get();
        return view('pages/show', ['item' => $page, 'pages' => $pages]);
    }

    public function home()
    {
        $page = Page::where("title", "Index")->first();
        return view('index', ['page' => $page]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        $users = User::all()->pluck('name', 'id');
        return view('pages/edit', ['item' => $page, 'users' => $users]);
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
        $page = Page::findOrFail($id);
        $page->description = Input::get('description');
        $page->title = Input::get('title');
        $page->order = Input::get('order');
        $page->user_id = Input::get('user_id');
        $page->save();
        return redirect()->action('PageController@show', ['id' => $page->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::destroy($id);
        return redirect()->action('PageController@index', []);
    }
}
