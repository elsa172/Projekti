new Swiper('.swiper', {
    loop: true,
    spaceBetween: 30,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      dynamicBullets: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2, // Adjust number of slides for medium screens
      },
      1024: {
        slidesPerView: 3, // Adjust number of slides for larger screens
      },
    },
  });
  