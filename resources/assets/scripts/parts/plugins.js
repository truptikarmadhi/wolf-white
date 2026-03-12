import "slick-carousel";

export class Plugins {
  init() {
    this.BlogSlider();
    this.RecentBlogSlider();
    this.RecentServiceSlider();
  }

  BlogSlider() {
    $(".blog-slider").slick({
      dots: true,
      infinite: false,
      autoplay: true,
      speed: 2000,
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: false,
      appendDots: $('.blog-dots'),
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  }
  RecentBlogSlider() {
    $(".recent-blog-slider").slick({
      dots: true,
      infinite: false,
      autoplay: true,
      speed: 2000,
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: false,
      appendDots: $('.recent-dots'),
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  }
  RecentServiceSlider() {
    $(".recent-service-slider").slick({
      dots: true,
      infinite: false,
      autoplay: true,
      speed: 2000,
      slidesToShow: 2,
      slidesToScroll: 1,
      arrows: false,
      appendDots: $('.service-dots'),
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  }
}
