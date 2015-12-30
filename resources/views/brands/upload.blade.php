@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h3>Carica i loghi dei Marchi</h3>
            <p>Anche più di uno contemporaneamente</p>
            <form action="/api/brands/upload"
                  id="brand_dropzone"
                  class="dropzone">
            </form>
        </div>
    </div>
@stop

