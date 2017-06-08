@extends('layouts.app')

@section('content')
    <h2>Edit lesson {{$item->title}}</div>
    {{Form::model($item, ['route' => ['lessons.update', $item->id], 'method' => 'PUT'])}}
        <input type="text" name="title" value="{{$item->title}}"/>
        <textarea name="description">{{$item->description}}</textarea>
        <input type="number" name="order" value="{{$item->order}}"/>
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