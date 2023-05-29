$("#payment").css("backgroundColor", "white")
$(".fa-money-bill-wave,.list-text-payment").addClass("text-list-select")

first = true
if(first){
    first =  false
    setPaymentMethod("dana")
}

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
    $(".choose-input").val("")
    $(".choose-input").css("color","#5093D0").css("backgroundColor","#5092d03f")
    $(".choose-input").attr("placeholder","Input Your Dana Number")
    setPaymentMethod("dana")
});
$(".gopay").click(function() { 
    $(".choose-input").val("").css("color","#2b2d42").css("backgroundColor","#ffffff")
    $(".choose-input").attr("placeholder","Input Your Gopay Number")
    setPaymentMethod("gopay")
});
$(".shopee").click(function() { 
    $(".choose-input").val("")
    $(".choose-input").css("color","#e76f51").css("backgroundColor","#e76f5150")
    $(".choose-input").attr("placeholder","Input Your Shopee Number")
    setPaymentMethod("shopee")
});
$(".qris").click(function() { 
    $(".choose-input").val("")
    $(".choose-input").css("color","#2b2d42").css("backgroundColor","#ffffff")
    $(".choose-input").attr("placeholder","Input Your Name")
    setPaymentMethod("qris")
})
$(".card").click(function () { 
    $(".card").removeClass("selected-card")
    $(this).addClass("selected-card")
})
$(".checkout-btn").click(function () { 
    if($(".choose-input").val().length === 0){
        $(".message").html("Masukan input number").css("color","red");
        return
    }
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
            window.location.assign("payment/summary")
        },error: function(xhr, status, error) {
            console.log('Error: ' + error);
          }
    });
    
});
$(".summary-btn").click(function () { 
    $.ajax({
        type: "POST",
        url: "payment/home",
        success: function (response) {
            window.location.assign("home")
        }
    });
});