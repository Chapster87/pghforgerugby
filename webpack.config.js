'use strict';

var path = require('path');
var webpack = require('webpack');
var glob = require('glob');

module.exports = {
    mode: 'production',
    entry: glob.sync('./assets/js/**.js').reduce(function (obj, el) {
        obj[path.parse(el).name] = el;
        return obj;
    }, {}),
    output: {
        path: path.resolve(__dirname, 'assets/static/js'),
        filename: '[name].js'
    },
    externals: {
        jquery: 'jQuery'
    },
    plugins: [
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery'
        })
    ],
    devtool: 'source-map'
};
