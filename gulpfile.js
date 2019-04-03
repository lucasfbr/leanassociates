const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

elixir((mix) => {

    //mix.webpack('./resources/assets/site/js/app.js', 'public/js/app.js');
    mix.webpack('./resources/assets/site/js/index.js', 'public/js/index.js')
       .webpack('./resources/assets/admin/js/login.js', 'public/admin/js/login.js')
       .webpack('./resources/assets/admin/js/register.js', 'public/admin/js/register.js')
       .webpack('./resources/assets/admin/js/email.js', 'public/admin/js/email.js')
       .webpack('./resources/assets/admin/js/resetpassword.js', 'public/admin/js/resetpassword.js');

    mix.copy([
       './node_modules/@fortawesome/fontawesome-free/webfonts'
    ], 'public/fonts');

    mix.styles([
        './node_modules/@fortawesome/fontawesome-free/css/fontawesome.css',
        './node_modules/startbootstrap-scrolling-nav/vendor/bootstrap/css/bootstrap.min.css',
        './node_modules/startbootstrap-scrolling-nav/css/scrolling-nav.css',
        './resources/assets/site/css/style-pagina.css',
    ],'public/css/styles.css');

    mix.scripts([
        './node_modules/@fortawesome/fontawesome-free/js/all.js',
        './node_modules/startbootstrap-scrolling-nav/vendor/jquery/jquery.min.js',
        './node_modules/startbootstrap-scrolling-nav/vendor/jquery-easing/jquery.easing.min.js',
        './node_modules/startbootstrap-scrolling-nav/js/scrolling-nav.js'
    ],'public/js/scripts.js');

    /* CSS ADMIN */
    mix.styles([
        './node_modules/bootstrap/dist/css/bootstrap.min.css',
        './resources/assets/admin/css/style-pagina.css',
    ],'public/admin/css/styles.css');

    /* JS ADMIN */
    mix.scripts([
        './node_modules/jquery/dist/jquery.slim.js',
        './node_modules/bootstrap/dist/js/bootstrap.min.js',
    ],'public/admin/js/scripts.js');

});
