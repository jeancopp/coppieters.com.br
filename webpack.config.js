const Encore = require('@symfony/webpack-encore');
const webpack = require('webpack');
const path = require('path');

if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('app', './assets/app.js')
    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    // configure Babel
    // .configureBabel((config) => {
    //     config.plugins.push('@babel/a-babel-plugin');
    // })
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = '3.23';
    })
    .enableSassLoader()
    .enableReactPreset()
    .addPlugin(new webpack.ProvidePlugin({
      React: "react" // automatically import react where needed
    }))
    .addAliases({
      '@styles': path.resolve(__dirname, 'assets/styles'),
      '@pages': path.resolve(__dirname, 'assets/pages'),
      '@components': path.resolve(__dirname, 'assets/components'),
    });
;

module.exports = Encore.getWebpackConfig();