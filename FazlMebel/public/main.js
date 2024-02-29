var element = document.getElementById('phone');
var maskOptions = {
    mask: '+{998}(00) 000-00-00',
    lazy: false
} 















var mask = new IMask(element, maskOptions);
var swiper = new Swiper('.swiper', {
    slidesPerView: 4,
    direction: getDirection(),
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    on: {
      resize: function () {
        swiper.changeDirection(getDirection());
      },
    },
  });

  function getDirection() {
    var windowWidth = window.innerWidth;
    var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';

    return direction;
  }