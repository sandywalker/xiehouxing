var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
     mix.sass('app.scss','./public/css/app.css')
    	.sass('main.scss','./public/css/main.css')
        .scripts([
             'libs/jquery.min.js',
             'libs/bootstrap.min.js',
          ], './public/js/libs.js')
       
         .styles([
             'libs/bootstrap.min.css'
         ], './public/css/libs.css')
         .copy('resources/assets/fonts', 'public/fonts');

});
