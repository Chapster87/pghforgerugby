var gulp = require('gulp'),
    plugins = require('gulp-load-plugins')({
        camelize: true
    }),
	config = require('../../gulpconfig').bower;

gulp.task('copy', function() {
    gulp.src([
            './src/style.css',
            './src/favicon.png',
            './src/favicon.ico',
			'./src/screenshot.png',
			'./src/manifest.json'
        ], {
            "base": "./src"
        })
        .pipe(gulp.dest('build'));
});