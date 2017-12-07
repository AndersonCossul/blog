$('.admin-trash .nav-tabs li').click(function() {
  var clickedOne = $(this).attr('id')

  // manage classes on navbar
  $('.admin-trash li').removeClass('active')

  // manage tables
  $('.admin-trash table').hide()
  $('.admin-trash table#' + clickedOne).fadeIn()
})