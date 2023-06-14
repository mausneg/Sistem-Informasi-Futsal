$("#data-customer").css("backgroundColor", "#dbedee");
$(".fa-users,.list-text-data-customer").addClass("text-list-select");

var baseurl = "http://localhost/Sistem-Informasi-Futsal/public/"

$.ajax({
    type: "POST",
    url: baseurl+"DataCustomer/getCustomer",
    success: function (response) {
        console.log(response);
        const words = response.split(" ");
        let i = 0;
        let number = 0
        while (i < words.length-1) {
            const tr = $("<tr></tr>")
            tr.append($("<td>"+String(++number)+"</td>"))
            j = 0
            for (j = i; j < i+4; j++) {
                tr.append($("<td>"+words[j]+"</td>"))
            }
            i = j
            $(".table-customer").append(tr)
        }
    }
})