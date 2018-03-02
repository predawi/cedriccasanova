/**
 * Miscellaneous stuffs
 */
// Dependencies
const $ = require('jquery')

$(document).ready(function () {
  // Relocate main nav for mobile design
  if ($('.main-nav').length) {
    $('.main-nav').insertAfter('.button-nav__wrapper')
    // Open on click
    $('body').on('click', '.button-nav--open', function (e) {
      $('body').addClass('nav-opened')
      setTimeout(() => {
        $('body').addClass('show-nav')
      }, 50)
      e.preventDefault()
    })
    // Close on click
    $('body').on('click', '.button-nav--close', function (e) {
      $('body').removeClass('show-nav')
      setTimeout(() => {
        $('body').removeClass('nav-opened')
      }, 50)
      e.preventDefault()
    })
  }

  // Check if reservation was clicked
  let urlString = window.location.href
  let url = new URL(urlString)
  let scroll = url.searchParams.get('scroll')

  if (scroll === 'reservation') {
    $('html, body').animate({ scrollTop: $('.rtb-booking-form').offset().top - 150 }, 750)
  }

  // Reorder reservation form
  if ($('.rtb-booking-form').length) {
    $('.rtb-booking-form button[type=submit]').insertAfter('.rtb-textarea.message')
  }
})
