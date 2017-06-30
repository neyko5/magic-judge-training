@extends('layouts.app')

@section('content')
    <section id="content-region-3" class="padding-40 page-tree-bg">
        <div class="container">
            <h3 class="page-tree-text">
                Questions index
            </h3>
        </div>
    </section><!--page-tree end here-->
    <div class="space-70"></div>
    <div class="container">
        @if(Auth::check())
        {{link_to_route('questions.create', "Create new question", [], ['class'=> 'button btn theme-btn-color'])}}
        @endif
        <div class="space-70"></div>
        <div class="table-responsive">
            <table class="shopping-cart-table table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Title</td>
                        <th>Lesson</td>
                        @if(Auth::check())
                        <th>Order</td>
                        <th>Options</td>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $question)
                    <tr>
                        <td>{{link_to_route('questions.show', $question->title, [$question->id])}}</td>
                        <td>{{$question->lesson->title}}</td>
                        @if(Auth::check())
                        <td>{{$question->order}}</td>
                        <td>
                            {{link_to_route('questions.edit', "Edit", [$question->id], ["class"=> "btn btn-primary"])}}
                            {{Form::model($question, ['route' => ['questions.destroy', $question->id], 'method' => 'DELETE'])}}
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