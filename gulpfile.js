var elixir = require('laravel-elixir');

require('laravel-elixir-stylus');
require('laravel-elixir-vueify');

elixir(function(mix) {
    mix.stylus('app.styl')
       .sass('backoffice.scss')
       .browserify('main.js')
        .scripts([
            'libs/sweetalert.min.js'
        ], 'public/js/libs.js')
        .styles([
            'libs/sweetalert.css'
        ], 'public/css/libs.css');
});

