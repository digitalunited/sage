$('.next a').click ->
    $nextButton = $(this);
    nextPage = $(this).attr 'href'

    $nextButton.hide()

    $.get nextPage, {}, (res) ->
        # Parse result and:
        #  1. Fetch the posts on the nextPage url.
        #  2. Fetch the new url to query next time this button is pushed
        $document = $('<div>').html res
        $nextPosts = $document.find '.component-postlist .component-post'
        nextUrl = $document.find('.component-postlist .next a').attr 'href'

        # Append and fade in the fetched results
        $postListContainer = $('.component-postlist .posts')
        $nextPosts.hide();
        $postListContainer.append $nextPosts
        $postListContainer.find('.component-post').fadeIn();

        if nextUrl
            $nextButton.attr 'href', nextUrl
            $nextButton.fadeIn 'fast'

    return false

appendPosts = ($nextPosts) ->

