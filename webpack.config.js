var Encore = require('@symfony/webpack-encore');

Encore
  .setOutputPath('web/build/')
  .setPublicPath('/build')

  // read main.js     -> output as web/build/app.js
  .addEntry('app', './assets/js/app.js')
  // read global.scss -> output as web/build/global.css
  .addStyleEntry('global', './assets/sass/app.scss')

  // enable features!
  .enableSassLoader()
  .autoProvidejQuery()
  .enableReactPreset()
  .enableSourceMaps(!Encore.isProduction())
  .cleanupOutputBeforeBuild()
  //.enableVersioning() // hashed filenames (e.g. main.abc123.js)
;

module.exports = Encore.getWebpackConfig();