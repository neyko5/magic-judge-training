@extends('layouts.app')

@section('content')
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
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection