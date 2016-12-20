var gulp = require('gulp');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');

//script paths
var jsFiles = ['js/public.js', 'js/public/**/*.js'],
	jsDest  = 'public/assets/js/';


gulp.task('public_js', function() {
	return gulp.src(jsFiles)
		.pipe( concat('public.js') )
		.pipe( gulp.dest(jsDest) )
		.pipe( rename('public.min.js') )
		.pipe( uglify() )
		.pipe( gulp.dest(jsDest) );
});


gulp.task('sass', function () {
	return gulp.src('./sass/**/*.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(gulp.dest('public/assets/css'));
});

gulp.task('sass:watch', function () {
	gulp.watch('./sass/**/*.scss', ['sass']);
});