<!doctype html>
<head>
    <title>TAX INVOICE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>

    <script src="js/print/print.min.js"></script>
    <link rel="stylesheet" type="text/css" href="js/print/print.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">



</head>
<body>
<h1 align="center" style="padding-top: 10px"><u>TAX INVOICE</u></h1>

<div class="col-10" id="searchBar">
    <div class="col-8">
        <div class="form-group ">
            <label for="searchStudent">Search  | بحث  </label>
            <input  type="text" class="form-control" id="searchStudent" onkeyup="showStudents(this.value)" aria-describedby="searchHelp" placeholder="">
            <small id="searchHelp" class="form-text text-muted"><b>Enter family ID, student ID, parent name, student name |  أدخل رقم العائلة  ، رقم الطالب ،اسم الوالدين , اسم الطالب </b></small>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">

    </div>
    <div class="col-10">
        <div id='tableStudents' style="padding-top: 20px;">
        </div>
    </div>
    <div class="col">
    </div>
</div>

<div   class="modal fade " id="invoiceModalCenter" tabindex="-1" role="dialog" aria-labelledby="invoiceModalCenterTitle"
       aria-hidden="true">

    <div class="modal-dialog modal-fluid modal-dialog-scrollable modal-dialog-centered" role="document">


        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tax Invoice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="invoicePrint" >
                <div class="container"  >
                    <div style="border: solid black 1px; padding: 5px">
                        <div class="row " style="padding: 20px" >
                            <div class="col-sm">
                                <table>
                                    <tr>
                                        <td>
                                            <img src="assets/sanawbar-logo.jpeg" width="80px" height="80px" style="margin-right: 10px"></td>
                                        <td>
                                            <h10> <b>AL SANAWABAR SCHOOL </b></h10><br>
                                            <small> Manaseer School Road, P.o Nox 1781</small><br>
                                            <small> TEL: 03 76798889</small><br>
                                            <small> www.alsanawbarschool.com</small>
                                        </td></tr>
                                </table>
                            </div>
                            <div class="col-sm">
                            </div>
                            <div class="col-sm">
                                <br>
                                <table align="right" >
                                    <tr><td align="right">
                                            <h3 ><u><b>TAX INVOICE</b></u></h3>
                                            <h16>TRN:10000002342345</h16>
                                        </td></tr>
                                </table>
                            </div>
                        </div>
                        <hr>
                        


                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"  id='printbtn'
                        onclick="printJS({printable: 'invoicePrint', type: 'html', header: null, documentTitle: null, ignoreElements: ['', ''], honorColor: true, css: 'css/print.css'})">PRINT</button>
            </div>
        </div>
    </div>
</div>





<script>
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
</script>

</body>