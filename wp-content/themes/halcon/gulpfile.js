var autoprefixer = require('gulp-autoprefixer');
var babel = require('gulp-babel');
var gulp = require('gulp');
var notify = require("gulp-notify");
var rename = require("gulp-rename");
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var watch = require('gulp-watch');

gulp.task('compress', function () {
  return gulp.src('assets/scripts/scripts.js')
    .pipe(watch('assets/scripts/scripts.js'))
    .pipe(babel({
      presets: ['env']
    }))
    .pipe(uglify())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest('assets/scripts'));
});

gulp.task('sass', function () {
  return gulp.src(['style.scss'])
    .pipe(watch(['style.scss']))
    .pipe(sass({outputStyle: 'nested', includePaths : ['_/assets/styles/**/*.scss/']}))
    .on('error', function(err) {
      notify().write(err);
      this.emit('end');
    })
    .pipe(autoprefixer({
        browsers: ['>1%'],
        cascade: false,
        grid: true
    }))
    .pipe(gulp.dest('./'));
});

gulp.task('default', gulp.parallel('compress','sass', function(done) {
  done();
}));

