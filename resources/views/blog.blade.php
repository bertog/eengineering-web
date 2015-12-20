@extends('layouts.master')

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