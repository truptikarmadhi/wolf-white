export class Header {
  init() {
    this.HeaderFixed();
    this.MenuActivate();
    this.BurgerMenu();
  }

  HeaderFixed() {
    var prevScrollPos =
      window.pageYOffset || document.documentElement.scrollTop;
    $(window).scroll(function () {
      var sticky = $(".header"),
        scroll = $(window).scrollTop();
      if (scroll >= 50) {
        sticky.addClass("header-fixed");
        sticky.removeClass("header-fixed-os");
      } else {
        sticky.removeClass("header-fixed");
        sticky.addClass("header-fixed-os");
      }
      var currentScrollPos =
        window.pageYOffset || document.documentElement.scrollTop;
      if (prevScrollPos > currentScrollPos || currentScrollPos === 0) {
        $(".header").removeClass("hidden");
      } else {
        $(".header").addClass("hidden");
      }
      prevScrollPos = currentScrollPos;
    });
  }

  MenuActivate() {
    $(document).ready(function () {
      $(".menu-item").on("click", function (e) {
        if ($(this).find(".mega-menus").length) {
          e.preventDefault();

          if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(this).find(".mega-menus").addClass("d-none");
          } else {
            $(".menu-item").removeClass("active");
            $(".mega-menus").addClass("d-none");

            $(this).addClass("active");
            $(this).find(".mega-menus").removeClass("d-none");
          }
        }
      });
    });
  }

  BurgerMenu() {
    $(".burger-menu").click(function () {
      const isActive = $(this).hasClass("activate");

      if (!isActive) {
        $(this).addClass("activate");
        $(".header").addClass("header-active");
        $(".header-menu").removeClass("d-none").addClass('d-flex');
        $("body").addClass("overflow-hidden");
        $("html").addClass("overflow-hidden");
      } else {
        $(this).removeClass("activate");
        $(".header").removeClass("header-active");
        $(".header-menu").removeClass('d-flex').addClass("d-none");
        $("html").removeClass("overflow-hidden");

        if (!$(".menu-item.active").length) {
          $("body").removeClass("overflow-hidden");
          $("html").removeClass("overflow-hidden");
        }
      }
    });
  }
}
