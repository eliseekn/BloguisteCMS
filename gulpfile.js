//automatisation des tâches de compilation et minimisation 
const gulp = require('gulp');
const uglify = require('gulp-uglify');
const uglifycss = require('gulp-uglifycss');
const rename = require('gulp-rename');
const sass = require('gulp-sass');
sass.compiler = require('node-sass');

//compilation sass à css
gulp.task('sass', () => {
	return gulp.src('public/assets/css/src/*.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(gulp.dest('public/assets/css/src/')
	);
});

//minification des fichiers css
gulp.task('uglifycss', () => {
  	return gulp.src('public/assets/css/src/*.css')
		.pipe(uglifycss({
			"maxLineLen": 80,
			"uglyComments": true
		  }))
		.pipe(rename({extname: '.min.css'}))
		.pipe(gulp.dest('public/assets/css/dist/')
	);
});

//minification des fichiers javascipt
gulp.task('uglifyjs', () => {
	return gulp.src('public/assets/js/src/*.js')
		.pipe(uglify())
		.pipe(rename({extname: '.min.js'}))
		.pipe(gulp.dest('public/assets/js/dist/')
	);
});

//exécution automatique des tâches
gulp.task('default', () => {
	gulp.watch('public/assets/css/src/*.scss', ['sass']);
	gulp.watch('public/assets/css/src/*.css', ['uglifycss']);
	gulp.watch('public/assets/js/src/*.js', ['uglifyjs']);
});