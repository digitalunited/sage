$(document).ready ->
    $('#carousel-main').hammer().on 'swipeleft', ->
        $(this).carousel 'next'

    $('#carousel-main').hammer().on 'swiperight', ->
        $(this).carousel 'prev'