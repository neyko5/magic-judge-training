@extends('layouts.app')

@section('content')
    {{link_to_route('questions.create', "Create new question")}}
    <table class="table">
        <thead>
            <tr>
                <th>Title</td>
                <th>Lesson</td>
                <th>Order</td>
                <th>Options</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $question)
            <tr>
                <td>{{link_to_route('questions.show', $question->title, [$question->id])}}</td>
                <td>{{$question->lesson->title}}</td>
                <td>{{$question->order}}</td>
                <td>
                    {{link_to_route('questions.edit', "Edit", [$question->id], ["class"=> "btn btn-primary"])}}
                    {{Form::model($question, ['route' => ['questions.destroy', $question->id], 'method' => 'DELETE'])}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {{Form::close()}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection