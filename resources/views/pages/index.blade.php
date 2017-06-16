@extends('layouts.app')

@section('content')
    {{link_to_route('pages.create', "Create new page")}}
    <table class="table">
        <thead>
            <tr>
                <th>Title</td>
                <th>Order</td>
                <th>Options</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $page)
            <tr>
                <td>{{link_to_route('pages.show', $page->title, [$page->id])}}</td>
                <td>{{$page->order}}</td>
                <td>
                    {{link_to_route('pages.edit', "Edit", [$page->id], ["class"=> "btn btn-primary"])}}
                    {{Form::model($page, ['route' => ['pages.destroy', $page->id], 'method' => 'DELETE'])}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {{Form::close()}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection