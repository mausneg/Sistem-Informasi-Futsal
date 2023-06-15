$("#transaction").css("backgroundColor", "#dbedee");
$(".fa-money-bill-wave,.list-text-transaction").addClass("text-list-select");
var baseurl = "http://localhost/Sistem-Informasi-Futsal/public/"

function generateStatus(words) {
    const status = $("<select class='payment-status' name='payment-status'></select>")
    if(words == "paid"){
        status.append($("<option class='paid' value='paid'>paid</option>"))
        status.append($("<option class='unpaid' value='unpaid'>unpaid</option>"))
    }
    else{
        status.append($("<option value='unpaid'>unpaid</option>"))
        status.append($("<option value='paid'>paid</option>"))
    }
    return status
}
function generateMethodPayment(methodChosen){
    let methods = ["dana","shopee","gopay","qris"]
    const methodPayment = $("<select class='payment-method' name='payment-method'></select>")
    methodPayment.append($("<option value='"+methodChosen+"'>"+methodChosen+"</option>"))
    methods = methods.filter(item => item !== methodChosen);
    for (const method of methods){
        methodPayment.append($("<option value='"+method+"'>"+method+"</option>"))
    }
    return methodPayment
}
$(".table-transaction").on('dblclick', '.payment-number', function() {
    var cell = $(this);
    var originalValue = cell.text();
    cell.html('<input type="text" value="' + originalValue + '">');
    cell.find('input').focus();
});
$.ajax({
    type: "POST",
    url: baseurl+"Transaction/getTransactions",
    success: function (response) {
        const words = response.split(" ");
        let i = -1;
        let number = 0
        while (i < words.length-2) {
            const tr = $("<tr></tr>")
            tr.append($("<td>"+String(++number)+"</td>"))
            tr.append($("<td>"+words[++i]+"</td>"))
            tr.append($("<td>"+words[++i]+"</td>"))
            tr.append($("<td class='payment-number'>"+words[++i]+"</td>"))
            const method = generateMethodPayment(words[++i])
            tr.append($("<td></td>").append(method))
            tr.append($("<td>"+words[++i]+"</td>"))
            tr.append($("<td>"+words[++i]+"</td>"))
            tr.append($("<td>"+words[++i]+"</td>"))
            const status = generateStatus(words[++i])
            tr.append($("<td></td>").append(status))
            tr.append($("<td class='email-admin'>"+words[++i]+"</td>"))
            $(".table-transaction").append(tr)
        }
    }
})
$('.table-transaction').on('change', '.payment-status', function() {
    var value = $(this).val();
    var no_payment = $(this).parent().parent().children(":first").next().text()
    var no_booking = $(this).parent().parent().children(":first").next().next().text()
    updateStatus(no_payment,no_booking,value);
});
function updateStatus(no_payment,no_booking,value) {
    const data = {
        no_payment: no_payment,
        no_booking: no_booking,
        status: value
    }
    $.ajax({
        type: 'POST',
        url: baseurl+"Transaction/updateStatus",
        data: {transaction: data },
        success: function(response) {
            window.location.reload();
        },
    });
}
$('.table-transaction').on('change', '.payment-method', function() {
    var value = $(this).val();
    var no_payment = $(this).parent().parent().children(":first").next().text()
    updateDatabaseMethod(no_payment,value);
})
function updateDatabaseMethod(no_payment,value) {
    const data = {
        no_payment: no_payment,
        method: value
    }
    $.ajax({
        type: 'POST',
        url: baseurl+"Transaction/updateMethod",
        data: {transaction: data },
        success: function(response) {
            window.location.reload();
        },
    });
}
$('.table-transaction').on('blur', '.payment-number input', function() {
    var cell = $(this).parent();
    var editedValue = $(this).val();
    var no_payment = cell.prev().prev().text();
    const data = {
        no_payment: no_payment,
        number: editedValue
    }
    $.ajax({
      method: 'POST',
      url: baseurl + 'Transaction/updateNumber',
      data: {transaction: data},
      success: function(response) {
        cell.text(editedValue);
        window.location.reload();
      },
    });
})
$.ajax({
    type: "POST",
    url: baseurl+"Transaction/countPaid",
    success: function (response) {
        $(".paid-number").text(response)
    }
});
$.ajax({
    type: "POST",
    url: baseurl+"Transaction/countUnpaid",
    success: function (response) {
        $(".unpaid-number").text(response)
    }
});