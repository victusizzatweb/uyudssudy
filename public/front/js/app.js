

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


  // const lang = document.getElementById('lang-active')
  // const langs = document.querySelectorAll('.langs')
  // const activeLangImg = document.querySelector('.active-lang-img')
  // lang.textContent = localStorage.getItem('lang') ? localStorage.getItem('lang') : 'UZ'
  // langs.forEach(el => {
  //   if(el.textContent == localStorage.getItem('lang')) {
  //     el.style.display = 'none'
  //     activeLangImg.src = el.lastChild.src
  //   }
  //   el.addEventListener('click', (e)=> {
  //     localStorage.setItem('lang', e.target.textContent)
  //   })
  // })
  