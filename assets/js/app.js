global.$ = require('jquery')
require('popper.js')
require('bootstrap')

global.datatables = require('datatables.net-bs4')
require('datatables.net-autofill-bs4')
require('datatables.net-buttons-bs4')

$(document).ready(() => {
  $('ul.nav li.dropdown').hover(function () {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500)
  }, function () {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500)
  })
})
