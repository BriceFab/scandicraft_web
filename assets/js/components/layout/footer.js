const $ = require('jquery');

$(() => {
    positionFooter();

    $(window)
        .scroll(positionFooter)
        .resize(positionFooter)
});

function positionFooter() {
    let footerHeight,
        footerTop,
        $footer = $('footer.main-footer');

    footerHeight = $footer.outerHeight();
    footerTop = ($(window).scrollTop() + $(window).height() - footerHeight) + "px";

    if (($(document.body).height() + footerHeight) < $(window).height()) {
        $footer.css({
            position: "absolute",
            width: "100%",
            top: footerTop,
        });
    } else {
        $footer.css({
            position: "static",
        });
    }

}
