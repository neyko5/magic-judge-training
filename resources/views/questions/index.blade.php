@extends('layouts.app')

@section('content')
    {{link_to_route('questions.create', "Create new question")}}
    <table>
        <thead>
            <tr>
                <th>Questions</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $question)
            <tr>
                <td>{{link_to_route('lessons.show', $question->title, [$question->id])}}</td>
                <td>{{link_to_route('lessons.edit', "Edit", [$question->id])}}</td>
                <td>
                    {{Form::model($question, ['route' => ['lessons.destroy', $question->id], 'method' => 'DELETE'])}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {{Form::close()}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection