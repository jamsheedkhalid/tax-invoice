function generateInvoice(data) {
    viewInvoice(data);
    showStudents(document.getElementById('searchStudent').value);
}


function viewInvoice(data) {
    document.getElementById('parent_name').innerHTML = ": " + data[2];
    document.getElementById('parent_id').innerHTML = data[3];
    document.getElementById('parent_tel').innerHTML = ": " + data[4];
    document.getElementById('invoice_date').innerText = ": " + data[5];
    document.getElementById('invoice_no').innerText = data[8];

    var invoice = new XMLHttpRequest();
    invoice.onreadystatechange = function () {
        if (this.readyState === 4) {
            document.getElementById("invoiceTable").innerHTML = this.responseText;
        }
    };
    invoice.open("GET", "invoice.php?studentId=" + data[0], false);
    invoice.send();
    saveInvoice(data[0]);

}