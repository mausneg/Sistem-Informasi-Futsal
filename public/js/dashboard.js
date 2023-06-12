$("#dashboard").css("backgroundColor", "#dbedee");
$(".fa-chart-line,.list-text-dashboard").addClass("text-list-select");

$.ajax({
    type: "POST",
    url: "dashboard/countCustomer",
    success: function (response) {
        $(".customer-number").html(response);
    }
});
$.ajax({
    type: "POST",
    url: "dashboard/countBooking",
    success: function (response) {
        $(".booking-number").html(response);
    }
});
$.ajax({
    type: "POST",
    url: "dashboard/countDone",
    success: function (response) {
        $(".done-number").html(response);
    }
});
$.ajax({
    type: "POST",
    url: "dashboard/getTransaction",
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
