const $ = require('jquery');

const footer = $('footer.main-footer');

if (footer) {
    $(() => {
        placeFooter();
    });
}

function placeFooter() {
    if ($(document.body).height() < $(window).height()) {
        footer.css({
            position: "absolute",
            bottom: "0px",
            width: '100%',
        });
    } else {
        footer.css({
            position: "",
        });
    }
}
