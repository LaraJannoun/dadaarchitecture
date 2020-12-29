$(window).on('load', function(){
    // init Isotope after all images have loaded
    isoTopeRefresh();
});

// If element is scrolled into view, fade it in
$(window).scroll(function() {
    $('.scroll-animations .animated').each(function() {
        if (isScrolledIntoView(this) === true) {
            $(this).addClass('fadeIn');
        }
    });
});

$(document).scroll(function() {
    var y = $(this).scrollTop();
    if (y > 100) {
        $(".move-to-top").fadeIn();
    } else {
        $(".move-to-top").fadeOut();
    }
});

$(document).ready(function() {
    const slider = $(".slider-images-container");
    const projectDetailSlider = $(".slider-project-images-container");

    slider.each(function() {
        $(this).slick({
            dots: true,
            autoplay: true,
            autoplaySpeed: 3000,
            infinite: true,
            arrows: true,
            pauseOnHover: false,
            prevArrow: $('.right-arrow'),
            nextArrow: $('.left-arrow')
        });
    })

    projectDetailSlider.each(function() {
        $(this).slick({
            speed: 300,
            autoplay: true,
            infinite: true,
            arrows: true,
            prevArrow: $('.right-arrow'),
            nextArrow: $('.left-arrow')
        });
    });

    //to animate text on first slider
    var $animatingElements = $('div.slider-object[data-slick-index="' + 0 + '"]').find('[data-animation]');
    doAnimations($animatingElements);

    $(".slider-images-container").each(function() {
        $(this).on('beforeChange', function(e, slick, currentSlide, nextSlide) {
            var $animatingElements = $('div.slider-object[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
            doAnimations($animatingElements);
        });
    });
    //Implementing navigation of slides using mouse scroll
    slider.each(function() {
        $(this).on("wheel", (function(e) {
            e.preventDefault();
            if (e.originalEvent.deltaY < 0) {
                $(this).slick("slickNext");
            } else {
                $(this).slick("slickPrev");
            }
        }));
    });

    //Implementing navigation of slides using mouse scroll
    projectDetailSlider.each(function() {
        $(this).on("wheel", (function(e) {
            e.preventDefault();
            if (e.originalEvent.deltaY < 0) {
                $(this).slick("slickNext");
            } else {
                $(this).slick("slickPrev");
            }
        }));
    });

    $('.burger').each(function() {
        $(this).click(function() {
            if ($(window).width() < 900) {
                if (!$(this).hasClass("open")) {
                    // the clicked element doesn't have the open class   
                    $(".mobile-menu").removeClass('d-none');
                    $(this).addClass('open');
                } else {
                    $(".mobile-menu").addClass('d-none');
                    $(this).removeClass('open');
                }
            } else {
                if (!$(this).hasClass("open")) {
                    // the clicked element doesn't have the open class   
                    $(".menu").removeClass('d-none');
                    $(this).addClass('open');
                } else {
                    $(".menu").addClass('d-none');
                    $(this).removeClass('open');
                }
            }
        });
    });

    $('.show-filter-button').each(function() {
        $(this).click(function() {
            $('.filter-buttons').show('slide');
            $('.show-filter-button').hide();
            $('.hide-filter-button').show();
        });
    });

    $('.hide-filter-button').each(function() {
        $(this).click(function() {
            $('.filter-buttons').hide('slide');
            $('.show-filter-button').show();
            $('.hide-filter-button').hide();
        });
    });

    $(".filter").each(function() {
        $(this).click(function() {
            var attr = $(this).attr('data-filter');
            if (attr == "*") {
                $('.grid').isotope({ filter: '*' });
            } else {
                $('.grid').isotope({ filter: '.' + attr + ", .first-image" });
            }
        });
    });

    $(".move-to-top").click(function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});

// Check if element is scrolled into view
function isScrolledIntoView(elem) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

function isoTopeRefresh() {
    $('.grid').each(function() {
        $(this).isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.grid-sizer'
            }
        });
    });
}
// Slick and Animation Function
function doAnimations(elements) {
    var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
    elements.each(function() {
        var $this = $(this);
        var $animationDelay = $this.data('delay');
        var $animationType = 'animated ' + $this.data('animation');
        $this.css({
            'animation-delay': $animationDelay,
            '-webkit-animation-delay': $animationDelay
        });
        $this.addClass($animationType).one(animationEndEvents, function() {
            $this.removeClass($animationType);
        });
    });
}