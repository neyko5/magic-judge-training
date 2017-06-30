@extends('layouts.app')

@section('content')
    <section id="content-region-3" class="padding-40 page-tree-bg">
        <div class="container">
            <h3 class="page-tree-text">
                Lessons index
            </h3>
        </div>
    </section><!--page-tree end here-->
    <div class="space-70"></div>
    <div class="container">
        @if(Auth::check())
        {{link_to_route('lessons.create', "Create new lesson", [], ['class'=> 'button btn theme-btn-color'])}}
        @endif
        <div class="space-70"></div>
        <div class="table-responsive">
            <table class="shopping-cart-table table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Title</td>
                        @if(Auth::check())
                        <th>Order</td>
                        <th>Options</td>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $lesson)
                    <tr>
                        <td>{{link_to_route('lessons.show', $lesson->title, [$lesson->id])}}</td>
                        @if(Auth::check())
                        <td>{{$lesson->order}}</td>
                        <td>
                            {{link_to_route('lessons.edit', "Edit", [$lesson->id], ["class"=> "btn btn-primary"])}}
                            {{Form::model($lesson, ['route' => ['lessons.destroy', $lesson->id], 'method' => 'DELETE'])}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {{Form::close()}}
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection