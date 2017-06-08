@extends('layouts.app')

@section('content')
    <h2>Edit lesson {{$item->title}}</div>
    {{Form::model($item, ['route' => ['questions.update', $item->id], 'method' => 'PUT'])}}
        <input type="text" name="title" value="{{$item->title}}"/>
        <textarea name="description">{{$item->description}}</textarea>
        <input type="number" name="order" value="{{$item->order}}"/>
        {{ Form::select('lesson_id', $lessons, Input::old('lesson_id'))) }}
        {{ Form::select('user_id', $users, Input::old('user_id'))) }}
        <button type="submit">Submit</button>
    {{Form::close()}}
@endsection