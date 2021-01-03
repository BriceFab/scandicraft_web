const Flickity = require('flickity');
const $ = require('jquery');

require('flickity-imagesloaded');
require('flickity-fullscreen');

import 'flickity/css/flickity.css';
import 'flickity-fullscreen/fullscreen.css';

//Slider style
import '../../styles/slider/slider.scss';

const base_options = {
    imagesLoaded: true,
    lazyLoad: true,
};

$('.carousel').each((index, carousel) => {
    const carousel_options = $(carousel).data('options');

    const current_carousel = new Flickity(carousel, {
        ...base_options,
        ...carousel_options,
    });
});
