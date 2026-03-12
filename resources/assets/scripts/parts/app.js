export class App {
  init() {
    this.Append();
  }

  Append() {
    if ($(window).width() < 992) {
      $(".recent-dots").insertBefore(".recent-slider-dots a");
      $(".blog-dots").insertBefore(".blog-slider-dots a");
      $(".service-dots").insertBefore(".service-slider-dots a");
    }
  }
}
