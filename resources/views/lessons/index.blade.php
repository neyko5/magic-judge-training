@extends('layouts.app')

@section('content')
    {{link_to_route('lessons.create', "Create new lesson")}}
    <table>
        <thead>
            <tr>
                <th>Title</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $lesson)
            <tr>
                <td>{{link_to_route('lessons.show', $lesson->title, [$lesson->id])}}</td>
                <td>{{link_to_route('lessons.edit', "Edit", [$lesson->id])}}</td>
                <td>
                    {{Form::model($lesson, ['route' => ['lessons.destroy', $lesson->id], 'method' => 'DELETE'])}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {{Form::close()}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection