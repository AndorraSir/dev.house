var gulp = require('gulp');
// var browserSync = require('browser-sync');
var sass = require('gulp-sass');
// var reload = browserSync.reload;

// Html task
gulp.task('html', function(){
  gulp.src('application/views/**/*.php')
  .pipe(reload({stream:true}))
})

// Browser task
// gulp.task('browser-sync', function() {
//   browserSync.init({
//     proxy : 'http://192.168.1.111/',
//   });
// });


gulp.task('styles', function(){
  return gulp.src('assets/style/sass/*.scss')
    .pipe(sass())
    .pipe(gulp.dest('assets/style/css/'))
});
 
// gulp.task('html', function(){
//   return gulp.src('src/index.html')
//     .pipe(gulp.dest('dist'))
// });


// Watch task
gulp.task('watch', function(){
  gulp.watch('application/views/**/*.php', ['html'])
});

gulp.task('default', ['watch']);