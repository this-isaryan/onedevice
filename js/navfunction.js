$(document).ready(function() {
    var $body = $(document.body);
    $('#search').click(function() {
        $('.menu-item').addClass('hide-item')
        $('.opacity').addClass('hide-item')
        $('.search-form').addClass('active')
        $('.close-search').addClass('active')
        $('#search').css('visibility', 'hidden')
        $('#search').css('opacity', '0')
        $('.person1').css('visibility', 'hidden')
        $('.person1').css('opacity', '0')
        $('.person1').css('pointer-events', 'none')
        $('#overlay').addClass('overlay')
        $('#overlay').css('display', 'block')
        $('body').css('position', 'relative')
        $("html, body").animate({ scrollTop: 0 }, "auto");
    })
    $('.close-search').click(function() {
        $('.menu-item').removeClass('hide-item')
        $('.opacity').removeClass('hide-item')
        $(".search-form").removeClass('active')
        $('.close-search').removeClass('active')
        $('#search').css('visibility', 'visible')
        $('#search').css('opacity', '1')
        $('.person1').css('visibility', 'visible')
        $('.person1').css('opacity', '1')
        $('.person1').css('pointer-events', 'all')
        $('#overlay').removeClass('overlay')
        $('#overlay').css('display', 'none')
        $('body').css('position', 'static')
    })

    $('.hamburger').click(function() {
        $('.hamburger').toggleClass('active')
        $('.nav-menu').toggleClass('active')
        $('.bg').toggleClass('active')
    })

    $('.menu-item').click(function() {
        $('.hamburger').removeClass('active')
        $('.nav-menu').removeClass('active')
    })
    $('#search2').on({
        focus: function() {
            $('.menu').addClass('focused');
        },

        blur: function() {
            $('.menu').removeClass('focused');
        }
    });
    $('#search2').on({
        focus: function() {
            $('.nav-menu').addClass('focused');
        },

        blur: function() {
            $('.nav-menu').removeClass('focused');
        }
    });
    $('#search2').on({
        focus: function() {
            $('.nav-menu.active').addClass('focused');
        },

        blur: function() {
            $('.nav-menu.active').removeClass('focused');
        }
    });
    $('#search2').on({
        focus: function() {
            $('.search-form2 div button').addClass('focused');
        },

        blur: function() {
            $('.search-form2 div button').removeClass('focused');
        }
    });
    $(".search-boxs").keyup(function(event) {
        if (event.keyCode === 13) {
            $(".search-butn").click();
        }
    });
    $("#search2").keyup(function(event) {
        if (event.keyCode === 13) {
            $("#searchbtn2").click();
        }
    });
    $('#user-img').click(function() {
        $('.bg').toggleClass('hide');
        $("html, body").animate({ scrollTop: 0 }, "auto");
    });
    $('#user-img-2').click(function() {
        $('.bg').toggleClass('hide');
    });
    $('#close').click(function() {
        $('.bg').addClass('hide');
        $body.removeClass('body-disable-scroll');
    });
    $('.nav-link').first().addClass('no-top');
})