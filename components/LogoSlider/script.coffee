window.carouselPageMerger = new SocialbitBootstrapCarouselPageMerger

carouselPageMerger.setSettings
    spaceCalculationFactor: 1.00
    useWidthOfFirstElement: false
    interval: 5000

window.carouselPageMerger.run '#logo-slider'

$(document).ready ->
    $('#logo-slider').hammer().on 'swipeleft', ->
        $(this).carousel 'next'

    $('#logo-slider').hammer().on 'swiperight', ->
        $(this).carousel 'prev'