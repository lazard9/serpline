/**
 * File index.js.
 *
 * Various functions
 */

jQuery(document).ready(function($) {
  
  window.onscroll = function() { resizemeny();fadeaway(); }

  // Resize menu
  function resizemeny(){
      if ($(this).scrollTop() < 150) {
          $('.site-header').removeClass('fixed');
      } else {
          $('.site-header').addClass('fixed');
      }
  }

  // Fade away first section of the front page
  function fadeaway(){
      $(".fade-away1").css("opacity", 1 - $(window).scrollTop() / 320);
      $(".fade-away2").css("opacity", 1 - $(window).scrollTop() / 400);
  }

  // Make social icons invisible at the beginning of the comment section
  if(document.getElementById("hide-social")!=null) {
    window.addEventListener('scroll', hideicons);
    function hideicons() {
      var hT = $('#hide-social').offset().top,
         hH = $('#hide-social').outerHeight(),
         wH = $(window).height(),
         wS = $(this).scrollTop();
      if (wS > (hT+hH-wH) && (wS+wH > hT+hH)) {
        $(".addtoany_shortcode").addClass('hide-si');
      }
      else {
        $(".addtoany_shortcode").removeClass('hide-si');
      }
    }
  }

  // Power Page icons appear on scroll below or in the navbar
  if(document.getElementById("affix-navbar")!=null) {
    // Sticky navbar
    window.addEventListener('scroll', stickynavbar);
    var navbara = document.getElementById("affix-navbar");
    var sticky = navbara.offsetTop - 180;
    function stickynavbar() {
      if (window.pageYOffset >= sticky) {
        navbara.classList.add("sticky")
      } else {
        navbara.classList.remove("sticky");
      }
    }
  }
  if(document.getElementById("contents")!=null) {
    // Select all links with hashes
    $('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
      // On-page links
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
        && 
        location.hostname == this.hostname
      ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
          // Only prevent default if animation is actually gonna happen
          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000, function() {
            // Callback after animation
            // Must change focus!
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) { // Checking if the target was focused
              return false;
            } else {
              $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
              $target.focus(); // Set focus again
            };
          });
        }
      }
    })
  }

  /* Placeholders for comment section inputs */
  $(".comment-form-comment #comment").attr("placeholder", "Comment");
  $(".comment-form-author #author").attr("placeholder", "Name*");
  $(".comment-form-email #email").attr("placeholder", "Email*");
  $(".comment-form-url #url").attr("placeholder", "Website");

  $('.comment-form-author #author').val('');
  $('.comment-form-email #email').val('');
  $(".comment-form-url #url").val('');

});