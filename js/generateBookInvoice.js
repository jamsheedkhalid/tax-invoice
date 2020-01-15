function generateBookInvoice(data) {
    viewBookInvoice(data);
    showStudents(document.getElementById('searchStudent').value);
}


function viewBookInvoice(data) {
    document.getElementById('parent_name').innerHTML = ": " + data[2];
    document.getElementById('parent_id').innerHTML = data[3];
    document.getElementById('parent_tel').innerHTML = ": " + data[4];
    document.getElementById('invoice_date').innerText = ": " + data[12];
    document.getElementById('invoice_no').innerText = data[11];

    var invoice = new XMLHttpRequest();
    invoice.onreadystatechange = function () {
        if (this.readyState === 4) {
            document.getElementById("invoiceTable").innerHTML = this.responseText;
        }
    };
    invoice.open("GET", "bookInvoice.php?studentId=" + data[0], false);
    invoice.send();
    saveBookInvoice(data[0]);

}