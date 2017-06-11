@extends('layouts.app')

@section('content')
    <h2>Edit lesson {{$item->title}}</div>
    {{Form::model($item, ['route' => ['lessons.update', $item->id], 'method' => 'PUT'])}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{$item->title}}" />
        </div>
        <div class="form-group">
            <label for="title">Question content</label>
            <textarea name="description" placeholder="Lesson content">{{$item->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="title">Order</label>
            <input type="text" name="title" class="form-control" placeholder="Order" value="{{$item->order}}">
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