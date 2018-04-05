let Encore = require('@symfony/webpack-encore')

Encore
  .setOutputPath('web/build/')
  .setPublicPath('/build')
  .cleanupOutputBeforeBuild()
  .autoProvidejQuery()
  .autoProvideVariables({
    $: 'jquery',
    jQuery: 'jquery'
  })
  .enableSassLoader()
  .enableVersioning(true) // hashed filenames (e.g. main.abc123.js)
  .addEntry('js/app', './assets/js/app.js')
  .addStyleEntry('css/global', './assets/sass/app.scss')
  .addStyleEntry('css/dataTables.bootstrap4', './node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')

module.exports = Encore.getWebpackConfig()