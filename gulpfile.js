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
	mix.sass(
		[
			'app.scss',
		],
		'public/css/app.css',
		{
			includePaths: [
				'resources/assets/bower/foundation-sites/scss',
				'resources/assets/bower/motion-ui/src'
			]
		}
	);

	mix.scripts(
		[
			'bower/jquery/dist/jquery.js',
			'bower/what-input/what-input.js',
			'bower/foundation-sites/dist/foundation.js',
			'js/global.js'
		],
		'public/js/app.js',
		'resources/assets'
	);
});
