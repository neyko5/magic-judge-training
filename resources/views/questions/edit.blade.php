@extends('layouts.app')

@section('content')
    <h2>Edit lesson {{$item->title}}</div>
    {{Form::model($item, ['route' => ['questions.update', $item->id], 'method' => 'PUT'])}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{$item->title}}" placeholder="Title" />
        </div>
        <div class="form-group">
            <label for="title">Question content</label>
            <textarea name="description" placeholder="Question content">{{$item->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="title">Order inside lesson</label>
            <input type="text" name="title" class="form-control" placeholder="Order" value="{{$item->order}}">
        </div>
        <div class="form-group">
            <label for="lesson_id">Lesson</label>
            {{ Form::select('lesson_id', $lessons, Input::old('lesson_id'), ["class" => "form-control"]) }}
        </div>
        <div class="form-group">
            <label for="user_id">Question creator</label>
            {{ Form::select('user_id', $users, Input::old('user_id'), ["class" => "form-control"]) }}
        </div>
        <button type="submit">Submit</button>
    {{Form::close()}}
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