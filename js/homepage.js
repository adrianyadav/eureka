$(document).ready(function () {
    $("#showlist").click(function () {
        if ($("#showlist").html() == 'Show fewer') {
            $('.hiddenBeer').toggle(false);
            $("#showlist").html('Show more');
        } else {
            $('.hiddenBeer').toggle(true);
            $("#showlist").html('Show fewer');
        }
    });

    $('.hiddenBeer').toggle(false);
    $("#showlist").html('Show more');

    $('.housePourContainer').slick({
        dots : true
    });
});
