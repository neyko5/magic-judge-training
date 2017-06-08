@extends('layouts.app')

@section('content')
    <h2>Create new question</div>
    {{Form::model($item, ['route' => ['questions.store'], 'method' => 'POST'])}}
        <input type="text" name="title" value=""/>
        <textarea name="description"></textarea>
        <input type="number" name="order" value=""/>
        {{ Form::select('lesson_id', $lessons) }}
        {{ Form::select('user_id', $users) }}
        <button type="submit">Submit</button>
    {{Form::close()}}
@endsection
