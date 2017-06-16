@extends('layouts.app')

@section('content')
    <h2>Create new page</h2>
    {{Form::model($item, ['route' => ['pages.store'], 'method' => 'POST'])}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" />
        </div>
        <div class="form-group">
            <label for="title">Page content</label>
            <textarea name="description" placeholder="Question content" class="form-control auto-height"></textarea>
        </div>
        <div class="form-group">
            <label for="title">Order inside menu</label>
            <input type="text" name="order" class="form-control" placeholder="Order">
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