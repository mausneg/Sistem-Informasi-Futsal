$("#mybooking").css("backgroundColor", "white");
$(".fa-list-check,.list-text-mybooking").addClass("text-list-select");


function bookingList(response) {
    $(".content-main-body").html("");
    const words = response.split(" ")

    i = 0
    while (i < words.length-6) {
        let trb = $("<tr></tr>")
        let j = 0
        for (j = i; j < i+6; j++) {
            $(trb).append($("<th>" + words[j].replace(/`/g, '') + "</th>"))
        }
        i = j
        const th = $("<th>No Booking</th><th>Field</th><th>Date</th><th>Time</th><th>Status</th><th>Email</th>")
        const trh = $("<tr></tr>").append(th)
        const thead = $("<thead></thead>").append(trh)
        const tbody = $("<tbody></tbody>").append(trb)
        const table = $("<table></table>").append(thead).append(tbody)
        $(".content-main-body").append(table);
    }   
}
function contentBtn(e,status) { 
    $(".content-btn").children().children().removeClass("btn-select");
    $(".content-btn").children().children().addClass("btn-unselect");
    $(e).removeClass("btn-unselect");
    $(e).addClass("btn-select");
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
    });
}
let first = 0
if (first == 0) {
    first++;
    contentBtn(".btn-all","*");
}
$(".btn-all").click(() => contentBtn(".btn-all","*"));
$(".btn-booked").click(() => contentBtn(".btn-booked","booked"));
$(".btn-pending").click(() => contentBtn(".btn-pending","pending"));
$(".btn-confirm").click(() => contentBtn(".btn-confirm","confirm"));
$(".btn-cancelled").click(() => contentBtn(".btn-cancel","cancelled"));

