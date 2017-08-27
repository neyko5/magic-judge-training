@extends('layouts.app')

@section('content')
    <section id="content-region-3" class="padding-40 page-tree-bg">
        <div class="container">
            <h3 class="page-tree-text">Question</h3>
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
                        <span><span class="hover-color">by {{$item->user->name}}</span> | last edit on {{$item->updated_at->format('l jS \\of F Y')}}</span>
                    </div>
                    <div class="blog-post-detail">
                        {!! $item->description !!}
                        <hr>
                        <div class="question price-faq-box" >
                            <div class="answer">
                                <div class="well"><em>{!! $item->answer !!}</em></div>
                            </div>
                        </div>
                    </div>
                </div><!--blog post section end-->
            </div><!--blog content-->
            <div class="col-md-4">
                <div class="sidebar-box">
                    <h4>Other questions</h4>
                    <ul class="cat-list">
                        @foreach($otherQuestions as $otherQuestion)
                        <li class="nav-item">{{link_to_route('questions.show', $otherQuestion->title, [$otherQuestion->id], ['class' => 'hover-color'])}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div><!--blog full page content end here-->    
    
@endsection