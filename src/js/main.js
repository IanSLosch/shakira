import moment from 'moment';
import 'moment-timezone';
import "magnific-popup";

// function runFunctionInDateTimeInterval(startDateTime, endDateTime, timezone, callbackFunction) {
//   // Parse the start and end date-times with timezone
//   let start = moment.tz(startDateTime, "YYYY-MM-DD HH:mm", timezone);
//   let end = moment.tz(endDateTime, "YYYY-MM-DD HH:mm", timezone);
//   let now = moment.tz(timezone);

//   // Check if current date-time is within the range
//   if (now.isBetween(start, end)) {
//     callbackFunction();
//   } else {
//     console.log("Current date-time is not within the given interval for timezone: " + timezone);
//   }
// }


jQuery(document).ready(function ($) {

  // MOBILE MENU
  $('.mobile-menu-icon').on('click', function () {
    // $("#nav-menu").toggleClass('active')
    $("header").toggleClass('active')
    $(".nav-items").toggleClass('active')
    $("#nav-socials").toggleClass('active')
    $(".line").toggleClass('active')
    $(".join-mobile").toggleClass('active')
  })

  $('.nav-button').on('click', function () {
    if ($('header').hasClass('active')) {
      $("header").toggleClass('active')
      $(".nav-items").toggleClass('active')
      $("#nav-socials").toggleClass('active')
      $(".line").toggleClass('active')
      $(".join-mobile").toggleClass('active')
    }
  })

  // SMOOTH SCROLLING
  function addSmoothScrolling() {
    $('a[href^="#"]').on('click', function (e) {
      e.preventDefault();

      var targetId = $(this).attr("href");
      $('html, body').animate({ scrollTop: $(targetId).offset().top }, 'slow');
    });
  }

  addSmoothScrolling();

  // VIDEO PLAYER OVERLAY
  $('#main').on('click', '.play-overlay', function () {
    console.log('hi jon')
    $(this).closest('.poster-wrapper').css('display', 'none');
  });

  // VIDEO 
  const featuredVideo = $('#main-video')

  $('.set-featured-video').on('click', function (e) {
    e.preventDefault()

    const videoID = $(this).attr('data-video-id')
    featuredVideo.attr('src', `https://www.youtube.com/embed/${videoID}`)
    $('#main-video-overlay').css('display', 'none');
  })


  // SORTING HAT
  $('#sort').on('change', function () {
    sortAlbums();
  });

  function sortAlbums() {
    var sortBy = $('#sort').val();
    var $albumList = $('#album-list');
    var $albums = $albumList.children('div.card');

    if (sortBy === 'title') {
      $albums.sort(function (a, b) {
        var an = $(a).data('title').toLowerCase(),
          bn = $(b).data('title').toLowerCase();
        if (an > bn) return 1;
        if (an < bn) return -1;
        return 0;
      });
    } else {
      $albums.sort(function (a, b) {
        var an = parseInt($(a).data('year'), 10),
          bn = parseInt($(b).data('year'), 10);
        if (sortBy === 'new-old') return bn - an;
        if (sortBy === 'old-new') return an - bn;
      });
    }
    $albums.detach().appendTo($albumList);
  }

  // FORM
  $('form[data-id="shakira-signupform-2024').on('submit', function (e) {
    e.preventDefault();
    const DATA = $(this).serialize();

    $.ajax({
      type: 'POST',
      url: $(this).attr('action'),
      dataType: 'json',
      data: DATA,
      xhrFields: {
        withCredentials: false,
      },
      success: function (data) {
        $('.inputs-wrap').html('<p class="newsletter-thanks">Thank you!</p>');
      },
      error: function (err) {
        console.log(err);
      }
    });
  });


  var countDownDate = moment('2024-03-22 00:00 -0500', "YYYY-MM-DD HH:mm z");

  // Update the count down every seconds
  var x = setInterval(function () {

    var now = moment();
    var distance = countDownDate.diff(now);

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    $(".days10").html(Math.floor(days / 10));
    $(".days1").html(days % 10);
    $(".hours10").html(Math.floor(hours / 10));
    $(".hours1").html(hours % 10);
    $(".minutes10").html(Math.floor(minutes / 10));
    $(".minutes1").html(minutes % 10);
    $(".seconds10").html(Math.floor(seconds / 10));
    $(".seconds1").html(seconds % 10);


    if (distance < 0) {
      clearInterval(x);
      $(".countdown").hide()
      $(".preorder").html("Listen Now")
    }
  }, 500);


  //POPUP
  // runFunctionInDateTimeInterval("2024-03-26 17:15", "2024-03-26 19:35", "America/Detroit" , function() {
  //   $.magnificPopup.open({
  //     items: {
  //       src: 'https://www.youtube.com/watch?v=HOse5_hGcSw',
  //       type: 'iframe'
  //     }
  //   });
  // });
});