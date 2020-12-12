const $ = require('jquery');

let lastScrollY = 0;
let ticking = false;

$(window).scroll((e) => {
    lastScrollY = window.scrollY;

    if (!ticking) {
        window.requestAnimationFrame(function() {
            onBodyScroll();

            ticking = false;
        });
    }

    ticking = true;
});

function onBodyScroll() {
    const mainHeader = $('.main-header');
    const mainMenu = $('.main-menu');
    const mainLogo = $('.main-menu-logo img');

    if (lastScrollY > 100) {
        mainHeader.css('display', 'unset');
        mainMenu.addClass('sticky-top');
        mainMenu.removeClass('main-menu-lg');
        mainLogo.addClass('small-main-logo');
    } else {
        mainHeader.css('display', 'block');
        mainMenu.removeClass('sticky-top');
        mainMenu.addClass('main-menu-lg');
        mainLogo.removeClass('small-main-logo');
    }
}
