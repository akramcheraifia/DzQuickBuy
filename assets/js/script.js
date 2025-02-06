jQuery(document).ready(function ($) {
  let productPrice = parseFloat($("#wooecom_price").val()) || 0;
  let shippingPrice = 0;
  let discountAmount = 0;

  function updateOrderSummary() {
    let quantity = parseInt($("#wooecom_qty").val()) || 1;
    let totalPrice = productPrice * quantity + shippingPrice - discountAmount;

    // Update Order Summary Fields
    $("#wooecom_qty_display").text(quantity);
    $("#wooecom_total_price").text(totalPrice.toFixed(2));
    $("#wooecom_total_price_input").val(totalPrice); // Fix: Ensure form sends correct total price
  }

  // Quantity Change Events
  $(".wooecom_plus").click(function () {
    let qty = parseInt($("#wooecom_qty").val()) || 1;
    $("#wooecom_qty")
      .val(qty + 1)
      .trigger("input");
  });

  $(".wooecom_minus").click(function () {
    let qty = parseInt($("#wooecom_qty").val()) || 1;
    if (qty > 1) {
      $("#wooecom_qty")
        .val(qty - 1)
        .trigger("input");
    }
  });

  $("#wooecom_qty").on("input", function () {
    let qty = parseInt($(this).val()) || 1;
    if (qty < 1) {
      $(this).val(1);
    }
    updateOrderSummary();
  });

  // Shipping Price Update
  $("#wooecom_shipping").on("change", function () {
    shippingPrice = parseFloat($(this).val()) || 0;
    $("#wooecom_shipping_price").text(shippingPrice);
    updateOrderSummary();
  });

  // Order Submission (AJAX)
  $("#wooecom_instant_order").submit(function (e) {
    e.preventDefault();

    let formData = $(this).serialize() + "&action=wcqof_submit_order";

    console.log("Submitting order...", formData); // Debugging

    // Disable button & show loader
    $(".wooecom_checkout").prop("disabled", true);
    $(".wooecom_btn_loader").addClass("loading");

    $.post(wcqof_ajax.ajax_url, formData, function (response) {
      console.log("AJAX Response:", response); // Debugging

      if (response.success) {
        $("#wcqof-message").text("✅ تم تقديم الطلب بنجاح!");
      } else {
        $("#wcqof-message").text(
          "❌ حدث خطأ أثناء تقديم الطلب. " + response.data
        );
      }

      // Re-enable button and hide loader
      $(".wooecom_checkout").prop("disabled", false);
      $(".wooecom_btn_loader").removeClass("loading");
    }).fail(function (jqXHR, textStatus, errorThrown) {
      console.log("AJAX Error:", textStatus, errorThrown); // Debugging
      $("#wcqof-message").text("❌ فشل الطلب: " + textStatus);
    });
  });

  updateOrderSummary(); // Initialize order summary on page load
});
