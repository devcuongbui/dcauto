function updateCartCount() {
  $.ajax({
    type: "GET",
    url: "/cart/count",
    dataType: "json",
    success: function (data) {
      $(".amountProduct").attr('style', 'display: block !important;');
      $(".amountProduct").text(data.totalCountCart);
      $(".amountProduct").data("count", data.totalCountCart);
    },
  })
}
function fixDataContents() {
  $(".data_contents p span").css("font-size", "unset"),
    $(".data_contents div span").css("font-size", "unset"),
    $(".data_contents ul li").css("list-style", "unset"),
    $(".data_contents span").css("font-family", "unset"),
    $(".data_contents iframe").wrap(
      '<div class="wrapIframeVideo"><div class="wrapWidthVideo"></div></div>'
    ),
    $(".data_contents video").wrap('<div class="wrapVideoTagProcess"></div>'),
    $(".data_contents table").wrap('<div class="scrollMobiForTable"></div>'),
    $(".data_contents img").wrap('<p style="text-align:center;"></p>'),
    $(".data_contents img").removeAttr("style"),
    $(".data_contents table").removeAttr("style");
}
function setCustomValidationMessages() {
  jQuery.extend(jQuery.validator.messages, {
    required: "Vui l\xf2ng nh\u1eadp th\xf4ng tin b\u1eaft bu\u1ed9c",
  });
}
$(document).ready(function () {
  $(".data_contents").length && fixDataContents();
}),
  $(document).ready(function () {
    $(".run_search ").on("click", function () {
      (selectBrand = $(this).attr("selectBrand")),
        (selectType = $(this).attr("selectType"));
      var e = $("#" + selectBrand).find("option:selected"),
        t = e.attr("data"),
        a = e.attr("href"),
        i = e.attr("selectType");
      null == i || "" == i || $(this).attr("selectType", i);
      var n = "";
      (n =
        null == a ||
        "" == a ||
        null !=
          $("#" + selectType + ".search_input.active")
            .find("option:selected")
            .attr("href")
          ? $("#" + selectType + ".search_input.active")
              .find("option:selected")
              .attr("href")
          : a),
        null == t || "" == t
          ? $(".note_" + selectBrand).css("display", "block")
          : $(".note_" + selectBrand).css("display", "none"),
        null == n || "" == n
          ? $(".note_" + selectType).css("display", "block")
          : $(".note_" + selectType).css("display", "none"),
        null == n ||
          "" == n ||
          (window.location.href = window.location.origin + n);
    });
  }),
  $(function () {
    $("form.lien-he").each((e, t) => {
      $(t).validate({
        onfocusout: !1,
        onkeyup: !1,
        onclick: !1,
        rules: {
          name: { required: !0 },
          phone: { required: !0, phoneNumber: !0 },
          email: { required: !0, email: !0 },
          note: { required: !0 },
        },
        messages: {
          name: "Vui l\xf2ng nh\u1eadp t\xean",
          phone: {
            required: "Vui l\xf2ng nh\u1eadp s\u1ed1 \u0111i\u1ec7n tho\u1ea1i",
            phoneNumber:
              "Vui l\xf2ng nh\u1eadp \u0111\xfang s\u1ed1 \u0111i\u1ec7n tho\u1ea1i",
          },
          email: {
            required: "Vui l\xf2ng nh\u1eadp email",
            email:
              "Vui l\xf2ng nh\u1eadp \u0111\xfang \u0111\u1ecbnh d\u1ea1ng email",
          },
        },
      });
    }),
      $("form.dang-ky").each((e, t) => {
        $(t).validate({
          onfocusout: !1,
          onkeyup: !1,
          onclick: !1,
          rules: {
            name: { required: !0 },
            phone: { required: !0, phoneNumber: !0 },
            email: { required: !0, email: !0 },
            note: { required: !0 },
          },
          messages: {
            name: { required: "Vui l\xf2ng nh\u1eadp t\xean" },
            phone: {
              required:
                "Vui l\xf2ng nh\u1eadp s\u1ed1 \u0111i\u1ec7n tho\u1ea1i",
              phoneNumber:
                "Vui l\xf2ng nh\u1eadp \u0111\xfang s\u1ed1 \u0111i\u1ec7n tho\u1ea1i",
            },
            note: {
              required:
                "Vui l\xf2ng nh\u1eadp n\u1ed9i dung c\u1ea7n t\u01b0 v\u1ea5n",
            },
            email: {
              required: "Vui l\xf2ng nh\u1eadp email",
              email:
                "Vui l\xf2ng nh\u1eadp \u0111\xfang \u0111\u1ecbnh d\u1ea1ng email",
            },
          },
        });
      }),
      $("form.dang-ky-tu-van").each((e, t) => {
        $(t).validate({
          onfocusout: !1,
          onkeyup: !1,
          onclick: !1,
          rules: {
            name: { required: !0 },
            phone: { required: !0, phoneNumber: !0 },
            email: { required: !0, email: !0 },
            note: { required: !0 },
          },
          messages: {
            name: { required: "Vui l\xf2ng nh\u1eadp t\xean" },
            phone: {
              required:
                "Vui l\xf2ng nh\u1eadp s\u1ed1 \u0111i\u1ec7n tho\u1ea1i",
              phoneNumber:
                "Vui l\xf2ng nh\u1eadp \u0111\xfang s\u1ed1 \u0111i\u1ec7n tho\u1ea1i",
            },
            note: {
              required:
                "Vui l\xf2ng nh\u1eadp n\u1ed9i dung c\u1ea7n t\u01b0 v\u1ea5n",
            },
            email: {
              required: "Vui l\xf2ng nh\u1eadp email",
              email:
                "Vui l\xf2ng nh\u1eadp \u0111\xfang \u0111\u1ecbnh d\u1ea1ng email",
            },
          },
        });
      }),
      $("form.dang-ky-tu-van-1").each((e, t) => {
        $(t).validate({
          onfocusout: !1,
          onkeyup: !1,
          onclick: !1,
          rules: {
            name: { required: !0 },
            phone: { required: !0, phoneNumber: !0 },
            email: { required: !0, email: !0 },
            note: { required: !0 },
          },
          messages: {
            name: { required: "Vui l\xf2ng nh\u1eadp t\xean" },
            phone: {
              required:
                "Vui l\xf2ng nh\u1eadp s\u1ed1 \u0111i\u1ec7n tho\u1ea1i",
              phoneNumber:
                "Vui l\xf2ng nh\u1eadp \u0111\xfang s\u1ed1 \u0111i\u1ec7n tho\u1ea1i",
            },
            note: {
              required:
                "Vui l\xf2ng nh\u1eadp n\u1ed9i dung c\u1ea7n t\u01b0 v\u1ea5n",
            },
            email: {
              required: "Vui l\xf2ng nh\u1eadp email",
              email:
                "Vui l\xf2ng nh\u1eadp \u0111\xfang \u0111\u1ecbnh d\u1ea1ng email",
            },
          },
        });
      }),
      $("form.dang-ky-tu-van-2").each((e, t) => {
        $(t).validate({
          onfocusout: !1,
          onkeyup: !1,
          onclick: !1,
          rules: {
            name: { required: !0 },
            phone: { required: !0, phoneNumber: !0 },
            email: { required: !0, email: !0 },
            note: { required: !0 },
          },
          messages: {
            name: { required: "Vui l\xf2ng nh\u1eadp t\xean" },
            phone: {
              required:
                "Vui l\xf2ng nh\u1eadp s\u1ed1 \u0111i\u1ec7n tho\u1ea1i",
              phoneNumber:
                "Vui l\xf2ng nh\u1eadp \u0111\xfang s\u1ed1 \u0111i\u1ec7n tho\u1ea1i",
            },
            note: {
              required:
                "Vui l\xf2ng nh\u1eadp n\u1ed9i dung c\u1ea7n t\u01b0 v\u1ea5n",
            },
            email: {
              required: "Vui l\xf2ng nh\u1eadp email",
              email:
                "Vui l\xf2ng nh\u1eadp \u0111\xfang \u0111\u1ecbnh d\u1ea1ng email",
            },
          },
        });
      });
  }),
  $(document).ready(function () {
    function e() {
      var e = $("#menuEndPage").innerHeight();
      t <= 767
        ? $("footer").css("margin-bottom", e)
        : $("footer").css("margin-bottom", "0");
    }
    var t = $(window).width();
    $(".menuItem_1Special").hover(function () {
      var e = $("#menuDesktop .menuBlock .wrapFlex").offset().left,
        t = $(this).offset().left - e;
      $(this).find(".blockCateLevel_2Type2").css("left", -t);
    }),
      $("#menuDesktop .searchArea .searchIconEvent .searchBtn").click(
        function () {
          $(this).parent().find(".searchBtn").removeClass("d-none"),
            $(this).addClass("d-none"),
            $(this).parent().find(".searchForm").slideToggle();
        }
      ),
      e(),
      $("#menuEndPage .smallPart .aTag").click(function () {
        $("#blockCateMobi").slideToggle();
      }),
      $("#blockCateMobi .logoBarArea .hiddenBlockIcon").click(function () {
        $("#blockCateMobi").slideToggle();
      }),
      $(
        "#blockCateMobi .mainTabsMenu .blockLevel1 .toggleIcon1 .iconStyle"
      ).click(function () {
        $(this).parent().find(".iconStyle").removeClass("d-none"),
          $(this).addClass("d-none"),
          $(this).parent().find("~ .toggleBlockLevel2").slideToggle(300);
      }),
      $(
        "#blockCateMobi .mainTabsMenu .blockLevel2 .toggleIcon2 .iconStyle"
      ).click(function () {
        $(this).parent().find(".iconStyle").removeClass("d-none"),
          $(this).addClass("d-none"),
          $(this).parent().find("~ .toggleBlockLevel3").slideToggle(200);
      });
  }),
  // $(function () {
  //   $("form.order-form").each((e, t) => {
  //     $(t).validate({
  //       onfocusout: !1,
  //       onkeyup: !1,
  //       onclick: !1,
  //       rules: {
  //         customer_name: { required: !0 },
  //         customer_phone: { required: !0, phoneNumber: !0 },
  //         customer_email: { required: !0, email: !0 },
  //         "shipping_address[address]": { required: !0 },
  //         "shipping_address[province]": { required: !0 },
  //         "shipping_address[district]": { required: !0 },
  //         "shipping_address[ward]": { required: !0 },
  //         "invoice_data[company_name]": { required: !0 },
  //         "invoice_data[tax_number]": { required: !0 },
  //         "invoice_data[address]": { required: !0 },
  //       },
  //       messages: {},
  //     });
  //   }),
  //     // $("form.order-form .submit-order").click(() => {
  //     //   $("form.order-form").submit();
  //     // }),
  //     $(".submit-direct-order.ksch").click(() => {
  //       const e = $("form.product-form").find(".typePet.active"),
  //         t = e.attr("typeroom"),
  //         a = e.text(),
  //         i = e.attr("priceroom"),
  //         n = $("form.product-form");
  //       n.find('input[name="variants[room_type]"]').val(t),
  //         n.find('input[name="variants[pet_type]"]').val(a),
  //         n.find('input[name="price"]').val(i),
  //         n.submit();
  //     }),
  //     $(".submit-direct-order.spa-cho-meo").click(() => {
  //       const e = $("form.product-form"),
  //         t = e.find(".serviceTab.active").text(),
  //         a = e.find(".serviceBlock.active").find(".typePet.active"),
  //         i = a.text(),
  //         n = a.attr("priceroom");
  //       e.find('input[name="variants[room_type]"]').val(t),
  //         e.find('input[name="variants[pet_type]"]').val(i),
  //         e.find('input[name="price"]').val(n),
  //         e.submit();
  //     }),
  //     $(".submit-direct-order.product").click(() => {
  //       $("form.product-form").submit();
  //     }),
  //     $("form.order-form").on("onValid", function () {
  //       $(this).parent().find(".buttonload_booking").css("display", "block"),
  //         $(this).parent().find(".submit-order").css("display", "none");
  //     }),
  //     $("form.order-form").on("onSuccess", function () {
  //       $(this).parent().find(".buttonload_booking").css("display", "none"),
  //         $(this).parent().find(".submit-order").css("display", "block");
  //     }),
  //     $("form.order-form").on("onError", function () {
  //       $(this).parent().find(".buttonload_booking").css("display", "none"),
  //         $(this).parent().find(".submit-order").css("display", "block");
  //     }),
  //     $("#invoice").change(function () {
  //       var e = $("#subtotal").attr("vat"),
  //         t = $("#subtotal").attr("no_vat");
  //       $(this).is(":checked")
  //         ? $("#subtotal").empty().append(e)
  //         : $("#subtotal").empty().append(t);
  //     });
  // }),
  $(document).ready(function () {
    var e = $(window).width();
    if (
      ($(".clickGoLoading").click(function () {
        (widthBtn = $(this).outerWidth()),
          $(this).css("display", "none"),
          $(this).parent().find(".buttonload").css("width", widthBtn),
          $(this).parent().find(".buttonload").css("display", "inline-block"),
          setTimeout(function () {
            $(this).fadeIn(300),
              $(this).parent().find(".buttonload").css("display", "none");
          }, 3e3);
      }),
      $(".owlMagazineBlock").owlCarousel({
        loop: !0,
        margin: 0,
        nav: !0,
        dots: !1,
        animateOut: "fadeOut",
        autoplay: !0,
        autoplayTimeout: 3e3,
        autoplayHoverPause: !0,
        smartSpeed: 1e3,
        responsive: {
          0: { items: 1, stagePadding: 40 },
          767: { items: 2 },
          991: { items: 3 },
        },
      }),
      $(".owlMagazineBlock .owl-nav").attr("id", "owl-nav1"),
      $(".owlMagazineBlock .owl-dots").attr("id", "owl-dot1"),
      $(".secBanner .slideBanner").owlCarousel({
        loop: !1,
        margin: 15,
        nav: !1,
        dots: !0,
        mouseDrag: !1,
        smartSpeed: 600,
        responsive: { 0: { items: 1 }, 575: { items: 2 } },
      }),
      $(".secBanner .slideBanner .owl-dots").attr("id", "owl-dot1"),
      $(".secGalleryHome .slideGalleryHome").owlCarousel({
        loop: !0,
        center: !0,
        margin: 0,
        nav: !0,
        dots: !1,
        smartSpeed: 600,
        responsive: { 0: { items: 1 }, 767: { items: 2 }, 991: { items: 3 } },
      }),
      $(".secGalleryHome .slideGalleryHome .owl-nav").attr("id", "owl-nav1"),
      $(".specialVideoBlock_1").click(function () {
        var e = $(this).attr("dataSrcVideo");
        $(this)
          .find(".wrapVideo")
          .append(
            '<img class="imgLoad" src="/tassets/images/img_loading_1.gif" alt="loading"><iframe width="560" height="315" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
          ),
          $(this).find(".wrapVideo iframe").attr("src", e),
          $(this).find(".wrapIconPlay").fadeOut(0);
      }),
      $(".secGalleryHome .slideVideoHome").owlCarousel({
        loop: !0,
        margin: 0,
        nav: !0,
        dots: !1,
        smartSpeed: 600,
        responsive: { 0: { items: 1 }, 575: { items: 2 }, 991: { items: 3 } },
      }),
      $(".secGalleryHome .slideVideoHome .owl-nav").attr("id", "owl-nav1"),
      $(".searchBlock_2 .selectBrand").change(function () {
        var e = $(this).val();
        $(this).parent().parent().find(".selectType").removeClass("active"),
          $(this)
            .parent()
            .parent()
            .find('.selectType[brand="' + e + '"]')
            .addClass("active");
      }),
      $(".secCatePr .slideProducts").owlCarousel({
        loop: !0,
        margin: 10,
        nav: !0,
        dots: !1,
        smartSpeed: 600,
        responsive: { 0: { items: 2 }, 991: { items: 3 } },
      }),
      $(".secCatePr .slideProducts .owl-nav").attr("id", "owl-nav2"),
      $(".secPartnerHome .slideLogoHome").owlCarousel({
        loop: !0,
        margin: 0,
        nav: !0,
        dots: !1,
        mouseDrag: !1,
        autoplay: !0,
        autoplayTimeout: 3e3,
        autoplayHoverPause: !0,
        smartSpeed: 600,
        slideBy: 2,
        responsive: { 0: { items: 2 }, 575: { items: 4 }, 991: { items: 5 } },
      }),
      $(".secPartnerHome .slideLogoHome .owl-nav").attr("id", "owl-nav2"),
      $(window).scroll(function () {
        $("html,body").scrollTop() > 100
          ? $("#pageUpBlock .pageUp").removeClass("hidePageUp")
          : $("#pageUpBlock .pageUp").addClass("hidePageUp");
      }),
      $("#pageUpBlock .pageUp").click(function () {
        $("html,body").animate({ scrollTop: 0 }, 600);
      }),
      $(".secBannerCate .slideBannerCate").owlCarousel({
        loop: !0,
        margin: 10,
        nav: !1,
        dots: !0,
        autoplay: !0,
        autoplayTimeout: 3e3,
        autoplayHoverPause: !0,
        smartSpeed: 1e3,
        items: 1,
      }),
      $(".secBannerCate .slideBannerCate .owl-dots").attr("id", "owl-dot1"),
      $(".slideBenefitCate").owlCarousel({
        loop: !1,
        margin: 15,
        nav: !0,
        dots: !1,
        smartSpeed: 700,
        responsive: { 0: { items: 1 }, 575: { items: 2 }, 991: { items: 3 } },
      }),
      $(".slideBenefitCate .owl-nav").attr("id", "owl-nav2"),
      $(".slideGalleryCate").owlCarousel({
        loop: !0,
        margin: 15,
        nav: !1,
        dots: !0,
        autoplay: !0,
        autoplayTimeout: 3e3,
        autoplayHoverPause: !0,
        smartSpeed: 600,
        responsive: { 0: { items: 1 }, 575: { items: 2 }, 991: { items: 3 } },
      }),
      $(".slideGalleryCate .owl-dots").attr("id", "owl-dot2"),
      $(".slideVideoCate").owlCarousel({
        loop: !1,
        margin: 0,
        nav: !0,
        dots: !1,
        smartSpeed: 800,
        responsive: { 0: { items: 1 }, 767: { items: 2 }, 991: { items: 3 } },
      }),
      $(".slideVideoCate .owl-nav").attr("id", "owl-nav1"),
      $(".artToggleFAQ .questionPart").click(function () {
        $(this).find("+ .answerPart").slideToggle();
      }),
      $(".blockListImgsProduct").length)
    ) {
      var t = $(".blockListImgsProduct .bigImgBlock"),
        a = $(".blockListImgsProduct .smallImgBlock"),
        i = 4,
        n = !0;
      function o(e) {
        var t = e.item.count - 1,
          i = Math.round(e.item.index - e.item.count / 2 - 0.5);
        i < 0 && (i = t),
          i > t && (i = 0),
          a.find(".owl-item").removeClass("current").eq(i).addClass("current");
        var n = a.find(".owl-item.active").length - 1,
          o = a.find(".owl-item.active").first().index();
        i > a.find(".owl-item.active").last().index() &&
          a.data("owl.carousel").to(i, 100, !0),
          i < o && a.data("owl.carousel").to(i - n, 100, !0);
      }
      function r(e) {
        if (n) {
          var a = e.item.index;
          t.data("owl.carousel").to(a, 100, !0);
        }
      }
      t
        .owlCarousel({
          items: 1,
          slideSpeed: 2e3,
          nav: !1,
          autoplay: !1,
          dots: !1,
          loop: !0,
          margin: 5,
          responsiveRefreshRate: 200,
        })
        .on("changed.owl.carousel", o),
        a
          .on("initialized.owl.carousel", function () {
            a.find(".owl-item").eq(0).addClass("current");
          })
          .owlCarousel({
            dots: !1,
            nav: !0,
            smartSpeed: 200,
            slideSpeed: 500,
            margin: 10,
            mouseDrag: !1,
            slideBy: i,
            responsiveRefreshRate: 100,
            responsive: { 0: { items: 3 }, 575: { items: i } },
          })
          .on("changed.owl.carousel", r),
        a.on("click", ".owl-item", function (e) {
          e.preventDefault();
          var a = $(this).index();
          t.data("owl.carousel").to(a, 300, !0);
        }),
        a.find(".owl-nav").attr("id", "owl-nav2");
    }
    // $(".enterNumb .fa-minus-square").click(function () {
    //   var e = parseInt($(this).parent().find("input").val()),
    //     t = e;
    //   e > 0 && (t = e - 1),
    //     isNaN(t) && (t = 1),
    //     $(this)
    //       .parent()
    //       .find(".fa-minus-square ~ input")
    //       .val(t)
    //       .trigger("change");
    // }),
    //   $(".enterNumb .fa-plus-square").click(function () {
    //     var e = parseInt($(this).parent().find("input").val()) + 1;
    //     isNaN(e) && (e = 1),
    //       $(this)
    //         .parent()
    //         .find(".fa-plus-square ~ input")
    //         .val(e)
    //         .trigger("change");
    //   }),
    $(".artAddPrToCart .aTag1").click(function () {
      var option_id = $("input#option_id").val();
      var product_id = $(this).data("product-id");
      var quantity = $("input#quantity").val() || 1;
      var $this = $(this);
      if (option_id) {
        $.ajax({
          type: "POST",
          url: "/cart/add",
          data: { option_id, product_id, quantity },
          dataType: "json",
          success: function (data) {
            var e = $this.parent().find(".aTag2");
            $this.css("display", "none"), e.fadeIn(600);
            updateCartCount();
          },
          error: function (data) {
            alert(data.message || "Có lỗi xảy ra vui lòng thử lại!");
          },
        });
      } else {
        alert("Vui lòng chọn một tùy chọn cho sản phẩm");
      }
    }),
      $(".artSelectOpt .listOptArea .optPart").click(function () {
        if (!$(this).hasClass("active")) {
          var e = $(this).text();
          $(this).parent().find(".optPart").removeClass("active"),
            $(this).addClass("active"),
            $(this).parent().parent().find(".showSelectedOpt .optText").text(e);
        }
      }),
      setTimeout(function () {
        $("#sidebarBlock").length &&
          $("#sidebarBlock").stickySidebar({
            topSpacing: 80,
            bottomSpacing: 10,
            containerSelector: !1,
            innerWrapperSelector: ".sidebar__inner",
            resizeSensor: !0,
            stickyClass: "is-affixed",
            minWidth: 992,
          });
      }, 2e3),
      //   $(".payBlock #selectAllDesk").click(function () {
      //     $(this).is(":checked")
      //       ? ($(".cartTable .line2 .form-check-input").prop("checked", !0),
      //         $(this).prop("checked", !0))
      //       : ($(".cartTable .line2 .form-check-input").prop("checked", !1),
      //         $(this).prop("checked", !1));
      //   }),
      //   $(".cartTable .line2 .form-check-input").click(function () {
      //     $(this).is(":checked") ||
      //       $(".payBlock #selectAllDesk").prop("checked", !1);
      //   }),
      //   $(".payBlock #selectAllMobile").click(function () {
      //     $(this).is(":checked")
      //       ? ($(".cartPayMobile .artDetailPr_3 .form-check-input").prop(
      //           "checked",
      //           !0
      //         ),
      //         $(this).prop("checked", !0))
      //       : ($(".cartPayMobile .artDetailPr_3 .form-check-input").prop(
      //           "checked",
      //           !1
      //         ),
      //         $(this).prop("checked", !1));
      //   }),
      //   $(".cartPayMobile .artDetailPr_3 .form-check-input").click(function () {
      //     $(this).is(":checked") ||
      //       $(".payBlock #selectAllMobile").prop("checked", !1);
      //   }),
      $(".deliveryInforBlock .wrapForm-check #invoice").click(function () {
        $(this).is(":checked")
          ? ($(".deliveryInforBlock .TTXuatHD").fadeIn(600),
            $(".deliveryInforBlock .price_vat").fadeIn(600),
            $(".deliveryInforBlock .price_novat").fadeOut(600))
          : ($(".deliveryInforBlock .TTXuatHD").fadeOut(600),
            $(".deliveryInforBlock .price_vat").fadeOut(600),
            $(".deliveryInforBlock .price_novat").fadeIn(600));
      }),
      $("#method_order").click(function () {
        "true" == $("#method_order").find("option:selected").attr("data")
          ? $(".deliveryInforBlock .form_address").fadeOut(600)
          : $(".deliveryInforBlock .form_address").fadeIn(600);
      }),
      $(".bank_type").click(function () {
        $(".display").fadeOut(1);
        var e = $(".bank_type").find("option:selected").attr("data");
        "bank_personal" == e
          ? ($(".bank_personal").fadeIn(600), $(".bank_company").fadeOut(1))
          : "bank_company" == e
          ? ($(".bank_personal").fadeOut(1), $(".bank_company").fadeIn(600))
          : ($(".bank_personal").fadeOut(600), $(".bank_company").fadeOut(600));
      }),
      $(".deliveryInforBlock .wrapForm-check #noInvoice").click(function () {
        $(this).is(":checked") &&
          ($(".deliveryInforBlock .TTXuatHD").fadeOut(600),
          $(".deliveryInforBlock .price_vat").fadeOut(600),
          $(".deliveryInforBlock .price_novat").fadeIn(600));
      }),
      $(".paymentMethodBlock .detailPay .form-checkFix #thanhToanCKQNH").click(
        function () {
          $(this).is(":checked") &&
            ($(".paymentMethodBlock .detailPay .wrapChooseAcount").fadeIn(600),
            $(".paymentMethodBlock .detailPay .wrapDepositInfo").fadeOut(0));
        }
      ),
      $(".paymentMethodBlock .detailPay .form-checkFix #thanhToanKGH").click(
        function () {
          $(this).is(":checked") &&
            ($(".paymentMethodBlock .detailPay .wrapChooseAcount").fadeOut(0),
            $(".paymentMethodBlock .detailPay .wrapDepositInfo").fadeIn(600));
        }
      ),
      $(".contactCallPopUp").click(function () {
        var e = $(this).attr("dataHref"),
          t = $(this).attr("contactText"),
          a = $(this).attr("idGoogleGet"),
          i = $(".popupAskContact .modal-footer .btnContact");
        i.attr("href", e), i.attr("id", a), i.text(t);
      }),
      e >= 576 &&
        setTimeout(function () {
          $(".contactCallPopUpPhone").attr("data-target", "");
        }, 500),
      $("#owl-nav1 .owl-prev span").replaceWith(
        '<svg class="svgIcon_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M13.0285 5.24993L6.27848 11.9999L13.0285 18.7499L11.4375 20.3409L3.0965 11.9999L11.4375 3.65894L13.0285 5.24993Z"/><path fill-rule="evenodd" clip-rule="evenodd" d="M4.5 10.875H20.4375V13.125H4.5V10.875Z"/></svg>'
      ),
      $("#owl-nav1 .owl-next span").replaceWith(
        '<svg class="svgIcon_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M12.5625 3.65894L20.9035 11.9999L12.5625 20.3409L10.9715 18.7499L17.7215 11.9999L10.9715 5.24993L12.5625 3.65894Z"/><path fill-rule="evenodd" clip-rule="evenodd" d="M3.5625 10.875H19.5V13.125H3.5625V10.875Z"/></svg>'
      ),
      $("#owl-nav2 .owl-prev span").replaceWith("\u2039"),
      $("#owl-nav2 .owl-next span").replaceWith("\u203a");
  }),
  $(function () {
    setCustomValidationMessages();
  }),
  $(document).ready(function () {
    function e() {
      var e,
        t,
        a,
        i = "<ul>";
      $(".getTableOfContentBlock h3, .getTableOfContentBlock h2 ").each(
        function (n, o) {
          (t = $(this)), (a = t.text().trim());
          var r = removeAccents(a);
          t.attr("id", r),
            "H3" == o.tagName
              ? (e =
                  "<li class='sub_data'><a href='" +
                  location.origin +
                  location.pathname +
                  "#" +
                  r +
                  "'>" +
                  a +
                  "</a></li>")
              : "H2" == o.tagName &&
                (e =
                  "<li  class='data'><a href='" +
                  location.origin +
                  location.pathname +
                  "#" +
                  r +
                  "'>" +
                  a +
                  "</a></li>"),
            (i += e);
        }
      ),
        null == e ? (i = "") : (i += "</ul>"),
        $("#bookmark-list").prepend(i);
    }
    function t() {
      $(".tableOfContent .clickToggle").click(function () {
        var e = $(this).parent().parent();
        e.hasClass("appearContent")
          ? e.removeClass("appearContent")
          : e.addClass("appearContent");
      });
    }
    e(), t();
  }),
  $(document).ready(function () {
    $(".articleSelectVerPr .listOptions .optionBlock").click(function () {
      if (!$(this).hasClass("active")) {
        var e = $(this).parent().parent().parent();
        e.find(".optionBlock").removeClass("active"),
          $(this).addClass("active"),
          $(this).parent().find(".typeFish").removeClass("active"),
          $(this).addClass("active");
        var t = $(this).attr("dataSrcImg"),
          a = $(this).find(".infoOptionPr .nameOptionPr").text();
        $(
          ".specialBlock_27 .bigImgBlock .owl-item .imgPart.firstImgPart img"
        ).attr("src", t),
          $(
            ".specialBlock_27 .smallImgBlock .owl-item .imgPart.firstImgPart img"
          ).attr("src", t),
          e.find(".titleSelectVer .verText").text(a);
      }
    }),
      $(".sectionBoxPr .areaSelectOpt .optPart").click(function () {
        if (!$(this).hasClass("active")) {
          var e = $(this).parent().parent().parent(),
            t = $(this).text();
          e.find(".areaSelectOpt .optPart").removeClass("active"),
            $(this).addClass("active"),
            e.find(".areaBoxPr .listBoxPr").removeClass("active"),
            e
              .find('.areaBoxPr .listBoxPr[optionPr="' + t + '"]')
              .addClass("active");
        }
      }),
      $(".option").click(function () {
        (data_variant = ""),
          (variant = {}),
          $(".variant_options").each(function (e, t) {
            (data_variant +=
              "[" +
              $(t).find(".variant_name").attr("key") +
              "='" +
              $(t).find(".option.active").attr("name") +
              "']"),
              (variant[$(t).find(".variant_name").attr("key")] = $(t)
                .find(".option.active")
                .attr("name")),
              $(
                'input[name="variants[' +
                  $(t).find(".variant_name").attr("key") +
                  ']"]'
              ).attr("value", $(t).find(".option.active").attr("name"));
          });
        var e = $(".variants p" + data_variant)
          console.log(e);
          
          var t = e.attr("option_id"),
          a = e.attr("price"),
          v = e.attr("picever");
          console.log(a, v, t);
          
        null != a
          ? ($("input#price").attr("value", a),
            $(".price_change").text(
              Intl.NumberFormat("de-DE").format(a) + "\u0111"
            ))
          : ((a = $(".price_change").text()),
            $("input#price").attr("value", a),
            $(".price_change").text(a)),
          null != v
            ? $(".price_change_init").text(
                Intl.NumberFormat("de-DE").format(v) + "\u0111"
              )
            : ((v = $(".price_change_init").text()),
              $(".price_change_init").text(a)),
          null != t
            ? ($("input#option_id").attr("value", t),
              $(".add-to-cart").attr("data-option-id", t))
            : ($(".add-to-cart").removeAttr("data-option-id"),
              $("input#option_id").removeAttr("value"));
      });
  });
