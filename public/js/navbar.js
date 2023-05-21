$(".list-btn-home").click(function () { 
    window.location.assign("/home");
});
$(".list-btn-mybooking").click(function () { 
    window.location.assign("/mybooking")
});
$(".list-btn-payment").click(function () { 
    window.location.assign("/payment")
});
$(".list-btn-aboutus").click(function () { 
    window.location.assign("/aboutus")
});
$(".list-btn-feedback").click(function () { 
    window.location.assign("/feedback")
});
$(".list-btn-guide").click(function () { 
    window.location.assign("/guide")
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