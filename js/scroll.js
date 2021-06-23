function resize() {
    var vheight = $(window).height();
    var vwidth = $(window).width();
    $('.fullsize-background').css({
        'height': vheight,
        'width': vwidth
    });
};

// The scroll-up function
function scrollUp() {
    var vheight = $(window).height();
    $('html, body').animate({
        scrollTop: (Math.ceil($(window).scrollTop() / vheight)-1) * vheight
    }, 0);
};

// The scroll-down function
function scrollDown() {
    var vheight = $(window).height();
    $('html, body').animate({
        scrollTop: (Math.floor($(window).scrollTop() / vheight)+1) * vheight)
    }, 0);
};

// Do stuff when document is ready
$(document).ready(function(){

    // Resize Container Function
    resize();

    // Click to Scroll DOWN Functions
    $('.up').click(function(event){
        scrollDown();
        event.preventDefault();
    });

    // Click to Scroll UP Functions
    $('.down').click(function(event){
        scrollUp();
        event.preventDefault();
    });

});

// Key Events
$(document).keydown(function(e) {
    if (e.keyCode == 40) { scrollDown(); };
    if (e.keyCode == 34) { scrollDown(); };
    if (e.keyCode == 33) { scrollUp(); };
    if (e.keyCode == 38) { scrollUp(); };
    e.preventDefault;
});

// // Mousewheel events
// $(window).bind('mousewheel', function(event) {
//     if (event.originalEvent.wheelDelta >= 0) {
//         scrollDown();
//     }
//     else {
//         scrollUp();
//     }
//     event.preventDefault;
// });

// Resize Container on window resize
$(window).resize(function(){

    resize();

});