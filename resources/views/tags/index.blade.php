@extends('layouts.app')

@section('content')
    <section id="content-region-3" class="padding-40 page-tree-bg">
        <div class="container">
            <h3 class="page-tree-text">
                Tags index
            </h3>
        </div>
    </section><!--page-tree end here-->
    <div class="space-70"></div>
    <div class="container">
        @if(Auth::check())
        {{link_to_route('tags.create', "Create new tag", [], ['class'=> 'button btn theme-btn-color'])}}
        @endif
        <div class="space-70"></div>
        <div class="table-responsive">
            <table class="shopping-cart-table table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Title</td>
                        @if(Auth::check())
                        <th>Options</td>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $tag)
                    <tr>
                        <td>{{$tag->title}}</td>
                        @if(Auth::check())
                        <td>
                            {{link_to_route('tags.edit', "Edit", [$tag->id], ["class"=> "btn btn-primary"])}}
                            {{Form::model($tag, ['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE'])}}
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