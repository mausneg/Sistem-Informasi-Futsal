$("#dashboard").css("backgroundColor", "#dbedee");
$(".fa-chart-line,.list-text-dashboard").addClass("text-list-select");

var baseurl = "http://localhost/Sistem-Informasi-Futsal/public/"

$.ajax({
    type: "POST",
    url: baseurl+"dashboard/countCustomer",
    success: function (response) {
        $(".customer-number").html(response);
    }
});
$.ajax({
    type: "POST",
    url: baseurl+"dashboard/countBooking",
    success: function (response) {
        $(".booking-number").html(response);
    }
});
$.ajax({
    type: "POST",
    url: baseurl+"dashboard/countDone",
    success: function (response) {
        $(".done-number").html(response);
    }
});
$.ajax({
    type: "POST",
    url: baseurl+"dashboard/getTransaction",
    success: function (response) {
        words = response.split(" ")
        let i = -1
        console.log(words)
        while(i < words.length-2){
            const container = $("<div class='transaction-list-container'></div>")
            const no = $("<h4 class='no-booking'>Booking #" + words[++i] +"</h4>")
            const list = $("<div class='transaction-list'></div>")
            list.append($("<h4>"+ words[++i] +"</h4>"))
            list.append($("<span> Lapangan "+ words[++i] +"</span>"))
            list.append($("<span> tanggal "+ words[++i] +"</span>"))
            list.append($("<span> jam "+ words[++i] +"</span>"))
            container.append(list)
            container.append(no)
            $(".transaksi-list-body").append(container)
        }
    }
});
$(".card-footer-customer").click(function (e) { 
    window.location.assign(baseurl+"/datacustomer")
});
$(".card-footer-booking").click(function (e) { 
    window.location.assign(baseurl+"/databooking")
});
$(".card-footer-done").click(function (e) { 
    window.location.assign(baseurl+"/transaction")
});
$(".transaksi-list").children().on('click', function() {
    window.location.assign(baseurl+"/transaction")
  });