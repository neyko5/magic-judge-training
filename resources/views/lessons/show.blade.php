@extends('layouts.app')

@section('content')
    <h2>{{$item->title}}</h2>
    <p>{!! $item->description !!}</p>
    
    @foreach ($item->questions as $question)
    <div class="question">
        <h4>{{$question->order}}. {{$question->title}}</h4>
        <p>{!! $question->description !!}</p>
        @if(!empty($question->answer))
        <div class="answer">
            <button class="show-answer">Show answer</button>
            <div class="well" style="display:none">{!! $question->answer !!}</div>
        </div>
    </div>
    @endif
    @endforeach
@endsection