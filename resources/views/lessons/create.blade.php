@extends('layouts.app')

@section('content')
    <h2>Create new lesson</h2>
    {{Form::model($item, ['route' => ['lessons.store'], 'method' => 'POST'])}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" />
        </div>
        <div class="form-group">
            <label for="title">Question content</label>
            <textarea name="description" placeholder="Lesson content" class="form-control auto-height"></textarea>
        </div>
        <div class="form-group">
            <label for="order">Order</label>
            <input type="number" name="order" class="form-control" placeholder="Order">
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