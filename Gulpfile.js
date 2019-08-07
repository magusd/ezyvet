var gulp  = require('gulp'),
    gutil = require('gulp-util'),
    phpunit = require('gulp-phpunit');

// create a default task and just log a message
gulp.task('default', function() {
    gutil.log('Gulp is running!');
    gulp.watch(['app/**/*.php'], gulp.series('phpunit'));
    gulp.watch(['tests/**/*.php'], gulp.series('phpunit'));
    gulp.series('phpunit');
});

gulp.task('phpunit', function(done) {
    var options = {debug: false};
    gulp.src('phpunit.xml')
        .pipe(phpunit('./vendor/bin/phpunit',options))
        .on('error', function(e) {
            console.log(e);
        });
    done();
});