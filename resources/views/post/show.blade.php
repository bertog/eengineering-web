@extends('layouts.master')

@section('aside')
    <aside>
        <ul>
            <li><a href="/"><i class="fa fa-home fa-2x"></i></a></li>
            <li><a href="/#!/about"><i class="fa fa-users fa-2x"></i></a></li>
            <li><a href="/#!/contacts"><i class="fa fa-map-marker fa-2x"></i></a></li>
            <li><a href="/#!/brands"><i class="fa fa-product-hunt fa-2x"></i></a></li>
            <li><a href="/post"><i class="fa fa-clipboard fa-2x"></i></a></li>
        </ul>
    </aside>
@stop

@section('content')
    <div class="blog">
        <div class="blog__header">
            <img src="/images/blog/{{ $post->header_image  }}" alt="Post Header Image">
            <h1>{{ $post->title  }}</h1>
        </div>
        <div class="blog__post">
            {!! $post->body !!}
        </div>
        <div class="blog__footer">
        	<p>
        		Per maggiori informazioni scrivete a 
        		<a href="mailto:info@electronic-engineering.com">info@electronic-engineering.com</a>
        	</p>
        </div>
    </div>
@stop

@section('jscript')
    <script src="/js/main.js"></script>
@stop
