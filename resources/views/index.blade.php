@extends('layouts.app')

@section('content')
    <div class="space-50"></div>
    <div class="container">
        <div class="row intro-row">
            <div class="col-md-12 text-center wow animated fadeInUp">
                <h2>Magic judge training</h2>
                <h3 class="subtitle">Everything you need to become L2</h3>
                <p>{!! $page->description !!}</p>
            </div>
        </div>
    </div>
    
@endsection