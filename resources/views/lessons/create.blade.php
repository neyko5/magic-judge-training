@extends('layouts.app')

@section('content')
    <h2>Create new lesson</div>
    {{Form::model($item, ['route' => ['lessons.store'], 'method' => 'POST'])}}
        <input type="text" name="title" value=""/>
        <textarea name="description"></textarea>
        <input type="number" name="order" value=""/>
        <button type="submit">Submit</button>
    {{Form::close()}}
@endsection