@extends('layouts.app')

@section('content')
    <h2>Edit page <b>{{$item->title}}</b></h2>
    {{Form::model($item, ['route' => ['pages.update', $item->id], 'method' => 'PUT'])}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{$item->title}}" placeholder="Title" />
        </div>
        <div class="form-group">
            <label for="title">Page content</label>
            <textarea name="description" placeholder="Question content" class="form-control auto-height">{{$item->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="title">Order inside menu</label>
            <input type="text" name="order" class="form-control" placeholder="Order" value="{{$item->order}}">
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