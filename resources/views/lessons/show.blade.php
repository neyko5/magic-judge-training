@extends('layouts.app')

@section('content')
    <section id="content-region-3" class="padding-40 page-tree-bg">
        <div class="container">
            <h3 class="page-tree-text">Lesson</h3>
        </div>
    </section>
    <div class="space-70"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-post-section">
                    <div class="blog-post-header">
                        <h3><a href="" class="hover-color">{{$item->title}}</a></h3>
                    </div>
                    <div class="blog-post-info">
                        <span><a href="#" class="hover-color">by {{$item->user->name}}</a> | last edit on {{$item->updated_at->format('l jS \\of F Y')}}</span>
                    </div>
                    <div class="blog-post-detail">
                        {!! $item->description !!}
                        <hr>
                        @foreach ($item->questions as $question)
                        <div class="question price-faq-box" >
                            <h3>{{$question->order}}. {{$question->title}}</h3>
                            <p>{!! $question->description !!}</p>
                            @if(Auth::check())
                            <div class="answer">
                                <div class="well"><em>{!! $question->answer !!}</em></div>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div><!--blog post section end-->
            </div><!--blog content-->
            <div class="col-md-4">
                <div class="sidebar-box">
                    <h4>Other lessons</h4>
                    <ul class="cat-list">
                        @foreach($lessons as $otherLesson)
                        <li class="nav-item">{{link_to_route('lessons.show', $otherLesson->title, [$otherLesson->id], ['class' => 'hover-color'])}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div><!--blog full page content end here-->    
    
@endsection