@extends('layouts.dashboard')

@section('script.header')
    <script src="//cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
@stop

@section('content')
<div class="container">
	<h1>Inserisci un nuovo Post</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/post" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="title">Titolo:</label>
            <input type="text"
                   name="title"
                   id="title"
                   value="{{ old('title') }}"
                   class="form-control"
            >
        </div>
        <div class="form-group">
            <label for="body">Testo:</label>
            <textarea name="body"
                      id="body"
                      cols="30" rows="10"
                      value="{{ old('body') }}"
                      class="form-control"
                      >
            </textarea>
        </div>
        <div class="form-group">
            <label for="image">Foto (testata):</label>
            <input type="file"
                   name="image"
                   id="file"
                   class="form-control"
            >
        </div>
        <div class="form-group">
            <label for="published">Data Pubblicazione:</label>
            <input type="date"
                   name="published"
                   id="published"
                   value="{{ old('published') }}"
                   class="form-control"
            >
        </div>
        <div class="form-group">
        	<input type="submit" 
        		   value="Salva"
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

