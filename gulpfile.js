var gulp = require('gulp');
var browserSync = require('browser-sync');
var sass = require('gulp-sass');
// var uglify     = require('gulp-uglify');
// var connect = require('gulp-connect');

// Html task
gulp.task('html', function(){
  gulp.src('application/views/**/*.php')
  .pipe(reload({stream:true}))
})

// Browser task
gulp.task('browser-sync', function() {
  browserSync.init({
    proxy : 'http://192.168.1.111/',
  });
});
 
gulp.task('connect', function() {
  connect.server();
});
 

gulp.task('styles', function(){
  return gulp.src('admin-assets/style/sass/*.scss')
    .pipe(sass())
    .pipe(gulp.dest('admin-assets/style/css/'))
    .pipe(gulp.dest('templates/bootstrap2-responsive/assets/style/'))
});
 
// Watch task
gulp.task('watch', function(){
  gulp.watch('application/views/**/*.php', ['html'])
});

gulp.task('default', ['watch', 'connect']);