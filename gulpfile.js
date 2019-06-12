var elixir = require('laravel-elixir');

elixir.config.css.sass.pluginOptions.includePaths = [
    'node_modules/bootstrap-sass/assets/stylesheets'
];

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
    // Fonts
    mix.copy('node_modules/bootstrap-sass/assets/fonts', elixir.config.publicPath + '/fonts');

    // jQuery, Bootstrap
    mix.copy('node_modules/jquery/dist/jquery.min.js', elixir.config.assetsPath + '/js/jquery.js');
    mix.copy('resources/assets/js/bootstrap.js', elixir.config.assetsPath + '/js/bootstrap.js');

    // DateTime picker
    mix.copy('node_modules/moment/min/moment-with-locales.min.js', elixir.config.assetsPath + '/js/moment.js');
    mix.copy('node_modules/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js', elixir.config.assetsPath + '/js/datepicker.js');
    mix.copy('node_modules/eonasdan-bootstrap-datetimepicker/src/sass/_bootstrap-datetimepicker.scss', elixir.config.assetsPath + '/sass/datepicker.scss');

    // Fancybox
    mix.copy('node_modules/fancybox/dist/js/jquery.fancybox.pack.js', elixir.config.assetsPath + '/js/fancybox.js');

    mix.scripts([
        'jquery.js', 'bootstrap.js'
    ], elixir.config.publicPath + '/js/main.js');

    mix.scripts([
        'jquery.js', 'fancybox.js'
    ], elixir.config.publicPath + '/js/gallery.js');

    mix.scripts([
        'moment.js', 'datepicker.js'
    ], elixir.config.publicPath + '/js/reservation.js');

    mix.scripts(['fullcalendar.js'], elixir.config.publicPath + '/js/fullcalendar.min.js');

    mix.sass('main.scss');
    mix.sass('fancybox.scss');

    mix.version('css/main.css');
    //mix.version('js/main.js');
});
