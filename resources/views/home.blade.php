@extends('layouts.master')

@section('aside')
    <aside>
        <ul>
            <li><a v-link="{ path: '/' }"><i class="fa fa-home fa-2x"></i></a></li>
            <li><a v-link="{ path: '/about'}"><i class="fa fa-users fa-2x"></i></a></li>
            <li><a v-link="{ path: '/contacts'}"><i class="fa fa-map-marker fa-2x"></i></a></li>
            <li><a v-link="{ path: '/brands'}"><i class="fa fa-product-hunt fa-2x"></i></a></li>
            <li><a href="/post"><i class="fa fa-clipboard fa-2x"></i></a></li>
            <li><a href="https://www.facebook.com/Centro-Assistenza-Electronic-Engineering-350506121713349/" 
                   target="_blank"><i class="fa fa-facebook fa-2x"></i></a></li>
            @if (Auth::check())
                <li><a href="/dashboard"><i class="fa fa-tachometer fa-lg"></i></a></li>
            @endif
        </ul>
    </aside>
@stop

@section('content')
    <router-view></router-view>
@stop

@section('jscript')
    <script src="js/main.js"></script>
@stop