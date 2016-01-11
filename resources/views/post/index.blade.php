@extends('layouts.master')

@section('aside')
    <aside>
        <ul>
            <li><a href="/"><i class="fa fa-home fa-2x"></i></a></li>
            <li><a href="/about"><i class="fa fa-users fa-2x"></i></a></li>
            <li><a href="/contacts"><i class="fa fa-map-marker fa-2x"></i></a></li>
            <li><a href="/brands"><i class="fa fa-product-hunt fa-2x"></i></a></li>
            <li><a href="/post"><i class="fa fa-clipboard fa-2x"></i></a></li>
        </ul>
    </aside>
@stop

@section('content')
    <h1>elenco articoli</h1>
    <div class="blog">
        <p>In questa pagina troverete una serie di articoli. 
           Questi articoli contengono consigli tecnici che vi aiuterrano a conoscere, 
           capire e sfruttare al meglio i vostri strumenti musicali :)</p>
        <div class="blog__index">
            <ul>
                @foreach($posts as $post)
                    <li>
                        <a href="/post/{{ $post->slug }}">{{ $post->title }}</a>
                        <img src="/images/blog/{{ $post->header_image }}" alt="">
                    </li>
                @endforeach
            </ul>
        </div>

    </div>

@stop