<?php
include('config/dbConfig.php');
include_once 'functions.php';
session_start();
checkLoggedIn()
?>

<!doctype html>
<head>
    <title>Fees TAX INVOICE</title>
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
    <script src="js/generateInvoice.js"></script>
    <script src="js/generateInvoiceAll.js"></script>
    <script src="js/generateBookInvoice.js"></script>
    <script src="js/saveBookInvoice.js"></script>
    <script src="js/saveInvoice.js"></script>
    <script src="js/saveInvoiceAll.js"></script>
    <script src="js/showStudents.js"></script>
    <script src="js/deleteInvoice.js"></script>
    <link rel="stylesheet" type="text/css" href="js/print/print.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<script>

</script>

<body>
<div class="row">
    <div class="col-sm"></div>
    <div class="col-sm"><h1 align="center" style="padding-top: 10px; color: green"><u>FEES TAX INVOICE</u></h1></div>
    <div class="col-sm" style="margin-left: auto; padding-top: 15px">
        <form action="logout.php" style="float: right;padding-top: 5px; padding-right: 10px;margin-left: 5px">
            <button type='submit' href='logout.php' class="btn btn-danger btn-sm">
                <span class="glyphicon glyphicon-log-out"></span> Log out
            </button>
        </form>
    </div>
</div>

<div class="col-10" id="searchBar">
    <div class="col-8">
        <div class="form-group ">
            <label for="searchStudent">Search | بحث </label>
            <input type="text" class="form-control" id="searchStudent" onkeyup="showStudents(this.value)"
                   aria-describedby="searchHelp" placeholder="">
            <small id="searchHelp" class="form-text text-muted"><b>Enter family ID, student ID, parent name, student
                    name | أدخل رقم العائلة ، رقم الطالب ،اسم الوالدين , اسم الطالب </b></small>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">

    </div>
    <div class="col-12" style="padding: 30px">
        <div id='tableStudents' style="padding-top: 20px; height: 80vh; overflow-y: scroll; ">
        </div>
    </div>
    <div class="col">
    </div>
</div>

<div class="modal fade " id="invoiceModalCenter" tabindex="-1" role="dialog" aria-labelledby="invoiceModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-fluid modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Fees Tax Invoice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="invoicePrint">
                <div class="container">
                    <div style="border: solid black 1px; padding: 5px;">
                        <div class="row" id="school_info_div">
                            <table id="school_info_table" style="max-width: 100%;display: block;margin-left: auto;margin-right: auto;">
                                <tr>
                                    <td>
                                        <div class="col">
                                            <table id='school_info'>
                                                <tr>
                                                    <td>
                                                        <img src="assets/sanawbar-logo.jpeg" width="80px" height="80px"
                                                             style="margin-right: 10px"></td>
                                                    <td>
                                                        <h10><b>AL SANAWABAR SCHOOL </b></h10>
                                                        <br>
                                                        <small> Manaseer School Road, P.o Box 1781</small>
                                                        <br>
                                                        <small> TEL: 03 76798889</small>
                                                        <br>
                                                        <small> www.alsanawbarschool.com</small>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="col " id="taxInvoice" style="min-width: 45em;">
                                            <table align="right">
                                                <tr>
                                                    <td align="right">
                                                        <h2 style="color: green;"><u><b>FEES TAX INVOICE</b></u></h2>
                                                        <h6 id="trn">TRN:100270764200003</h6>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <hr>
                        <div class="row">
                            <table id="bill_info" style="margin-left: auto;margin-right: auto;width: 90%;">
                                <tr>
                                    <td colspan="4">
                                            <strong>Bill To</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Name</b></td>
                                    <td id="parent_name">: Mr/Mrs. John</td>
                                    <td><b>Invoice No</b></td>
                                    <td>: <label id="invoice_no">123456</label></td>
                                </tr>
                                <tr>
                                    <td><b>Parent ID</b></td>
                                    <td> : <label id="parent_id"></label></td>
                                    <td><b>Invoice Date</b></td>
                                    <td id="invoice_date">:</td>
                                </tr>
                                <tr>
                                    <td><b>Tel</b></td>
                                    <td id="parent_tel"></td>
                                    <td><b>Academic Year</b></td>
                                    <td>
                                        <label id='academic_year_label' hidden>:2020 - 2021</label>
                                        <select id='academic_years' onchange='update_academic_year_label()'></select>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div style="margin: 5px; padding-top: 10px">
                            <div id="invoiceTable"></div>
                        </div>
                        <br><br>
                        <tr>

                       <h4>BANK DETAILS</h4> 
                        <div class="row" style="margin:2px;">
                            <div id="bank_div_left"  class="col">
                                <table id="bank_left" align="left" >
                                <tr  align="left" >
                                    <th>Bank Name</th>
                                    <td>Bank of Sharjah</td>
                                </tr>
                                <tr  align="left" >
                                    <th>Branch</th>
                                    <td>Al Ain</td>
                                </tr>
                                <tr  align="left" >
                                    <th>Account Name</th>
                                    <td>Al Sanawbar School</td>
                                </tr>
                                <tr  align="left" >
                                    <th>Account No</th>
                                    <td>01106-357005</td>
                                </tr>
                                <tr  align="left" >
                                    <th>IBAN</th>
                                    <td>AED9 001 200 000 011 063 57 005</td>
                                </tr>
                                <tr  align="left" >
                                    <th>Currency</th>
                                    <td>AED</td>
                                </tr>
                                <tr  align="left" >
                                    <th>Swift Code</th>
                                    <td>SHARAEAS</td>
                                </tr>
                            </table>
                        </div>
                        <div id="bank_div_right"  class="col">
                        <table id="bank_right"  align="left">
                                <tr  align="left">
                                    <th>Bank Name</th>
                                    <td>FAB</td>
                                </tr>
                                <tr  align="left">
                                    <th>Branch</th>
                                    <td>Al Ain</td>
                                </tr>
                                <tr  align="left">
                                    <th>Account Name</th>
                                    <td>Al Sanawbar School</td>
                                </tr>
                                <tr  align="left">
                                    <th>Account No</th>
                                    <td>10110-020366-58016</td>
                                </tr>
                                <tr  align="left">
                                    <th>IBAN</th>
                                    <td>AE42 035 101 100 203 665 80 16</td>
                                </tr>
                                <tr  align="left">
                                    <th>Currency</th>
                                    <td>AED</td>
                                </tr>
                                <tr  align="left">
                                    <th>Swift Code</th>
                                    <td>FGBMAEAA</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                        <hr>
                        <div align="center" class="row" style="margin-top: 50px; margin-bottom: 50px">
                            <table align="center">
                                <tr>
                                    <td>
                                        <div class="col-sm" style="min-width: 50%!important;" align="center">
                                            <i><small>Administrator</small></i>
                                            <br> <br>
                                            ___________________________
                                        </div>
                                    </td>
                                    <td width="200px;"></td>
                                    <td>
                                        <div class="col-sm" style="min-width: 50%!important;" align="center">
                                            <i><small>Accounts Officer</small></i>
                                            <br> <br>
                                            ___________________________
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="deleteInvoice(document.getElementById('invoice_no').innerText)">Delete</button>
                <button type="button" class="btn btn-warning" id='printbtn'onclick="printJS({printable: 'invoicePrint',css: 'css/print.css', type: 'html', showModal: true,targetStyles: '*', ignoreElements: ['academic_years']});">PRINT</button>
            </div>
        </div>
    </div>
</div>

<script>
    function update_academic_year_label(){
        document.getElementById('academic_year_label').innerHTML = ':' + document.getElementById('academic_years').options[ document.getElementById('academic_years').selectedIndex].text
    }
    let yearsArray = [];
    httpyears = new XMLHttpRequest();
    httpyears.onreadystatechange = function () {
        if (this.readyState === 4) {
            let str = this.responseText;
            yearsArray = str.split("\t");
        }
    };
    httpyears.open("GET", "sql/initAcademicYears.php", false);
    httpyears.send();
    let select = document.getElementById('academic_years');
    var length = select.options.length;
    for (i = length-1; i >= 0; i--) {
        select.options[i] = null;
    }
    for (i = 0; i<yearsArray.length-1; i++ ) {
        select.add(new Option(yearsArray[i]));
    }
</script>

</body>