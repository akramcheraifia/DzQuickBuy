jQuery(document).ready(function ($) {
  let productPrice = parseFloat($("#dqb_price").val()) || 0;
  let deliveryPrice = 0;

  function updateOrderSummary() {
    let quantity = parseInt($("#dqb_qty").val()) || 1;
    let totalPrice = productPrice * quantity + deliveryPrice;

    // Update Order Summary Fields
    $("#dqb_qty_display").text(quantity);
    $("#dqb_total_price").text(totalPrice);
    $("#dqb_total_price_input").val(totalPrice); // Fix: Ensure form sends correct total price
  }

  // Quantity Change Events
  $(".dqb_plus").click(function () {
    let qty = parseInt($("#dqb_qty").val()) || 1;
    $("#dqb_qty")
      .val(qty + 1)
      .trigger("input");
  });

  $(".dqb_minus").click(function () {
    let qty = parseInt($("#dqb_qty").val()) || 1;
    if (qty > 1) {
      $("#dqb_qty")
        .val(qty - 1)
        .trigger("input");
    }
  });

  $("#dqb_qty").on("input", function () {
    let qty = parseInt($(this).val()) || 1;
    if (qty < 1) {
      $(this).val(1);
    }
    updateOrderSummary();
  });

  // Shipping Price Update
  $("#dqb_state").change(function () {
    let stateCode = $(this).val();
    $.ajax({
      url: wcqof_ajax.ajax_url,
      type: "POST",
      data: {
        action: "get_state_shipping_price",
        state: stateCode,
      },
      success: function (response) {
        if (response.success) {
          let homePrice = response.data.home_price;
          let officePrice = response.data.office_price;
          let freeDelivery = response.data.free_delivery;

          if (freeDelivery) {
            $("#home_delivery_price, #office_delivery_price").text("(مجاني)");
            $("input[name='dqb_delivery_type']").val(0);
          } else {
            $("#home_delivery_price").text("د.ج " + homePrice);
            $("#office_delivery_price").text("د.ج " + officePrice);
          }

          $("#dqb_delivery_section").slideDown(300, "swing");
        }
      },
    });
  });

  $(document).on("change", "input[name='dqb_delivery_type']", function () {
    let selectedValue = $(this).val();
    let priceText =
      selectedValue === "home"
        ? $("#home_delivery_price").text().replace("د.ج ", "")
        : $("#office_delivery_price").text().replace("د.ج ", "");

    deliveryPrice = parseFloat(priceText) || 0;

    // ✅ Update shipping price in the summary
    $("#dqb_shipping_price").text(deliveryPrice);

    updateOrderSummary();
  });

  // Open & Close Order Summary
  $(".woocommerce_toggle_icon").click(function () {
    let summaryContent = $(this)
      .closest(".dqb_order_summary")
      .find(".dqb_price_table");

    // Toggle visibility
    summaryContent.slideToggle(300);

    // Toggle active class on summary
    $(this).closest(".dqb_order_summary").toggleClass("active");

    // Rotate the chevron icon
    $(this).toggleClass("rotated");
  });

  // ✅ Sticky Footer Code
  let footer = $(".dqb_sticky_footer");

  // Ensure footer is hidden when the page loads
  footer.removeClass("show").css({ opacity: "0", visibility: "hidden" });

  // Show footer when user scrolls down
  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 1600) {
      footer.addClass("show").css({ opacity: "1", visibility: "visible" });
    } else {
      footer.removeClass("show").css({ opacity: "0", visibility: "hidden" });
    }
  });

  // Smooth scroll when clicking "Buy Now"
  $(".dqb_buy_now").click(function (e) {
    e.preventDefault();
    $("html, body").animate(
      {
        scrollTop: $("#dqb_instant_order").offset().top - 20,
      },
      500
    );
  });

  // ✅ Order Submission (AJAX)
  $("#dqb_instant_order").submit(function (e) {
    e.preventDefault();
    let messageBox = $("#dqb_message_box");
    let formData = $(this).serialize() + "&action=wcqof_submit_order";

    console.log("Submitting order...", formData); // Debugging

    // Disable button & show loader
    $(".dqb_checkout").prop("disabled", true);
    $(".dqb_btn_loader").addClass("loading");

    $.post(wcqof_ajax.ajax_url, formData, function (response) {
      console.log("AJAX Response:", response); // Debugging

      if (response.success) {
        messageBox
          .removeClass("dqb_error")
          .addClass("dqb_success")
          .html(response.data)
          .fadeIn(() => {
            // Scroll to the message box after it's visible
            messageBox[0].scrollIntoView({
              behavior: "smooth",
              block: "center",
            });
          });
        // ✅ Redirect to Thank You Page after 2 seconds
        setTimeout(() => {
          window.location.href = wcqof_ajax.thank_you_url;
        }, 2000);
      } else {
        messageBox
          .removeClass("dqb_success")
          .addClass("dqb_error")
          .html(response.data)
          .fadeIn(() => {
            // Scroll to the message box after it's visible
            messageBox[0].scrollIntoView({
              behavior: "smooth",
              block: "center",
            });
          });
      }

      // Hide message after 5 seconds
      setTimeout(() => {
        messageBox.fadeOut();
      }, 5000);

      // Re-enable button and hide loader
      $(".dqb_checkout").prop("disabled", false);
      $(".dqb_btn_loader").removeClass("loading");
    }).fail(function (jqXHR, textStatus, errorThrown) {
      console.log("AJAX Error:", textStatus, errorThrown); // Debugging
      let messageBox = $("#dqb_message_box");

      messageBox
        .removeClass("dqb_success")
        .addClass("dqb_error")
        .html("❌ فشل الطلب: ")
        .fadeIn(() => {
          // Scroll to the message box after it's visible
          messageBox[0].scrollIntoView({ behavior: "smooth", block: "center" });
        });

      // Hide message after 5 seconds
      setTimeout(() => {
        messageBox.fadeOut();
      }, 5000);
    });
  });

  updateOrderSummary(); // Initialize order summary on page load
});

jQuery(document).ready(function ($) {
  let notices = $(".dqb-store-notice-item");
  let index = 0;
  let interval;

  function showNextNotice() {
    let current = notices.eq(index);
    index = (index + 1) % notices.length;
    let next = notices.eq(index);

    current.fadeOut(400, function () {
      notices.hide(); // Hide all notices
      next.fadeIn(400);
    });
  }

  function startRotation() {
    if (!interval) {
      interval = setInterval(showNextNotice, 1700); // Slightly longer interval for better UX
    }
  }

  function stopRotation() {
    clearInterval(interval);
    interval = null;
  }

  if (notices.length > 1) {
    notices.hide().first().show(); // Show only the first notice initially
    startRotation();
  }

  document.addEventListener("visibilitychange", function () {
    if (document.hidden) {
      stopRotation();
    } else {
      notices.hide().eq(index).show(); // Ensure only one is visible
      startRotation();
    }
  });
});
