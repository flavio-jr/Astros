const elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir(function(mix){
    mix.copy('vendor/1fabiosoares/sculptor/css/sculptor.min.css', 'public/css');
    mix.copy('vendor/1fabiosoares/sculptor/css/sculptor.min.css', 'public/css');

    mix.sass([
        'app.scss'
    ], 'public/css');

    mix.sass([
        'welcome.scss'
    ], 'public/css/welcome.css');

    mix.sass([
        'login.scss'
    ], 'public/css/login.css');

    mix.copy('resources/assets/images/cover.jpg', 'public/images');
});
