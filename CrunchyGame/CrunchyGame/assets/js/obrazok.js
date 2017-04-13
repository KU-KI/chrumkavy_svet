$(window).load(function () {
    $('img.img-responsive').each(function () {
        // Remember image size
        var imgWidth = $(this).width();
        // hide image 
        $(this).hide();
        // if container width < image width, we add width:100% for image 
        if ($(this).parent().width() < imgWidth) { $(this).css('width', '100%'); }
        // show image
        $(this).show();
    });
});