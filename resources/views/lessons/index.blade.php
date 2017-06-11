@extends('layouts.app')

@section('content')
    {{link_to_route('lessons.create', "Create new lesson")}}
    <table class="table">
        <thead>
            <tr>
                <th>Title</td>
                <th>Order</td>
                <th>Options</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $lesson)
            <tr>
                <td>{{link_to_route('lessons.show', $lesson->title, [$lesson->id])}}</td>
                <td>{{$lesson->order}}</td>
                <td>
                    {{link_to_route('lessons.edit', "Edit", [$lesson->id], ["class"=> "btn btn-primary"])}}
                    {{Form::model($lesson, ['route' => ['lessons.destroy', $lesson->id], 'method' => 'DELETE'])}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {{Form::close()}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection