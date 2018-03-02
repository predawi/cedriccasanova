/**
 * Miscellaneous stuffs
 */
// Dependencies
const $ = require('jquery')

$(document).ready(function () {
  // Check if reservation was clicked
  let urlString = window.location.href
  let url = new URL(urlString)
  let scroll = url.searchParams.get('scroll')
  console.log(scroll)

  if (scroll === 'reservation') {
    $('html, body').animate({ scrollTop: $('.rtb-booking-form').offset().top - 150 }, 750)
  }

  // Reorder reservation form
  if ($('.rtb-booking-form').length) {
    $('.rtb-booking-form button[type=submit]').insertAfter('.rtb-textarea.message')
  }
})
