var gulp        = require('gulp'),
    sourcemaps  = require('gulp-sourcemaps'),
    sass        = require('gulp-sass'),
    browserSync = require('browser-sync').create();

// Setup static server
gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "regnsky:8888" // Ændr i forhold til den Mamp-host, der kører projektet
    });
});

// Task to reload all Browsers
gulp.task('bs-reload', function () {
    browserSync.reload();
});

gulp.task('sass', function() {
  gulp.src('./sass/**/*.scss')
    .pipe(sourcemaps.init()) // init sourcemaps
    .pipe(sass({outputStyle: 'expanded'})) // run sass - output styles: nested/compact/expanded/compressed
    .pipe(sourcemaps.write()) // write source maps
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./')) // destination of compiled css file
    .pipe(browserSync.stream()); // inject into browsers
});

// WATCH
gulp.task('watch', function() {
  gulp.watch('./**/*.php', ['bs-reload']) // Watch php files and reload browsers
  gulp.watch('./sass/**/*.scss', ['sass']) // Watch .scss files and call sass task

  // When there is a change, display what file was changed, only showing the path after the 'sass folder'
  .on('change', function(evt) {
      console.log(
          '[watcher] File ' + evt.path.replace(/.*(?=sass)/,'') + ' was ' + evt.type + ', compiling...'
      );
  });

});

// DEFAULT
gulp.task('default', ['sass', 'browser-sync', 'watch']);
