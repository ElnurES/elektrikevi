$('.elem').fancybox({
    margin: [44, 0, 22, 0],
    thumbs: {
        autoStart: true,
        axis: 'x'
    }
});

$(document).ready(function () {

    $('.region_gallery_tablinks li a').on('click', function (e) {
        var currentNewsValue = $(this).attr('href');

        $('.gallery_tab ').hide();
        $(currentNewsValue).fadeIn(500);


        $(this).parent('li').addClass('active').siblings().removeClass('active');
        e.preventDefault();
    });
});


$(' .calendar').datepicker({
    autoHide: true,
    format: 'dd/mm/yyyy',
});

$('.catalog_content_more').click(function(){
    $('.cmc_content').css({'height':'auto' , 'overflow':'visible'});
    $(this).fadeOut();
})

$(document).ready(function () {

    $('.library_tablinks li a').on('click', function (e) {
        var currentAttrValue = $(this).attr('href');


        if (currentAttrValue == 'all') {
            $('.all').fadeIn();

        } else {
            $('.all').hide();
            $(currentAttrValue).fadeIn();
        }


        $(this).parent('li').addClass('active').siblings().removeClass('active');


        e.preventDefault();

    });
});


// $('.header-search .search_open').click(function () {
//     // $('.search_bar_header').addClass('active');
//     // $('.search_close').show();
//     // $('.search_open').css('opacity', '0');

// });

// $('.header-search .search_close').click(function () {
//     $('.search_bar_header').removeClass('active');
//     $('.search_close').hide();
//     $('.search_open').css('opacity', '1');
// });



$('.header-search .search_open').click(function(e){
    $('.search_box').addClass('opened');
    $('.searchlayer').show();
    $('.search_dropdown').show();
    e.preventDefault();
});

$('.search_close').click(function(){
    $('.search_box').removeClass('opened');
    $('.search_dropdown').hide();
    $('.searchlayer').hide();
});

$('.searchlayer').click(function(){
    $('.search_box').removeClass('opened');
    $('.search_dropdown').hide();
    $('.searchlayer').hide();
});





$('.menu_open').click(function () {
    $('.mobile_menu').addClass('opened');
});

$('.menu_close').click(function () {
    $('.mobile_menu').removeClass('opened');
});

$('.before_gallery .slick').slick({
    dots: false,
    infinite: false,
    speed: 300,
    arrows: true,
    slidesToShow: 1,
    centerMode: false,
    variableWidth: true
});
$('.after_gallery .slick').slick({
    dots: false,
    infinite: false,
    speed: 300,
    arrows: true,
    slidesToShow: 1,
    centerMode: false,
    variableWidth: true
});

$(window).on('load' , function(){

    if($('.library_alpha_drop li a').hasClass('active')){
            var activeLetter = $('.library_alpha_drop li a.active').text();
            $('.library_alphadrop_active').text(activeLetter);
    } else {
        $('.library_alphadrop_active').text('A');
    }
    
});

$('.library_alphadrop_active').click(function(){
    $('.library_alphadrop_dropdown').fadeToggle();
});

$('.library_alphadrop_active').click(function (e) {
    e.stopPropagation();
});

$('.library_alphadrop_dropdown').click(function (e) {
    e.stopPropagation();
});

$(document).click(function () {
    $('.library_alphadrop_dropdown').fadeOut();
});

// $(window).on('load' , ()=>{
    var licount = $('.region_gallery_tablinks ul li').length;
    if(licount > 3 && $(window).width() >= 400){
        $('.region_gallery_tablinks').addClass('with_swipe');
    }

    if(licount >= 2 && $(window).width() < 400){
        $('.region_gallery_tablinks').addClass('with_swipe');
    }
    
    console.log(licount);
// })