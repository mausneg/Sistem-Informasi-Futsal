$("#data-customer").css("backgroundColor", "#dbedee");
$(".fa-users,.list-text-data-customer").addClass("text-list-select");

$.ajax({
    type: "POST",
    url: "DataCustomer/getCustomer",
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
                if(j - i == 3) words[j] = words[j].substring(0, 8)
                tr.append($("<td>"+words[j]+"</td>"))
            }
            i = j
            $(".table-customer").append(tr)
        }
    }
})