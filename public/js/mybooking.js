$("#mybooking").css("backgroundColor", "white");
$(".fa-list-check,.list-text-mybooking").addClass("text-list-select");
function contentBtn(e) { 
    $(".content-btn").children().children().removeClass("btn-select");
    $(".content-btn").children().children().addClass("btn-unselect");
    $(e).removeClass("btn-unselect");
    $(e).addClass("btn-select");
}
$(".btn-all").click(() => contentBtn(".btn-all"));
$(".btn-ongoing").click(() => contentBtn(".btn-ongoing"));
$(".btn-end").click(() => contentBtn(".btn-end"));
$(".btn-cancel").click(() => contentBtn(".btn-cancel"));