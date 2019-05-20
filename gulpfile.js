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

   /* mix.copy([
       './node_modules/@fortawesome/fontawesome-free/webfonts'
    ], 'public/fonts');*/

    mix.styles([
        './node_modules/@fortawesome/fontawesome-free/css/fontawesome.css',
        './node_modules/startbootstrap-scrolling-nav/vendor/bootstrap/css/bootstrap.min.css',
        './node_modules/startbootstrap-scrolling-nav/css/scrolling-nav.css',
        './resources/assets/site/css/style-pagina.css',
    ],'public/css/styles.css');

    mix.scripts([
        './node_modules/@fortawesome/fontawesome-free/js/all.js',
        './node_modules/startbootstrap-scrolling-nav/vendor/jquery/jquery.min.js',
        './node_modules/startbootstrap-scrolling-nav/vendor/bootstrap/js/bootstrap.bundle.min.js',
        './node_modules/startbootstrap-scrolling-nav/vendor/jquery-easing/jquery.easing.min.js',
        './node_modules/startbootstrap-scrolling-nav/js/scrolling-nav.js'
    ],'public/js/scripts.js');

    /* COPY ADMIN */
   /* mix.copy([
       './node_modules/startbootstrap-sb-admin/vendor/fontawesome-free/webfonts'
    ], 'public/admin/fonts');

    mix.copy([
        './node_modules/ckeditor'
    ], 'public/admin/ckeditor');

    mix.copy([
        './node_modules/bootstrap-datepicker/locales'
    ], 'public/admin/locales/bootstrap-datepicker.pt-BR.min.js');*/

    /* CSS ADMIN */
    mix.styles([
        './node_modules/startbootstrap-sb-admin/vendor/fontawesome-free/css/fontawesome.min.css',
        './node_modules/startbootstrap-sb-admin/vendor/datatables/dataTables.bootstrap4.css',
        './node_modules/startbootstrap-sb-admin/css/sb-admin.css',
        './node_modules/bootstrap-datepicker/css/bootstrap-datepicker.css',
        './resources/assets/admin/css/style-pagina.css',
    ],'public/admin/css/styles.css');

    /* JS ADMIN */
    mix.scripts([
        './node_modules/startbootstrap-sb-admin/vendor/fontawesome-free/js/all.js',
        './node_modules/startbootstrap-sb-admin/vendor/jquery/jquery.min.js',
        './node_modules/startbootstrap-sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js',
        './node_modules/startbootstrap-sb-admin/vendor/jquery-easing/jquery.easing.min.js',
        './node_modules/startbootstrap-sb-admin/js/sb-admin.min.js',
        './node_modules/inputmask/dist/jquery.inputmask.bundle.js',
        './node_modules/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
        './resources/assets/admin/js/principal.js',
    ],'public/admin/js/scripts.js');

    /*mix.scripts([
        './resources/assets/admin/js/scripts.js',
    ],'public/admin/js/script_default.js');

     mix.scripts([
        './resources/assets/admin/js/mask.js',
    ],'public/admin/js/mask.js');*/


    

});
