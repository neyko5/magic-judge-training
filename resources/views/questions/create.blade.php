@extends('layouts.app')

@section('content')
    <h2>Create new question</h2>
    {{Form::model($item, ['route' => ['questions.store'], 'method' => 'POST'])}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" />
        </div>
        <div class="form-group">
            <label for="title">Question content</label>
            <textarea name="description" placeholder="Question content" class="form-control auto-height"></textarea>
        </div>
        <div class="form-group">
            <label for="answer">Proposed answer</label>
            <textarea name="answer" placeholder="Proposed answer" class="form-control auto-height"></textarea>
        </div>
        <div class="form-group">
            <label for="title">Order inside lesson</label>
            <input type="text" name="order" class="form-control" placeholder="Order">
        </div>
        <div class="form-group">
            <label for="lesson_id">Lesson</label>
            {{ Form::select('lesson_id', $lessons, null, ["class" => "form-control"]) }}
        </div>
        <div class="form-group">
            <label for="user_id">Question creator</label>
            {{ Form::select('user_id', $users, null, ["class" => "form-control"]) }}
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
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