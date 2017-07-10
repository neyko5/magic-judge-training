@extends('layouts.app')

@section('content')
     <section id="content-region-3" class="padding-40 page-tree-bg">
        <div class="container">
            <h3 class="page-tree-text">
                @if($item->id)
                Edit static page <b>{{$item->title}}</b>
                @else 
                Create new static page
                @endif
            </h3>
        </div>
    </section><!--page-tree end here-->
    <div class="space-40"></div>
    <div class="container">
        <div class="comment-form-wrapper">
            {{Form::model($item, ['route' => [$item->id ? 'pages.update' : 'pages.store' , $item->id], 'method' => $item->id ? 'PUT' : 'POST'])}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Title" value="{{$item->title}}" />
                </div>
                <div class="form-group">
                    <label for="title">Page content</label>
                    <textarea name="description" placeholder="Page content" class="form-control auto-height editor">{{$item->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="title">Order</label>
                    <input type="number" name="order" class="form-control" placeholder="Order" value="{{$item->order}}" />
                </div>
                <div class="form-group">
                    <label for="user_id">Question creator</label>
                    {{ Form::select('user_id', $users, Input::old('user_id'), ["class" => "form-control"]) }}
                </div>
                <div class="form-group">
                    <label for="published">Published</label>
                    {{ Form::checkbox('published', Input::old('published'), ["class" => "form-control"]) }}
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            {{Form::close()}}
        </div>
    </div>
@endsection

@section('javascript')
<script>
    var editor = new MediumEditor('textarea', {
        anchor: {
            linkValidation: true,
            targetCheckbox: true,
            targetCheckboxText: 'Open in new window'
        }
    });
</script>   
@endsection