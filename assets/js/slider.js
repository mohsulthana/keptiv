function sliderSingle(classValue, childrenValue, next, prev) {
    var sliderDeskripsi = $(classValue);
    if (sliderDeskripsi.children(childrenValue).length > 1) {
        $('.arrow-sliderNext-education').show();
        $('.arrow-sliderPrev-education').show();
        sliderDeskripsi.slick({
        infinite: true,
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: true,
        slidesToScroll: 1,
        nextArrow: ''+next+'',
        prevArrow: ''+prev+''
        });
    }
}

function sliderL(classValue, childrenValue, next, prev, dots) {
    var sliderDeskripsi = $(classValue);
    if (sliderDeskripsi.children(childrenValue).length > 2) {
        $('.arrow-sliderNext-education').show();
        $('.arrow-sliderPrev-education').show();
        sliderDeskripsi.slick({
        infinite: true,
        slidesToShow: 2,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: dots,
        slidesToScroll: 2,
        nextArrow: ''+next+'',
        prevArrow: ''+prev+'',
          responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 576,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }

          ]
        });
    }
}

function sliderM(classValue, childrenValue, next, prev, dots) {
    var sliderDeskripsi = $(classValue);
    if (sliderDeskripsi.children(childrenValue).length > 3) {
        $(next).show();
        $(prev).show();
        sliderDeskripsi.slick({
        infinite: true,
        slidesToShow: 3,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: dots,
        slidesToScroll: 3,
        nextArrow: ''+next+'',
        prevArrow: ''+prev+'',
          responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 576,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }

          ]
        });
    }else{
      $(next).hide();
      $(prev).hide();
    }
}

function sliderS(classValue, childrenValue, next, prev) {
    var sliderDeskripsi = $(classValue);
    if (sliderDeskripsi.children(childrenValue).length > 4) {
        $('.arrow-sliderNext-education').show();
        $('.arrow-sliderPrev-education').show();
        sliderDeskripsi.slick({
        infinite: true,
        slidesToShow: 4,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: true,
        slidesToScroll: 4,
        nextArrow: ''+next+'',
        prevArrow: ''+prev+'',
          responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 576,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }

          ]
        });
    }
}