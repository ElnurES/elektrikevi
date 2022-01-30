// FLIPBOOK

if ($('.flipbook').length !== 0) {
    function loadApp() {
        // Create the flipbook
        $('.flipbook').turn({
            // Width
            width: 922,
            // Height
            height: 600,
            // Elevation
            elevation: 50,
            // Enable gradients
            gradients: true,
            // Auto center this flipbook
            autoCenter: true
        });
    }

    // Load the HTML4 version if there's not CSS transform
    yepnope({
        test: Modernizr.csstransforms,
        yep: ['/site/flipbook/lib/turn.js'],
        nope: ['/site/flipbook/lib/turn.html4.min.js'],
        complete: loadApp
    });
}

let timelines = $('.timeline-block');

if (timelines.length) {
    for (let i = 0; i < timelines.length; i++) {
        let link = $(timelines)[i].getAttribute('data-link');
        let id = $(timelines)[i].getAttribute('data-id');

        let timeline = new TL.Timeline('timeline-embed-' + id, link);
    }
}
