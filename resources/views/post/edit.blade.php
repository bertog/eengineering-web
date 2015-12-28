@extends('layouts.app')

@section('script.header')
    <script src="//cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
@stop

@section('content')
<div class="container">
	<h1>Modifica Articolo: {{ $post->title }}</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/post/{{ $post->slug }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="title">Titolo:</label>
            <input type="text"
                   name="title"
                   id="title"
                   value="{{ $post->title }}"
                   class="form-control"
            >
        </div>
        <div class="form-group">
            <label for="body">Testo:</label>
            <textarea name="body"
                      id="body"
                      cols="30" rows="10"
                      class="form-control"
                      >
                      {{ $post->body }}
            </textarea>
        </div>
        <div class="form-group">
            <label for="image">Foto (testata):</label>
            <img src="/images/blog/{{ $post->header_image }}" alt="Foto di Testata Attuale">
            <input type="file"
                   name="image"
                   id="file"
                   class="form-control"
            >
        </div>
        <!-- <div class="form-group">
            <label for="published">Data Pubblicazione:</label>
            <input type="date"
                   name="published"
                   id="published"
                   value="{{ $post->published }}"
                   class="form-control"
            >
        </div> -->
        <div class="form-group">
        	<input type="submit" 
        		   value="Aggiorna"
        		   class="btn btn-primary">
        </div>
    </form>
</div>
@stop

@section('script.footer')
	<script>
		CKEDITOR.replace('body');
	</script>
@stop

