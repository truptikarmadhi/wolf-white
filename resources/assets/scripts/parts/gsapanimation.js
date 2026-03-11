import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

export class GsapAnimation {
  init() {
    this.CaseStudySlider();
    this.ServiceAnimation();
    this.CaseStudyPanelAnimation();
  }

  CaseStudySlider() {
    $(document).ready(function () {
      $(".marquee-wrapper").each(function () {
        var $wrapper = $(this);
        var $marquee = $wrapper.find(".marquee");

        // duplicate content for smooth loop
        $marquee.append($marquee.html());

        var totalWidth = $marquee[0].scrollWidth / 2;

        var isRight = $wrapper.hasClass("marquee-right");

        var tween = gsap.fromTo(
          $marquee,
          { x: isRight ? -totalWidth : 0 },
          {
            x: isRight ? 0 : -totalWidth,
            duration: 30,
            ease: "none",
            repeat: -1,
          }
        );

        $wrapper.hover(
          function () {
            tween.pause();
          },
          function () {
            tween.play();
          }
        );
      });
    });
  }

  ServiceAnimation() {
    $(document).ready(function () {
      const $servicesWrapper = $(".services-wrapper");

      // mouse move
      $(document).on("mousemove", ".services-wrapper", function (e) {
        gsap.to(".service-images img", {
          x: e.clientX,
          y: e.clientY,
          xPercent: -50,
          yPercent: -50,
          stagger: 0.05,
        });
      });

      // mouse enter
      $(document).on("mouseenter", ".service-card", function () {
        let label = $(this).data("label");

        gsap.to(`.service-images img[data-image="${label}"]`, {
          opacity: 1,
          zIndex: 4,
        });
      });

      // mouse leave
      $(document).on("mouseleave", ".service-card", function () {
        let label = $(this).data("label");

        gsap.to(`.service-images img[data-image="${label}"]`, {
          opacity: 0,
          zIndex: -1,
        });
      });
    });
  }

  CaseStudyPanelAnimation() {
    // $(document).ready(function () {
    //   gsap.registerPlugin(ScrollTrigger);

    //   $(".showcase-cards").each(function (i) {
    //     if (i !== $(".showcase-cards").length - 1) {
    //       gsap.to(this, {
    //         scrollTrigger: {
    //           trigger: this,
    //           start: "top top",
    //           end: "+=100%",
    //           pin: true,
    //           pinSpacing: false,
    //           scrub: true,
    //         },
    //       });
    //     }
    //   });
    // });
    gsap.registerPlugin(ScrollTrigger);

    const cards = gsap.utils.toArray(".showcase-cards");

    if (!cards.length) return;

    const stickDistance = 0;

    const firstCardST = ScrollTrigger.create({
      trigger: cards[0],
      start: "center center",
    });

    const lastCardST = ScrollTrigger.create({
      trigger: cards[cards.length - 1],
      start: "center center",
    });

    cards.forEach((card, index) => {
      const scaleDown = gsap.to(card, {
        transformOrigin: "50% -160%",
        ease: "none",
      });

      ScrollTrigger.create({
        trigger: card,
        start: "center center",
        end: () => lastCardST.start + stickDistance,
        pin: true,
        pinSpacing: false,
        markers: true,
        animation: scaleDown,
        scrub: true,
      });
    });

    ScrollTrigger.refresh();
  }
}
