$(document).ready(function() {

    $('#user').hover(function() {

        $('.dropdown-menu').toggle();

    });

    if ($(window).width() < 990) {

        $('.access_link').click(function() {

            $('.dropdown-menu').toggle();

        });

    }

});