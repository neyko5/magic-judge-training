@extends('layouts.app')

@section('content')
    <section id="content-region-3" class="padding-40 page-tree-bg">
        <div class="container">
            <h3 class="page-tree-text">
                Static pages index
            </h3>
        </div>
    </section><!--page-tree end here-->
    <div class="space-70"></div>
    <div class="container">
        @if(Auth::check())
        {{link_to_route('pages.create', "Create new page", [], ['class'=> 'button btn theme-btn-color'])}}
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
                    @foreach ($list as $page)
                    <tr>
                        <td>{{link_to_route('pages.show', $page->title, [$page->id])}}</td>
                        @if(Auth::check())
                        <td>{{$page->order}}</td>
                        <td>
                            {{link_to_route('pages.edit', "Edit", [$page->id], ["class"=> "btn btn-primary"])}}
                            {{Form::model($page, ['route' => ['pages.destroy', $page->id], 'method' => 'DELETE'])}}
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