@extends('layouts.app')

@section('content')
    <h2>{{$item->title}}</h2>
    <p>{!! $item->description !!}</p>
    
    @foreach ($item->questions as $question)
    <p>{{$question->order}}. {{$question->title}}</p>
    @endforeach
@endsection