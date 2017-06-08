@extends('layouts.app')

@section('content')
    <h2>{{$item->title}}</h2>
    <article>{!! $item->description !!}</article>
    <ul>
       @foreach ($item->questions as $question)
       <li>{{$question->title}}</li>
       @endforeach
    </ul>

@endsection