function saveBookInvoice(student_id) {
    var familyid = document.getElementById('parent_id').innerText;
    // alert(familyid);
    // alert(student_id);
    var save = new XMLHttpRequest();
    save.onreadystatechange = function () {
        if (this.readyState === 4) {
            // alert('success');
        }
    };
    save.open("GET", "saveBookInvoice.php?family_Id=" + familyid + "&student_id=" + student_id, false);
    save.send();

}