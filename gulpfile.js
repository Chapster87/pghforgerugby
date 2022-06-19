'use strict';

const gulp = require('gulp');
const fancylog = require('fancy-log');
const browserSync = require('browser-sync');
const server = browserSync.create();
const dev_url = 'http://localhost/starter-bootstrap';

/**
 * Define all source paths
 */
var paths = {
    styles: {
        src: './assets/scss/*.scss',
        dest: './assets/static/css'
    },
    scripts: {
        src: './assets/js/*.js',
        dest: './assets/static/js'
    }
};

/**
 * Webpack compilation: http://webpack.js.org, https://github.com/shama/webpack-stream#usage-with-gulp-watch
 * buildJs()
 * @return {undefined}
*/
function buildJs() {
    const compiler = require('webpack');
    const webpackStream = require('webpack-stream');

    return gulp.src(paths.scripts.src)
        .pipe(
            webpackStream(
                {
                    config: require('./webpack.config.js'),
                    mode: 'production'
                },
                compiler
            )
        )
        .pipe(
            gulp.dest(paths.scripts.dest)
        );
        /*.pipe(
            server.stream() // Browser Reload
        )*/
}

/**
 * SASS-CSS compilation: https://www.npmjs.com/package/gulp-sass
 * buildCss()
 * @return {undefined}
 */
function buildCss() {
    const sass = require('gulp-sass')(require('sass'));
    const postcss = require('gulp-postcss');
    const sourcemaps = require('gulp-sourcemaps');
    const autoprefixer = require('autoprefixer');
    const cssnano = require('cssnano');

    const plugins = [
        autoprefixer(),
        cssnano()
    ];

    return gulp.src(paths.styles.src)
        .pipe(
            sourcemaps.init()
        )
        .pipe(
            sass().on('error', sass.logError)
        )
        .pipe(
            postcss(plugins)
        )
        .pipe(
            sourcemaps.write('./')
        )
        .pipe(
            gulp.dest(paths.styles.dest)
        );
        /*.pipe(
            server.stream() // Browser Reload
        )*/
}

/**
 * Build CSS
 *
 * $ gulp scss
 */

gulp.task('scss', async function () {
    return buildCss();
});

/**
 * Build JS
 *
 * $ gulp js
 */
gulp.task('js', async function () {
    buildJs();
});

/**
 * Watch task: Webpack + SASS
 * $ gulp watch
 */
gulp.task('watch', function () {
    // Modify "dev_url" constant and uncomment "server.init()" to use browser sync
    /*server.init({
        proxy: dev_url,
    } );*/

    gulp.watch([paths.scripts.src, './assets/js/**/*.js'], buildJs);
    gulp.watch([paths.styles.src, './assets/scss/*.scss', './assets/scss/**/*.scss'], buildCss);
});
