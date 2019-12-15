function generateInvoiceALL(data) {
    viewInvoiceALL(data);
    showStudents(document.getElementById('searchStudent').value);
}


function viewInvoiceALL(data) {
    document.getElementById('parent_name').innerHTML = ": " + data[2];
    document.getElementById('parent_id').innerHTML = data[3];
    document.getElementById('parent_tel').innerHTML = ": " + data[4];
    document.getElementById('invoice_date').innerText = ": " + data[10];
    document.getElementById('invoice_no').innerText = data[9];


    var invoice = new XMLHttpRequest();
    invoice.onreadystatechange = function () {
        if (this.readyState === 4) {
            document.getElementById("invoiceTable").innerHTML = this.responseText;
        }
    };
    invoice.open("GET", "invoiceAll.php?familyId=" + data[3], false);
    invoice.send();
    saveInvoiceAll(data[0]);

}

