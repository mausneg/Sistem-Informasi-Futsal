$("#data-booking").css("backgroundColor", "#dbedee");
$(".fa-file-circle-check,.list-text-data-booking").addClass("text-list-select");
var baseurl = "http://localhost/Sistem-Informasi-Futsal/public/"

$.ajax({
    type: "POST",
    url: baseurl+"DataBooking/getBooking",
    success: function (response) {
        console.log(response);
        const words = response.split(" ");
        let i = 0;
        let number = 0
        while (i < words.length-1) {
            const tr = $("<tr></tr>")
            tr.append($("<td>"+String(++number)+"</td>"))
            j = 0
            for (j = i; j < i+6; j++) {
                if(j - i == 3) words[j] = words[j].substring(0, 8)
                tr.append($("<td>"+words[j]+"</td>"))
            }
            i = j
            $(".table-booking").append(tr)
        }
    }
})