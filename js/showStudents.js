function showStudents(str) {
    var xhttp;
    if (str == "") {
        document.getElementById("tableStudents").innerHTML = "<table style='height:300px; width:100%' class=table-bordered><tr><td style='padding:50px'> <div class='alert alert-danger' role='alert'><strong>No students found!</strong> Please search again.</div></td></tr></table>";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tableStudents").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "showStudents.php?q=" + str, true);
    xhttp.send();
}
