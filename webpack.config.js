var Encore = require('@symfony/webpack-encore')

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
  .enableVersioning(false) // hashed filenames (e.g. main.abc123.js)
  .createSharedEntry('js/common', ['jquery'])
  .addEntry('js/app', './assets/js/app.js')
  .addStyleEntry('css/global', './assets/sass/app.scss')
  .addStyleEntry('css/dataTables.bootstrap4', './node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')


module.exports = Encore.getWebpackConfig()