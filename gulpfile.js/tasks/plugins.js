// ==== IMAGES ==== //

var gulp        = require('gulp')
  , plugins     = require('gulp-load-plugins')({ camelize: true })
  , config      = require('../../gulpconfig').plugins
;

// Copy changed font files from the source folder to `build` (fast)
gulp.task('plugins', function() {
  return gulp.src(config.build.src)
  .pipe(plugins.changed(config.build.dest))
  .pipe(gulp.dest(config.build.dest));
});
