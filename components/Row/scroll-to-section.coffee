$('.scroll-to-section').click ->

    targetPosition = Number($($(this).attr('href')).offset().top)
    offset = Number($('header').height())

    $('html, body').animate {scrollTop : targetPosition - offset}, 'slow'
    return false
