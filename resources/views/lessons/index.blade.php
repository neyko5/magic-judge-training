@extends('layouts.app')

@section('content')
    @if(Auth::check())
    {{link_to_route('lessons.create', "Create new lesson")}}
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Title</td>
                @if(Auth::check())
                <th>Order</td>
                <th>Options</td>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $lesson)
            <tr>
                <td>{{link_to_route('lessons.show', $lesson->title, [$lesson->id])}}</td>
                @if(Auth::check())
                <td>{{$lesson->order}}</td>
                <td>
                    {{link_to_route('lessons.edit', "Edit", [$lesson->id], ["class"=> "btn btn-primary"])}}
                    {{Form::model($lesson, ['route' => ['lessons.destroy', $lesson->id], 'method' => 'DELETE'])}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {{Form::close()}}
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection