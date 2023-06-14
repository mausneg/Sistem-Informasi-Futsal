$("#transaction").css("backgroundColor", "#dbedee");
$(".fa-money-bill-wave,.list-text-transaction").addClass("text-list-select");

$.ajax({
    type: "POST",
    url: "Transaction/getTransactions",
    success: function (response) {
        const words = response.split(" ");
        let i = 0;
        let number = 0
        while (i < words.length-1) {
            const tr = $("<tr></tr>")
            tr.append($("<td>"+String(++number)+"</td>"))
            j = 0
            for (j = i; j < i+8; j++) {
                if(j - i == 6) words[j] = words[j].substring(0, 8)
                if(j - i == 7){
                    const status = $("<select class='payment-status' name='payment-status'></select>")
                    if(words[j] == "paid"){
                        status.append($("<option value='paid'>Paid</option>"))
                        status.append($("<option value='unpaid'>Unpaid</option>"))
                    }
                    else{
                        status.append($("<option value='unpaid'>Unpaid</option>"))
                        status.append($("<option value='paid'>Paid</option>"))
                    }
                    tr.append($("<td></td>").append(status))
                }
                else tr.append($("<td>"+words[j]+"</td>"))
            }
            i = j
            $(".table-transaction").append(tr)
        }
    }
})
$('.table-transaction').on('change', '.payment-status', function() {
    var value = $(this).val();
    var no = $(this).parent().parent().children(":first").next().text()
    updateDatabase(no,value);
});
function updateDatabase(no,value) {
    const data = {
        no: no,
        status: value
    }
    $.ajax({
        type: 'POST',
        url: "Transaction/updateStatus",
        data: {transaction: data },
        success: function(response) {
            window.location.reload();
        },
    });
}