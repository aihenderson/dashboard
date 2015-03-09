$(function () {

  $(".highlight-link").click(function (e) {
    e.preventDefault();
    var url = $(this).attr('href');
    var headline = $(this).attr('headline');
    $('div.highlight-overlay').css('display', 'block');
    $('button.highlight-close').css('display', 'block');
    $('#highlight-headline').html(headline);
    $("#highlight-window").html('<video width="640" height="360" controls autoplay><source src="' + url + '" type="video/mp4" /></video>');
  });

  $('button.highlight-close').click(function () {
    $("#highlight-window").empty();
    $("#highlight-headline").empty();
    $('div.highlight-overlay').css('display', 'none');
    $(this).css('display', 'none');
  });

  $('li.highlight').tooltip({
    tooltipClass: "tooltip",
    track: true
  });

  var redsox_gameday = [new Date(2015, 2, 3), new Date(2015, 2, 5), new Date(2015, 2, 6), new Date(2015, 2, 7), new Date(2015, 2, 7), new Date(2015, 2, 8), new Date(2015, 2, 9), new Date(2015, 2, 10), new Date(2015, 2, 11), new Date(2015, 2, 12), new Date(2015, 2, 13), new Date(2015, 2, 14), new Date(2015, 2, 15), new Date(2015, 2, 16), new Date(2015, 2, 17), new Date(2015, 2, 18), new Date(2015, 2, 19), new Date(2015, 2, 20), new Date(2015, 2, 21), new Date(2015, 2, 22), new Date(2015, 2, 23), new Date(2015, 2, 24), new Date(2015, 2, 26), new Date(2015, 2, 27), new Date(2015, 2, 28), new Date(2015, 2, 29), new Date(2015, 2, 30), new Date(2015, 2, 31), new Date(2015, 3, 1), new Date(2015, 3, 1), new Date(2015, 3, 2), new Date(2015, 3, 3), new Date(2015, 3, 4), new Date(2015, 3, 6), new Date(2015, 3, 8), new Date(2015, 3, 9), new Date(2015, 3, 10), new Date(2015, 3, 11), new Date(2015, 3, 12), new Date(2015, 3, 13), new Date(2015, 3, 14), new Date(2015, 3, 15), new Date(2015, 3, 17), new Date(2015, 3, 18), new Date(2015, 3, 19), new Date(2015, 3, 20), new Date(2015, 3, 21), new Date(2015, 3, 22), new Date(2015, 3, 23), new Date(2015, 3, 24), new Date(2015, 3, 25), new Date(2015, 3, 26), new Date(2015, 3, 27), new Date(2015, 3, 28), new Date(2015, 3, 29), new Date(2015, 4, 1), new Date(2015, 4, 2), new Date(2015, 4, 3), new Date(2015, 4, 4), new Date(2015, 4, 5), new Date(2015, 4, 6), new Date(2015, 4, 8), new Date(2015, 4, 9), new Date(2015, 4, 10), new Date(2015, 4, 11), new Date(2015, 4, 12), new Date(2015, 4, 13), new Date(2015, 4, 14), new Date(2015, 4, 15), new Date(2015, 4, 16), new Date(2015, 4, 17), new Date(2015, 4, 19), new Date(2015, 4, 20), new Date(2015, 4, 21), new Date(2015, 4, 22), new Date(2015, 4, 23), new Date(2015, 4, 24), new Date(2015, 4, 25), new Date(2015, 4, 26), new Date(2015, 4, 27), new Date(2015, 4, 28), new Date(2015, 4, 29), new Date(2015, 4, 30), new Date(2015, 4, 31), new Date(2015, 5, 1), new Date(2015, 5, 2), new Date(2015, 5, 3), new Date(2015, 5, 4), new Date(2015, 5, 5), new Date(2015, 5, 6), new Date(2015, 5, 7), new Date(2015, 5, 9), new Date(2015, 5, 10), new Date(2015, 5, 11), new Date(2015, 5, 12), new Date(2015, 5, 13), new Date(2015, 5, 14), new Date(2015, 5, 15), new Date(2015, 5, 16), new Date(2015, 5, 17), new Date(2015, 5, 18), new Date(2015, 5, 19), new Date(2015, 5, 20), new Date(2015, 5, 21), new Date(2015, 5, 23), new Date(2015, 5, 24), new Date(2015, 5, 25), new Date(2015, 5, 26), new Date(2015, 5, 27), new Date(2015, 5, 28), new Date(2015, 5, 29), new Date(2015, 5, 30), new Date(2015, 6, 1), new Date(2015, 6, 2), new Date(2015, 6, 3), new Date(2015, 6, 4), new Date(2015, 6, 5), new Date(2015, 6, 7), new Date(2015, 6, 8), new Date(2015, 6, 10), new Date(2015, 6, 11), new Date(2015, 6, 12), new Date(2015, 6, 14), new Date(2015, 6, 17), new Date(2015, 6, 18), new Date(2015, 6, 19), new Date(2015, 6, 20), new Date(2015, 6, 21), new Date(2015, 6, 22), new Date(2015, 6, 23), new Date(2015, 6, 24), new Date(2015, 6, 25), new Date(2015, 6, 26), new Date(2015, 6, 27), new Date(2015, 6, 28), new Date(2015, 6, 29), new Date(2015, 6, 30), new Date(2015, 6, 31), new Date(2015, 7, 1), new Date(2015, 7, 2), new Date(2015, 7, 4), new Date(2015, 7, 5), new Date(2015, 7, 6), new Date(2015, 7, 7), new Date(2015, 7, 8), new Date(2015, 7, 9), new Date(2015, 7, 11), new Date(2015, 7, 12), new Date(2015, 7, 14), new Date(2015, 7, 15), new Date(2015, 7, 16), new Date(2015, 7, 17), new Date(2015, 7, 18), new Date(2015, 7, 19), new Date(2015, 7, 20), new Date(2015, 7, 21), new Date(2015, 7, 22), new Date(2015, 7, 23), new Date(2015, 7, 24), new Date(2015, 7, 25), new Date(2015, 7, 26), new Date(2015, 7, 28), new Date(2015, 7, 29), new Date(2015, 7, 30), new Date(2015, 7, 31), new Date(2015, 8, 1), new Date(2015, 8, 2), new Date(2015, 8, 4), new Date(2015, 8, 5), new Date(2015, 8, 6), new Date(2015, 8, 7), new Date(2015, 8, 8), new Date(2015, 8, 9), new Date(2015, 8, 11), new Date(2015, 8, 12), new Date(2015, 8, 13), new Date(2015, 8, 14), new Date(2015, 8, 15), new Date(2015, 8, 16), new Date(2015, 8, 18), new Date(2015, 8, 19), new Date(2015, 8, 20), new Date(2015, 8, 21), new Date(2015, 8, 22), new Date(2015, 8, 23), new Date(2015, 8, 24), new Date(2015, 8, 25), new Date(2015, 8, 26), new Date(2015, 8, 27), new Date(2015, 8, 28), new Date(2015, 8, 29), new Date(2015, 8, 30), new Date(2015, 9, 1), new Date(2015, 9, 2), new Date(2015, 9, 3), new Date(2015, 9, 4)]

  $('#datepicker').datepicker({
    dateFormat: 'yy-mm-dd',
    showOn: "button",
    buttonImage: "/images/calendar.png",
    buttonImageOnly: true,
    beforeShowDay: highlightDays,
    onSelect: function(dateText, inst) {
      window.location = '/widget/mlb/' + dateText;
    }
  });

    $('.show_media button').click(function(){
        $(this).parent().parent().find('.mixed_media').finish().toggle("slow");
        $('span:first-child', this).toggleClass( 'glyphicon-collapse-up', 'glyphicon-collapse-down');
    })

  function highlightDays(date) {
    for (var i = 0; i < redsox_gameday.length; i++) {
      if (new Date(redsox_gameday[i]).toString().slice(0,10) == date.toString().slice(0,10)) {
        return [true, 'redsox_gameday', null];
      }
    }
    return [true, '', null];
  };

});