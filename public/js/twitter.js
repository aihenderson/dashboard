$(function() {
    $(window).bind("load", function() {
        var image = new Image();
        $('.panel .panel-image-container .panel-image img').each(function() {
            image.src = $(this).attr('src');
            if(image.naturalHeight > 300) {
                halfHeight = (image.naturalHeight - 253) / 2 * -1;
                $(this).css('margin-top', halfHeight);
            }
        });
    });

});