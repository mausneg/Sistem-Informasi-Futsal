var baseurl = "http://localhost/Sistem-Informasi-Futsal/public/"

$(".list-btn-home").click(function () { 
    window.location.assign(baseurl+"home");
});
$(".list-btn-mybooking").click(function () { 
    window.location.assign(baseurl+"mybooking")
});
$(".list-btn-payment").click(function () { 
    window.location.assign(baseurl+"payment")
});
$(".list-btn-aboutus").click(function () { 
    window.location.assign(baseurl+"aboutus")
});
$(".list-btn-feedback").click(function () { 
    window.location.assign(baseurl+"feedback")
});
$(".list-btn-guide").click(function () { 
    window.location.assign(baseurl+"guide")
});
$(".logout-btn").click(function () { 
    $.ajax({
        type: "POST",
        url: baseurl+"home/logout",
        data: "data",
        success: function () {
            location.reload()
        }
    });
});