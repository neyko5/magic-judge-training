@extends('layouts.app')

@section('content')
    <h2>{{$item->title}}</h2>
    <p>{!! $item->description !!}</p>
@endsection