@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-offset-2">
                <form action="/login" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="E-mail">E-mail:</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop