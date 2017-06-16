@extends('layouts.app')

@section('content')
    <h2>{{$item->title}}</h2>
    <p>{!! $item->description !!}</p>
    
    @foreach ($item->questions as $question)
    <div>
    <h4>{{$question->order}}. {{$question->title}}</h4>
    <button class="show-answer">Show answer</div>
    {!! $question->description !!}
    <div class="well" style="display:none">{!! $question->answer !!}</div>
    </div>
    @endforeach
@endsection