'use strict';

// Generic
const gulp			= require( 'gulp' );
const concat		= require( 'gulp-concat' );
const browsers		= [ 'last 4 version', '> 1%', 'ie 9', 'ie 10' ];

// Stylesheets
const sass			= require( 'gulp-sass' );
const autoprefixer	= require( 'gulp-autoprefixer' );

// Javascripts
const babel			= require( 'gulp-babel' );
const minify		= require( 'gulp-babel-minify' );

// Paths
const source	= './resources';
const build		= './public';
const npm		= './node_modules';

// File router
const paths = {
	input: {
		javascripts: {
			'app.js': [ `${source}/js/**/*.js` ]
		},
		stylesheets: {
			'app.css': [ `${source}/sass/**/*.scss` ]
		}
	},
	output: {
		javascripts: `${build}/js/`,
		stylesheets: `${build}/css/`,
	}
}

/* Processes
-------------------------------------------------------- */

//
// Process javascript
//
gulp.task( 'javascripts', function() {

	let promises = [];

	for ( var key in paths.input.javascripts ) {
		let action = gulp.src( paths.input.javascripts[ key ] )

			// Combile into single file
			.pipe( concat( key ) )
			.on( 'error', console.error.bind( console ) )

			// Minify file
			.pipe( minify() )

			// Save to file
			.pipe( gulp.dest( paths.output.javascripts ) );

		promises.push( action );
	}

	return Promise.all( promises );
} );

//
// Process stylesheets
//
gulp.task( 'stylesheets', function() {

	let promises = [];

	for ( var key in paths.input.stylesheets ) {
		let action = gulp.src( paths.input.stylesheets[ key ] )

			// Combile into single file
			.pipe( concat( key ) )
			.on( 'error', console.error.bind( console ) )

			// Compile Sass to CSS
			.pipe( sass( {
				outputStyle: 'compressed'
			} ).on( 'error', sass.logError ) )

			// Prefix for browser support
			.pipe( autoprefixer( {
				browsers: browsers
			} ) )

			// Save to file
			.pipe( gulp.dest( paths.output.stylesheets ) );

		promises.push( action );
	}

	return Promise.all( promises );
} );

/* Task: File watching and local hosting
-------------------------------------------------------- */
gulp.task( 'watch', [ 'default' ], function() {

	for ( var key in paths.input.stylesheets ) {
		gulp.watch( paths.input.stylesheets[ key ], [ 'stylesheets' ] );
	}

	for ( var key in paths.input.javascripts ) {
		gulp.watch( paths.input.javascripts[ key ], [ 'javascripts' ] );
	}

} );

/* Task: Gulp default build task
-------------------------------------------------------- */
gulp.task( 'default', [ 'stylesheets', 'javascripts' ] );

