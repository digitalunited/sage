(function() {
  var appendPosts;

  $('.slider-wrapper').slick({
    dots: true,
    speed: 300,
    arrows: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    adaptiveHeight: true
  });

  $('.next a').click(function() {
    var $nextButton, nextPage;
    $nextButton = $(this);
    nextPage = $(this).attr('href');
    $nextButton.hide();
    $.get(nextPage, {}, function(res) {
      var $document, $nextPosts, $postListContainer, nextUrl;
      $document = $('<div>').html(res);
      $nextPosts = $document.find('.component-postlist .component-post');
      nextUrl = $document.find('.component-postlist .next a').attr('href');
      $postListContainer = $('.component-postlist .posts');
      $nextPosts.hide();
      $postListContainer.append($nextPosts);
      $postListContainer.find('.component-post').fadeIn();
      if (nextUrl) {
        $nextButton.attr('href', nextUrl);
        return $nextButton.fadeIn('fast');
      }
    });
    return false;
  });

  appendPosts = function($nextPosts) {};

  $(document).ready(function() {
    return $('.fancybox').fancybox();
  });

}).call(this);

//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIkltYWdlU2xpZGVyL3NjcmlwdC5jb2ZmZWUiLCJQb3N0TGlzdC9zY3JpcHQuY29mZmVlIiwiVmlkZW8vZmFuY3lib3gtbWVkaWEuY29mZmVlIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0FBQUEsTUFBQTs7RUFBQSxDQUFBLENBQUEsaUJBQUEsQ0FBQSxDQUFBLEtBQUEsQ0FDQTtJQUFBLElBQUEsRUFBQSxJQUFBO0lBQ0EsS0FBQSxFQUFBLEdBREE7SUFFQSxNQUFBLEVBQUEsSUFGQTtJQUdBLFlBQUEsRUFBQSxDQUhBO0lBSUEsY0FBQSxFQUFBLENBSkE7SUFLQSxRQUFBLEVBQUEsSUFMQTtJQU1BLGFBQUEsRUFBQSxJQU5BO0lBT0EsY0FBQSxFQUFBLElBUEE7R0FEQTs7RUNBQSxDQUFBLENBQUEsU0FBQSxDQUFBLENBQUEsS0FBQSxDQUFBLFNBQUE7QUFDQSxRQUFBO0lBQUEsV0FBQSxHQUFBLENBQUEsQ0FBQSxJQUFBO0lBQ0EsUUFBQSxHQUFBLENBQUEsQ0FBQSxJQUFBLENBQUEsQ0FBQSxJQUFBLENBQUEsTUFBQTtJQUVBLFdBQUEsQ0FBQSxJQUFBLENBQUE7SUFFQSxDQUFBLENBQUEsR0FBQSxDQUFBLFFBQUEsRUFBQSxFQUFBLEVBQUEsU0FBQSxHQUFBO0FBSUEsVUFBQTtNQUFBLFNBQUEsR0FBQSxDQUFBLENBQUEsT0FBQSxDQUFBLENBQUEsSUFBQSxDQUFBLEdBQUE7TUFDQSxVQUFBLEdBQUEsU0FBQSxDQUFBLElBQUEsQ0FBQSxxQ0FBQTtNQUNBLE9BQUEsR0FBQSxTQUFBLENBQUEsSUFBQSxDQUFBLDZCQUFBLENBQUEsQ0FBQSxJQUFBLENBQUEsTUFBQTtNQUdBLGtCQUFBLEdBQUEsQ0FBQSxDQUFBLDRCQUFBO01BQ0EsVUFBQSxDQUFBLElBQUEsQ0FBQTtNQUNBLGtCQUFBLENBQUEsTUFBQSxDQUFBLFVBQUE7TUFDQSxrQkFBQSxDQUFBLElBQUEsQ0FBQSxpQkFBQSxDQUFBLENBQUEsTUFBQSxDQUFBO01BRUEsSUFBQSxPQUFBO1FBQ0EsV0FBQSxDQUFBLElBQUEsQ0FBQSxNQUFBLEVBQUEsT0FBQTtlQUNBLFdBQUEsQ0FBQSxNQUFBLENBQUEsTUFBQSxFQUZBOztJQWRBLENBQUE7QUFrQkEsV0FBQTtFQXhCQSxDQUFBOztFQTBCQSxXQUFBLEdBQUEsU0FBQSxVQUFBLEdBQUE7O0VDMUJBLENBQUEsQ0FBQSxRQUFBLENBQUEsQ0FBQSxLQUFBLENBQUEsU0FBQTtXQUNBLENBQUEsQ0FBQSxXQUFBLENBQUEsQ0FBQSxRQUFBLENBQUE7RUFEQSxDQUFBO0FGQUEiLCJmaWxlIjoiX2NvbXBvbmVudHMub3V0LmpzIiwic291cmNlUm9vdCI6Ii9zb3VyY2UvIiwic291cmNlc0NvbnRlbnQiOlsiJCgnLnNsaWRlci13cmFwcGVyJykuc2xpY2tcbiAgZG90czogdHJ1ZVxuICBzcGVlZDogMzAwXG4gIGFycm93czogdHJ1ZVxuICBzbGlkZXNUb1Nob3c6IDFcbiAgc2xpZGVzVG9TY3JvbGw6IDFcbiAgYXV0b3BsYXk6IHRydWVcbiAgYXV0b3BsYXlTcGVlZDogNTAwMFxuICBhZGFwdGl2ZUhlaWdodDogdHJ1ZSIsIiQoJy5uZXh0IGEnKS5jbGljayAtPlxuICAgICRuZXh0QnV0dG9uID0gJCh0aGlzKTtcbiAgICBuZXh0UGFnZSA9ICQodGhpcykuYXR0ciAnaHJlZidcblxuICAgICRuZXh0QnV0dG9uLmhpZGUoKVxuXG4gICAgJC5nZXQgbmV4dFBhZ2UsIHt9LCAocmVzKSAtPlxuICAgICAgICAjIFBhcnNlIHJlc3VsdCBhbmQ6XG4gICAgICAgICMgIDEuIEZldGNoIHRoZSBwb3N0cyBvbiB0aGUgbmV4dFBhZ2UgdXJsLlxuICAgICAgICAjICAyLiBGZXRjaCB0aGUgbmV3IHVybCB0byBxdWVyeSBuZXh0IHRpbWUgdGhpcyBidXR0b24gaXMgcHVzaGVkXG4gICAgICAgICRkb2N1bWVudCA9ICQoJzxkaXY+JykuaHRtbCByZXNcbiAgICAgICAgJG5leHRQb3N0cyA9ICRkb2N1bWVudC5maW5kICcuY29tcG9uZW50LXBvc3RsaXN0IC5jb21wb25lbnQtcG9zdCdcbiAgICAgICAgbmV4dFVybCA9ICRkb2N1bWVudC5maW5kKCcuY29tcG9uZW50LXBvc3RsaXN0IC5uZXh0IGEnKS5hdHRyICdocmVmJ1xuXG4gICAgICAgICMgQXBwZW5kIGFuZCBmYWRlIGluIHRoZSBmZXRjaGVkIHJlc3VsdHNcbiAgICAgICAgJHBvc3RMaXN0Q29udGFpbmVyID0gJCgnLmNvbXBvbmVudC1wb3N0bGlzdCAucG9zdHMnKVxuICAgICAgICAkbmV4dFBvc3RzLmhpZGUoKTtcbiAgICAgICAgJHBvc3RMaXN0Q29udGFpbmVyLmFwcGVuZCAkbmV4dFBvc3RzXG4gICAgICAgICRwb3N0TGlzdENvbnRhaW5lci5maW5kKCcuY29tcG9uZW50LXBvc3QnKS5mYWRlSW4oKTtcblxuICAgICAgICBpZiBuZXh0VXJsXG4gICAgICAgICAgICAkbmV4dEJ1dHRvbi5hdHRyICdocmVmJywgbmV4dFVybFxuICAgICAgICAgICAgJG5leHRCdXR0b24uZmFkZUluICdmYXN0J1xuXG4gICAgcmV0dXJuIGZhbHNlXG5cbmFwcGVuZFBvc3RzID0gKCRuZXh0UG9zdHMpIC0+XG5cbiIsIiQoZG9jdW1lbnQpLnJlYWR5IC0+XG4gICQoJy5mYW5jeWJveCcpLmZhbmN5Ym94KCkiXX0=