//automatisation des tâches de compilation et minimisation 
const gulp = require('gulp');
const uglify = require('gulp-uglify');
const uglifycss = require('gulp-uglifycss');
const rename = require('gulp-rename');
const sass = require('gulp-sass');
sass.compiler = require('node-sass');

//compilation sass à css
gulp.task('sass', () => {
	return gulp.src('layout/assets/css/src/*.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(gulp.dest('layout/assets/css/src/')
	);
});

//minification des fichiers css
gulp.task('uglifycss', () => {
  	return gulp.src('layout/assets/css/src/*.css')
		.pipe(uglifycss({
			"maxLineLen": 80,
			"uglyComments": true
		  }))
		.pipe(rename({extname: '.min.css'}))
		.pipe(gulp.dest('layout/assets/css/dist/')
	);
});

//minification des fichiers javascipt
gulp.task('uglifyjs', () => {
	return gulp.src('layout/assets/js/src/*.js')
		.pipe(uglify())
		.pipe(rename({extname: '.min.js'}))
		.pipe(gulp.dest('layout/assets/js/dist/')
	);
});

//exécution automatique des tâches
gulp.task('default', () => {
	gulp.watch('layout/assets/css/src/*.scss', ['sass']);
	gulp.watch('layout/assets/css/src/*.css', ['uglifycss']);
	gulp.watch('layout/assets/js/src/*.js', ['uglifyjs']);
});