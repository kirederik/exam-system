var gulp = require('gulp'),
  sass = require('gulp-sass'),
  notify = require("gulp-notify"),
  bower = require('gulp-bower'),
  uglify = require('gulp-uglify'),
  watch = require('gulp-watch'),
  batch = require('gulp-batch'),
  connect = require('gulp-connect');

var config = {
  sassPath: './app/src/scss',
  bowerDir: './app/lib',
  watchFiles: ['./app/index.html', './app/src/**/*.html', './app/src/js/**/*.js']
};

// Run Bower install on new dev machines
gulp.task('bower', function() {
  return bower().pipe(gulp.dest(config.bowerDir));
});

/** Uglify Javascripts */
gulp.task('uglify', function() {
  return gulp.src('app/src/js/*.js')
    .pipe(uglify())
    .pipe(gulp.dest('./app/dist/js'));
});

// gulp.task('icons', function() {
//   return gulp.src(config.bowerDir + '/fontawesome/fonts/**.*')
//     .pipe(gulp.dest('./app/dist/fonts'));
// });

/** Build sass files */
gulp.task('css', function() {
  return gulp.src(config.sassPath + '/*.scss')
    .pipe(sass({
      style: 'compressed',
      loadPath: [
        './src/scss'
      ]
    })
    .on("error", notify.onError(function (error) {
      return "Error: " + error.message;
    })))
    .pipe(gulp.dest('./app/dist/css'))
    .pipe(connect.reload());
});


gulp.task('files', function() {
  gulp.src(config.watchFiles).pipe(connect.reload());
})

gulp.task('watch', function() {
  gulp.watch(config.watchFiles, ['files']);
  watch(config.sassPath + '/**/*.scss', batch(function(events, done) {
    gulp.start('css', done);
  }));
});

gulp.task('connect', function() {
  connect.server({livereload: true, port: 8081});
});


gulp.task('server', ['connect', 'watch']);
gulp.task('default', ['bower', 'css', 'uglify']);

