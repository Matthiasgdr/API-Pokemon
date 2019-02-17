// include the required packages.
var gulp = require('gulp');
var stylus = require('gulp-stylus');
var livereload = require('gulp-livereload');

// Get one .styl file and render
gulp.task('stylus', function () {
  return gulp.src('./src/style.styl')
    .pipe(stylus())
    .pipe(gulp.dest('./style'))
    .pipe(livereload());
});

gulp.task('watch', function () {
    livereload.listen();
    gulp.watch('./src/style.styl', gulp.series('stylus'));
});

