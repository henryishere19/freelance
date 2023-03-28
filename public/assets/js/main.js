(function () {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight

    if (!header.classList.contains('header-scrolled')) {
      offset -= 16
    }

    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }

  /**
   * Header fixed top on scroll
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    let headerOffset = selectHeader.offsetTop
    let nextElement = selectHeader.nextElementSibling
    const headerFixed = () => {
      if ((headerOffset - window.scrollY) <= 0) {
        selectHeader.classList.add('fixed-top')
        nextElement.classList.add('scrolled-offset')
      } else {
        selectHeader.classList.remove('fixed-top')
        nextElement.classList.remove('scrolled-offset')
      }
    }
    window.addEventListener('load', headerFixed)
    onscroll(document, headerFixed)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function (e) {
    select('#navbar').classList.toggle('navbar-mobile')
    this.classList.toggle('fa-bars')
    this.classList.toggle('fa-times')
  })

  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function (e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)

  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function (e) {
    if (select(this.hash)) {
      e.preventDefault()

      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('fa-bars')
        navbarToggle.classList.toggle('fa-times')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });
  
  /**
 * Main Slider
 */
  $(".slider")
  .slick({
    autoplay: true,
    speed: 800,
    lazyLoad: "progressive",
    arrows: false,
    dots: true
  });
  /**
   * End Main Slider
   */

  /**
   * Intuitive Insights Slider Section Slider JS
   */
  $(document).ready(function(){
    $('.intuitive-insights-slider').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      speed: 300,
      infinite: true,
      autoplaySpeed: 5000,
      autoplay: true,
      responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
    });
  });
  /**
   * End Intuitive Insights Slider Section Slider JS
   */

  /**
   * Read About Slider Section Slider JS
   */
  $(document).ready(function(){
    $('.read-about-slider').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      speed: 300,
      infinite: true,
      autoplaySpeed: 5000,
      autoplay: true,
      responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
    });
  });
  /**
   * End Read About Slider Section Slider JS
   */

  /**
   * Clients Section Slider JS
   */
  $(document).ready(function(){
    $('.Clients-slider').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      speed: 300,
      infinite: true,
      autoplaySpeed: 5000,
      autoplay: true,
      responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
    });
  });
  /**
   * End Clients Section Slider JS
   */

  $('.happy-team-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    centerMode: true,
    variableWidth: true,
    infinite: true,
    focusOnSelect: true,
    cssEase: 'linear',
    touchMove: true,
    nextArrow: '<button><img src="assets/img/Life-At/Right-Errow.png"/></button>',
    responsive: [
      {
        breakpoint: 767,
        settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: false,
        variableWidth: false,
        }
      },
    ]
  });

  var imgs = $('.slider img');
  imgs.each(function () {
    var item = $(this).closest('.item');
    item.css({
      'background-image': 'url(' + $(this).attr('src') + ')',
      'background-position': 'center',
      '-webkit-background-size': 'cover',
      'background-size': 'cover',
    });
    $(this).hide();
  });

  /**
 * Our Team Slider
 */

    $(document).ready(function() {
      $('.testimonial-slider').slick({
          autoplay: true,
          autoplaySpeed: 1000,
          speed: 1000,
          draggable: true,
          infinite: true,
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: true,
          dots: false,
          responsive: [
            {
              breakpoint: 991,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
              }
            },
            {
              breakpoint: 575,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              }
            }
          ]
        });
      }); 

    /**
     * End Team Slider
    */

  $(function() {
    $(".shape-one").hover(
      function() {
        var src = $(this).attr("src");
        $(this).attr("src", src.replace(/\.png$/i, ".gif"));
      },
      function() {
        var src = $(this).attr("src");
        $(this).attr("src", src.replace(/\.gif$/i, ".png"));
      }                         
    );          
  });
  
  $(function() {
    $(".superpowers-image").hover(
      function() {
        var src = $(this).attr("src");
        $(this).attr("src", src.replace(/\.png$/i, ".gif"));
      },
      function() {
        var src = $(this).attr("src");
        $(this).attr("src", src.replace(/\.gif$/i, ".png"));
      }                         
    );          
  });
  $(document).ready(function () {
    $(".superpowers-image").hover(function () {
      $(this).css("max-width", "100px");
    }, function () {
      $(this).css("max-width", "100px");
    });
  });

  $(function() {
    $(".our-shape-one").hover(
      function() {
        var src = $(this).attr("src");
        $(this).attr("src", src.replace(/\.png$/i, ".gif"));
      },
      function() {
        var src = $(this).attr("src");
        $(this).attr("src", src.replace(/\.gif$/i, ".png"));
      }                         
    );          
  });
  $(document).ready(function () {
    $(".our-shape-one").hover(function () {
      $(this).css("max-width", "100px");
    }, function () {
      $(this).css("max-width", "100px");
    });
  });

  $(function() {
    $(".migration-innovations").hover(
      function() {
        var src = $(this).attr("src");
        $(this).attr("src", src.replace(/\.png$/i, ".gif"));
      },
      function() {
        var src = $(this).attr("src");
        $(this).attr("src", src.replace(/\.gif$/i, ".png"));
      }                         
    );          
  });
  $(document).ready(function () {
    $(".migration-innovations").hover(function () {
      $(this).css("max-width", "100px");
    }, function () {
      $(this).css("max-width", "100px");
    });
  });

  $(function() {
    $(".workspace-impact").hover(
      function() {
        var src = $(this).attr("src");
        $(this).attr("src", src.replace(/\.png$/i, ".gif"));
      },
      function() {
        var src = $(this).attr("src");
        $(this).attr("src", src.replace(/\.gif$/i, ".png"));
      }                         
    );          
  });
  $(document).ready(function () {
    $(".workspace-impact").hover(function () {
      $(this).css("max-width", "100px");
    }, function () {
      $(this).css("max-width", "100px");
    });
  });

  $(function() {
    $(".cloud-saas").hover(
      function() {
        var src = $(this).attr("src");
        $(this).attr("src", src.replace(/\.png$/i, ".gif"));
      },
      function() {
        var src = $(this).attr("src");
        $(this).attr("src", src.replace(/\.gif$/i, ".png"));
      }                         
    );          
  });
  $(document).ready(function () {
    $(".cloud-saas").hover(function () {
      $(this).css("max-width", "100px");
    }, function () {
      $(this).css("max-width", "100px");
    });
  });

  $(function() {
    $(".InfoSecurity").hover(
      function() {
        var src = $(this).attr("src");
        $(this).attr("src", src.replace(/\.png$/i, ".gif"));
      },
      function() {
        var src = $(this).attr("src");
        $(this).attr("src", src.replace(/\.gif$/i, ".png"));
      }                         
    );          
  });
  $(document).ready(function () {
    $(".InfoSecurity").hover(function () {
      $(this).css("max-width", "100px");
    }, function () {
      $(this).css("max-width", "100px");
    });
  });

  $(function() {
    $(".our-differentiators").hover(
      function() {
        var src = $(this).attr("src");
        $(this).attr("src", src.replace(/\.png$/i, ".gif"));
      },
      function() {
        var src = $(this).attr("src");
        $(this).attr("src", src.replace(/\.gif$/i, ".png"));
      }                         
    );          
  });
  $(document).ready(function () {
    $(".our-differentiators").hover(function () {
      $(this).css("max-width", "100px");
    }, function () {
      $(this).css("max-width", "100px");
    });
  });

  $(function() {
    $(".DevSecOps-innovations").hover(
      function() {
        var src = $(this).attr("src");
        $(this).attr("src", src.replace(/\.png$/i, ".gif"));
      },
      function() {
        var src = $(this).attr("src");
        $(this).attr("src", src.replace(/\.gif$/i, ".png"));
      }                         
    );          
  });
  $(document).ready(function () {
    $(".DevSecOps-innovations").hover(function () {
      $(this).css("max-width", "100px");
    }, function () {
      $(this).css("max-width", "100px");
    });
  });

  /**
   * Animation on scroll
   */
  window.addEventListener('load', () => {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    })
  });

   /**
   * about-slider Slider JS
   */
  $(document).ready(function(){
    $('.main-slider').slick({
      slidesToShow: 6,
      slidesToScroll: 3,
      arrows: false,
      dots: true,
      speed: 300,
      infinite: false,
      autoplaySpeed: 5000,
      autoplay: true,
      responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
    });
  });
  /**
   * End about-slider Slider JS
   */


  // // Vanilla Javascript
  //   var input = document.querySelector("#phone_number");
  //   window.intlTelInput(input,({
  //     // options here
  //   }));

  //   $(document).ready(function() {
  //       $('.iti__flag-container').click(function() { 
  //         var countryCode = $('.iti__selected-flag').attr('title');
  //         var countryCode = countryCode.replace(/[^0-9]/g,'')
  //         $('#phone_number').val("");
  //         $('#phone_number').val("+"+countryCode+" "+ $('#phone_number').val());
  //      });
  //   });


})()