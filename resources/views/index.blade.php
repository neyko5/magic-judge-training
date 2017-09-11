@extends('layouts.app')

@section('content')
<section id="content-region-3" class="padding-40 page-tree-bg">
        <div class="container">
            <h3 class="page-tree-text">Welcome</h3>
        </div>
    </section>
    <div class="space-70"></div>
    <div class="container">
        <div class="row intro-row">
            <div class="col-md-12 text-center wow animated fadeInUp">
                <h3 class="subtitle">Your path to L2 starts here.</h3>
                <p>{!! $page->description !!}</p>

                <h2>You can try one of our courses:</h2>
                @foreach($lessons as $lesson)
                <div>{{link_to_route('lessons.show', $lesson->title, [$lesson->id], ['class' => 'dropdown-item'])}}</div>
                @endforeach
            </div>
        </div>
    </div>
    
@endsection