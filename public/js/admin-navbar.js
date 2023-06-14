var baseurl = "http://localhost/Sistem-Informasi-Futsal/public/"

$(".list-btn-dashboard").click(function () { 
    window.location.assign(baseurl+"dashboard");
});
$(".list-btn-data-booking").click(function () { 
    window.location.assign(baseurl+"databooking")
});
$(".list-btn-data-customer").click(function () { 
    window.location.assign(baseurl+"datacustomer")
});
$(".list-btn-transaction").click(function () { 
    window.location.assign(baseurl+"transaction")
});
$(".list-btn-report").click(function () { 
    window.location.assign(baseurl+"report")
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