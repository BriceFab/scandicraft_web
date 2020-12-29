const Flickity = require('flickity');

require('flickity-imagesloaded');
require('flickity-fullscreen');

import 'flickity/css/flickity.css';
import 'flickity-fullscreen/fullscreen.css';

//Slider style
import '../../styles/slider/slider.scss';

const flkty = new Flickity('.carousel', {
    imagesLoaded: true,
    lazyLoad: true,
    fullscreen: true,
});
