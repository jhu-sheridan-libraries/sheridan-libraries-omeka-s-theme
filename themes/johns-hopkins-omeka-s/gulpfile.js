const { series, parallel } = require('gulp');

var gulp = require('gulp');
var plumber = require('gulp-plumber');
var sourcemaps = require('gulp-sourcemaps');

var sass = require('gulp-sass')(require('sass'));
var autoprefixer = require('gulp-autoprefixer');
var csso = require('gulp-csso');

var terser = require('gulp-terser');
var concat = require('gulp-concat');

function styles() {
    return gulp
    .src(['./asset/src/scss/*.scss'])
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(sass.sync().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(csso({ restructure: true }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./asset/css'));
  }
  gulp.task(styles);
  
  function js() {
    return gulp
    .src(['./asset/src/js/dependencies/*.js','./asset/src/js/elements/*.js','./asset/src/js/*.js'])
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(terser())
    .pipe(concat('scripts.min.js'))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('./asset/js'));
  }
  gulp.task(js);

  function watch() {
    gulp.watch('./asset/src/scss/**/*.scss', styles); 
    gulp.watch('./asset/src/js/**/*.js', js);
  }
  gulp.task(watch);
  
  exports.build = series(parallel(styles, js), watch);