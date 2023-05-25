$("#mybooking").css("backgroundColor", "white");
$(".fa-list-check,.list-text-mybooking").addClass("text-list-select");


function bookingList(response) {
    $(".content-main-body").html("")
    const words = response.split(" ")
    i = 0
    while (i < words.length-5) {
        let trb = $("<tr></tr>")
        let j = 0
        var addBtn = false
        for (j = i; j < i+5; j++) {
            if(!words[j]) continue
            if(j-i == 3) words[j] = words[j].substring(0, 8)
            $(trb).append($("<th width='150px'>" + words[j].replace(/`/g, '') + "</th>"))
            if(words[j] === "booked") addBtn = true
        }
        if(addBtn) $(trb).append($("<div class='table-btn'><button class='cancel-btn'>Cancel</button><button class='checkout-btn'>Checkout</button></div>"))
        i = j
        const th = $("<th>No Booking</th><th>Field</th><th>Date</th><th>Time</th><th>Status</th><th></th>")
        const trh = $("<tr></tr>").append(th)
        const thead = $("<thead></thead>").append(trh)
        const tbody = $("<tbody></tbody>").append(trb)
        const table = $("<table></table>").append(thead).append(tbody)
        $(".content-main-body").append(table);
    }   
}
function contentBtn(e,status) { 
    $(".content-btn").children().children().removeClass("btn-select")
    $(".content-btn").children().children().addClass("btn-unselect")
    $(e).removeClass("btn-unselect")
    $(e).addClass("btn-select")
    $.ajax({
        type: "POST",
        url: "mybooking/getBooking",
        data: {status : status},
        success: function (response) {
            bookingList(response)
        },
        error: function (xhr, status, error) {
            console.log(error)
        } 
    })
}
let first = true
if (first) {
    first = false
    contentBtn(".btn-all","*")
}
$(".btn-all").click(() => contentBtn(".btn-all","*"))
$(".btn-booked").click(() => contentBtn(".btn-booked","booked"))
$(".btn-pending").click(() => contentBtn(".btn-pending","pending"))
$(".btn-confirm").click(() => contentBtn(".btn-confirm","confirm"))
$(".btn-cancelled").click(() => contentBtn(".btn-cancelled","cancelled"))
$(".btn-end").click(() => contentBtn(".btn-end","end"))

$(".content-main-body").on("click", ".checkout-btn", function() {
    const noBooking = $(this).parent().parent().children().first().html()
    $.ajax({
        type: "POST",
        url: "mybooking/checkout",
        data: {noBooking:noBooking},
        success: function () {
            window.location.assign("/payment")
        }
    });
});
$(".content-main-body").on("click", ".cancel-btn", function() {
    const noBooking = $(this).parent().parent().children().first().html()
    $.ajax({
        type: "POST",
        url: "mybooking/cancel",
        data: {noBooking:noBooking},
        success: function () {
            window.location.assign("/mybooking")
        }
    });
});