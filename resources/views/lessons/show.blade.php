@extends('layouts.app')

@section('content')
    <title>{{$item->title}}</title>
    <article>{{$item->description}}</article>
@endsection