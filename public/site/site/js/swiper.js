var swiper = new Swiper('.catalog-swiper-box .swiper-container', {
    spaceBetween: 10,
    autoplay:true,
    speed:800,
    grabCursor:true,
    slidesOffsetAfter:15,
    breakpoints: {
        768: {
          slidesPerView: 3,
          spaceBetween: 10
        },
        // when window width is >= 480px
        576: {
          slidesPerView: 2,
          spaceBetween: 10
        },
        // when window width is >= 640px
        320: {
          slidesPerView: 1.3,
          spaceBetween: 10
        }
      }
  })

