@extends('layouts.app')

@section('content')
     <section id="content-region-3" class="padding-40 page-tree-bg">
        <div class="container">
            <h3 class="page-tree-text">
                @if($item->id)
                Edit tag <b>{{$item->title}}</b>
                @else 
                Create new tag
                @endif
            </h3>
        </div>
    </section><!--page-tree end here-->
    <div class="space-40"></div>
    <div class="container">
        <div class="comment-form-wrapper">
            {{Form::model($item, ['route' => [$item->id ? 'tags.update' : 'tags.store' , $item->id], 'method' => $item->id ? 'PUT' : 'POST'])}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Title" value="{{$item->title}}" />
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            {{Form::close()}}
        </div>
    </div>
@endsection
