$("#payment").css("backgroundColor", "white")
$(".fa-money-bill-wave,.list-text-payment").addClass("text-list-select")



function setPaymentMethod(method) {
    $.ajax({
        type: "POST",
        url: "payment/setPaymentMethod",
        data: {paymentMethod : method},
        success: function (response) {
            
        }
    });
}

$(".dana").click(function() { 
    $(".choose-input").val("Input Your Dana Number").css("color","#5093D0").css("backgroundColor","#5092d03f")
    $(".choose-btn").css("backgroundColor","#5093D0")
    setPaymentMethod("dana")
});
$(".gopay").click(function() { 
    $(".choose-input").val("Input Your Gopay Number").css("color","#2b2d42").css("backgroundColor","#ffffff")
    $(".choose-btn").css("backgroundColor","#00a5cf")
    setPaymentMethod("gopay")
});
$(".shopee").click(function() { 
    $(".choose-input").val("Input Your Shopee Number").css("color","#e76f51").css("backgroundColor","#e76f5150")
    $(".choose-btn").css("backgroundColor","#e76f51")
    setPaymentMethod("shopee")
});
$(".qris").click(function() { 
    $(".choose-input").val("Input Your Name").css("color","#2b2d42").css("backgroundColor","#ffffff")
    $(".choose-btn").css("backgroundColor","#2b2d42")
    setPaymentMethod("qris")
})
$(".card").click(function () { 
    $(".card").removeClass("selected-card")
    $(this).addClass("selected-card")
})
$(".checkout-btn").click(function () { 
    const noBooking = $(".no-booking").html().replace(/[\n\s]/g, '')
    const idPaymentMethod = $(".choose-input").val().replace(/[\n\s]/g, '')
    const amount = $(".amount").html().replace(/[\n\s]/g, '')
    const checkout = {
        "noBooking" : noBooking,
        "idPaymentMethod" : idPaymentMethod,
        "amount" : amount
    }
    $.ajax({
        type: "POST",
        url: "payment/checkout",
        data: {checkout : checkout},
        success: function (response) {
            console.log(response)
        },error: function(xhr, status, error) {
            console.log('Error: ' + error);
          }
    });
    
});