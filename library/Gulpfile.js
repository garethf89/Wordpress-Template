var gulp = require('gulp'),
    del = require('del'),
    sass = require('gulp-sass'),
    postcss = require('gulp-postcss'),
    uglify = require('gulp-uglify'),
    autoprefixer = require('autoprefixer'),
    cssnano = require('cssnano'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    imagemin = require('gulp-imagemin'),
    changed = require('gulp-changed'),
    cache = require('gulp-cached'),
    browserSync = require('browser-sync').create(),
    sequence = require('gulp-sequence'),
    plumber = require('gulp-plumber'),
    notify = require('gulp-notify');

	var data = {
		paths: {
  				root:"",
          build: "build",
  				css:"css",
          css_src: "css",
  				scss:"sscss",
  				js:"build/js",
          js_src:"js",
          js_dest: 'build/js',
  				img:"images",
          img_src:"images/originals",
          bower: "bower_components"
        }
    };

  // plumber error handler to stop things from breaking on errors
	var errorHandler = {
		errorHandler : notify.onError
		(
			{
				title		: "Gulp",
				message		: "Error: <%= error.message %>"
			}
		)
	};

// =============================================================================
// Styles
// =============================================================================

gulp.task('css', function() {

    var processors = [
        autoprefixer({
            browsers: ['last 2 versions']
        }),
        cssnano(),
    ];

    return gulp.src(data.paths.scss + "/style.scss")
        .pipe(plumber(errorHandler))
        .pipe(sass({
            outputStyle: "expanded",
            errLogToConsole: true,
            indentType: 'tab',
            indentWidth: 1
        }))
        .pipe(postcss(processors))
        .pipe(gulp.dest(data.paths.css))
});

// =============================================================================
// Scripts
// =============================================================================

gulp.task('scripts:source', function() {
    return gulp.src(data.paths.js_src + "scripts.js")
        .pipe(plumber(errorHandler))
        .pipe(rename('production.js'))
        .pipe(gulp.dest(data.paths.js_dest))
        .pipe(uglify({
            mangle: false
        }))
        .pipe(rename('production.min.js'))
        .pipe(gulp.dest(data.paths.js_dest))
});
gulp.task('scripts:libraries', function() {
    return gulp.src([
            'bower_components/jquery/dist/jquery.js',
            'bower_components/fastclick/lib/fastclick.js',
            'bower_components/modernizr/modernizr.js',
            'bower_components/Stickyfill/dist/stickyfill.min.js'
        ])
        .pipe(cache('libs'))
        .pipe(concat('libs.js'))
        .pipe(uglify({
            mangle: false
        }))
        .pipe(gulp.dest(data.paths.js_dest))
});

gulp.task('scripts:combine', function() {
  return gulp.src(data.paths.js_dest + '*.js')
      .pipe(concat('production.min.js'))
      .pipe(gulp.dest(data.paths.js))
});

gulp.task('scripts', function(callback) {
   sequence('scripts:libraries', 'scripts:source', 'scripts:combine')(callback)
});

gulp.task('js-watch', ['scripts'], function() {
     browserSync.reload();
});

// =============================================================================
// Images
// =============================================================================

gulp.task('images', function() {
  return gulp.src(data.paths.img_src + '/*')
      .pipe(changed(data.paths.img))
      .pipe(cache(imagemin()))
      .pipe(gulp.dest(data.paths.img))
});

// =============================================================================
// Watching
// =============================================================================

gulp.task('css-watch', ['css'], function() {
     browserSync.reload();
});

gulp.task('watch', function() {

    browserSync.init({
        port: 8888,
        server: {
            baseDir: "." // Change this to your web root dir
        }
    });

    gulp.watch(data.paths.js_src + '/*src/*js', ['js-watch']);
    gulp.watch(data.paths.css_src  + '/**/*.scss', ['css-watch']);
    gulp.watch("*.html").on('change', browserSync.reload);
});

gulp.task('default', sequence('images','css','scripts', 'watch'));
