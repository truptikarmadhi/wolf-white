import Handlebars from "handlebars";

export class Handlebar {
  init() {
    this.CaseHandlebar();
    this.ServiceHandlebar();
    this.BlogHandlebar();
  }

  CaseHandlebar() {
    $(document).ready(function () {
      const $caseContainer = $("#caseContainer");
      const $caseRightContainer = $("#caseRightContainer");
      const $caseCardContainer = $("#caseCardContainer");

      function repeatItems($container) {
        let content = $container.html();
        for (let i = 0; i < 3; i++) {
          $container.append(content);
        }
      }

      // Load all case studies
      function loadCase() {
        $.post(ajax_params.ajax_url, {
          action: "load_case",
          posts_per_page: -1,
        }).done((response) => {
          if (response.success) {
            const posts = response.data.posts;
            const template = Handlebars.compile($("#case-template").html());

            $caseContainer.html(template({ posts }));
            $caseRightContainer.html(template({ posts }));
            $caseCardContainer.html(template({ posts }));

            // 🔁 Repeat items for marquee effect
            repeatItems($caseContainer);
            repeatItems($caseRightContainer);
          } else {
            $caseContainer.html("<p>No services found.</p>");
            $caseRightContainer.html("<p>No services found.</p>");
            $caseCardContainer.html("<p>No services found.</p>");
          }
        });
      }

      // Initial load
      loadCase();
    });
  }

  ServiceHandlebar() {
    $(document).ready(function () {
      const $serviceContainer = $("#serviceContainer");

      Handlebars.registerHelper("add", function (a, b) {
        return a + b;
      });

      Handlebars.registerHelper("inc", function (value) {
        return parseInt(value) + 1;
      });

      // Load all case studies
      function loadServices() {
        $.post(ajax_params.ajax_url, {
          action: "load_services",
          posts_per_page: -1,
        }).done((response) => {
          if (response.success) {
            const posts = response.data.posts;
            const template = Handlebars.compile($("#service-template").html());

            $serviceContainer.html(template({ posts }));
          } else {
            $serviceContainer.html("<p>No services found.</p>");
          }
        });
      }

      // Initial load
      loadServices();
    });
  }

  BlogHandlebar() {
    $(document).ready(function () {
      const $blogContainer = $("#blogContainer");
      const $postContainer = $("#postContainer");

      Handlebars.registerHelper("eq", (a, b) => a === b);
      Handlebars.registerHelper("gt", (a, b) => a > b);
      Handlebars.registerHelper("lt", (a, b) => a < b);
      Handlebars.registerHelper("and", (a, b) => a && b);
      Handlebars.registerHelper("lt", function (a, b) {
        return a < b;
      });

      function initSlick() {
        $blogContainer.slick({
          dots: true,
          infinite: true,
          autoplay: true,
          speed: 2000,
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: false,
          appendDots: $(".blog-dots"),
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

      function loadBlogs() {
        $.post(ajax_params.ajax_url, {
          action: "load_posts",
          posts_per_page: -1,
        }).done((response) => {
          if (response.success) {
            const posts = response.data.posts;
            const template = Handlebars.compile($("#post-template").html());

            // destroy slick if already initialized
            if ($blogContainer.hasClass("slick-initialized")) {
              $blogContainer.slick("unslick");
            }

            // render handlebars
            $blogContainer.html(template({ posts }));
            $postContainer.html(template({ posts }));

            // re-init slick
            initSlick();
          } else {
            $blogContainer.html("<p>No posts found.</p>");
            $postContainer.html("<p>No posts found.</p>");
          }
        });
      }

      loadBlogs();
    });
  }
}
