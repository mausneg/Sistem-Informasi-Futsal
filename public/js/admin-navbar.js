$(".list-btn-dashboard").click(function () { 
    window.location.assign("/dashboard");
});
$(".list-btn-data-booking").click(function () { 
    window.location.assign("/databooking")
});
$(".list-btn-data-customer").click(function () { 
    window.location.assign("/datacustomer")
});
$(".list-btn-transaction").click(function () { 
    window.location.assign("/transaction")
});
$(".list-btn-report").click(function () { 
    window.location.assign("/report")
});
$(".logout-btn").click(function () { 
    $.ajax({
        type: "POST",
        url: "home/logout",
        data: "data",
        success: function () {
            location.reload()
        }
    });
});