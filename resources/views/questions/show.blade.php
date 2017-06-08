@extends('layouts.app')

@section('content')
    <h2>{{$item->title}}</h2>
    <article>{!! $item->description !!}</article>
@endsection