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
    	.sass(['main.scss','responsive.scss'],'./public/css/main.css')
        .scripts([
             'libs/jquery.min.js',
             'libs/bootstrap.min.js',
             'libs/vue.min.js',
             'libs/select2.min.js',
             'libs/jquery.magnific-popup.min.js'
          ], './public/js/libs.js')
        .scripts([
             'libs/html5shiv.min.js',
             'libs/respond.min.js',
          ], './public/js/shims.js')
        .scripts([
             'main.js',
          ], './public/js/main.js')
         .styles([
             'libs/bootstrap.min.css',
             'libs/select2.css',
             'libs/magnific-popup.css',
         ], './public/css/libs.css')
         .copy('resources/assets/fonts', 'public/fonts');

});
