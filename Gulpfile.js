var gulp  = require('gulp'),
    gutil = require('gulp-util'),
    phpunit = require('gulp-phpunit');

// create a default task and just log a message
gulp.task('default', function() {
    gutil.log('Gulp is running!');
    gulp.watch(['src/**/*.php','tests/**/*.php'], ['phpunit']);
    gulp.run('phpunit');
});

gulp.task('phpunit', function() {
    var options = {debug: false};
    gulp.src('phpunit.xml')
        .pipe(phpunit('./vendor/bin/phpunit',options))
        .on('error', function() {});
});