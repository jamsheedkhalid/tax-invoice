function deleteInvoice(invoice_no) {
    var invoice = new XMLHttpRequest();
    invoice.onreadystatechange = function () {
        if (this.readyState === 4) {
            alert("Invoice Deleted Successfully");
            showStudents(document.getElementById('searchStudent').value);
        }
    };
    invoice.open("GET", "deleteInvoice.php?invoice=" + invoice_no, false);
    invoice.send();

}