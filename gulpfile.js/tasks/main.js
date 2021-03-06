// ==== MAIN ==== //

var gulp = require('gulp');

// Default task chain: build -> (livereload or browsersync) -> watch
gulp.task('default', ['watch']);

// Build a working copy of the theme
gulp.task('build', ['images', 'videos', 'fonts', 'scripts', 'styles', 'theme', 'copy']);

// Dist task chain: wipe -> build -> clean -> copy -> images/styles
// NOTE: this is a resource-intensive task!
gulp.task('dist', ['images-dist', 'styles-dist']);
