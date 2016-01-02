var elixir = require('laravel-elixir');

require('laravel-elixir-stylus');
require('laravel-elixir-vueify');

elixir(function(mix) {
    mix.stylus('app.styl')
       .sass('backoffice.scss')
       .browserify('main.js')
       .browserify('dashboard.js')
});

