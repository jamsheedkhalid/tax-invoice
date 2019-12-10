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
                                            <h3 style="color: green;"><u><b>TAX INVOICE</b></u></h3>
                                            <h16>TRN:10000002342345</h16>
                                        </td></tr>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row" style="margin: 5px;">
                            <div class="col-sm-9" style="border: solid black 1px; padding-top: 10px">
                                Bill To <br>
                                <table>
                                    <tr>
                                        <td><b>Name</b></td>
                                        <td>: Mr/Mrs. John</td>
                                    </tr>
                                    <tr>
                                        <td><b>Family Code</b></td>
                                        <td>: 12345</td>
                                    </tr>
                                    <tr>
                                        <td><b>Tel</b></td>
                                        <td>: 050123456</td>
                                    </tr>
                                </table>

                            </div>
                            <div class="col-sm-3" style="border: solid black 1px;">
                                <table>
                                    <br><br>
                                    <tr>
                                        <td><b>Invoice No</b></td>
                                        <td>: 123456</td>
                                    </tr>
                                    <tr>
                                        <td><b>Invoice Date</b></td>
                                        <td>: 30.12.2019</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div style="margin: 5px; padding-top: 25px">


                            <div class="row">
                                <div class="col-sm" align="left">
                                    <b>Student: </b><label> 12345</label> - <label>Abdul Azeez</label>
                                </div>
                                <div class="col-sm" align="center">
                                    <b>Grade: </b><label> GR 1 -2019</label>
                                </div>
                                <div class="col-sm" align="right">
                                    <b>Academic Year: </b><label> AY 2019-2020</label>
                                </div>
                            </div>


                            <table class="table table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th scope="col" colspan="3">Particular</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">VAT(%)</th>
                                    <th scope="col">VAT Amount</th>
                                    <th scope="col">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="3">Uniform</td>
                                    <td align="right">90</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3">Books</td>
                                    <td align="right">1200</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3">Tuition Fees</td>
                                    <td align="right"> 40000</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3">Transportation</td>
                                    <td align="right"> 1000</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>


                            <div class="row">
                                <div class="col-sm-4" align='left'
                                     style="border: solid black 1px; margin: 10px; padding: 5px; font-size: 14px">
                                    <u>Tuition Fee Description:</u>
                                    <table class="">
                                        <tr>
                                            <td>1st Installment</td>
                                            <td>:</td>
                                            <td>5000.00</td>
                                        </tr>
                                        <tr>
                                            <td>2nd Installment</td>
                                            <td>:</td>
                                            <td>8000.00</td>
                                        </tr>
                                        <tr>
                                            <td>3nd Installment</td>
                                            <td>:</td>
                                            <td>9000.00</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm"></div>
                                <div class="col-sm" align="right">
                                    <table class="table table-bordered table-sm">
                                        <tr>
                                            <td>Total(AED)</td>
                                            <td align="right">105000.00</td>
                                        </tr>
                                        <tr>
                                            <td>VAT Total(AED)</td>
                                            <td align="right">500.00</td>
                                        </tr>
                                        <tr>
                                            <td>Net Total(AED)</td>
                                            <td align="right">105500.00</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm">
                                    Bank Details: <br>
                                    <table style="border-collapse: collapse; border: 1px solid black; font-size: 14px">
                                        <tr>
                                            <td>Bank Name</td>
                                            <td>Bank of Sharjah</td>
                                        </tr>
                                        <tr>
                                            <td>Branch</td>
                                            <td>Al Ain</td>
                                        </tr>
                                        <tr>
                                            <td>Account Name</td>
                                            <td>Al Sanawbar School</td>
                                        </tr>
                                        <tr>
                                            <td>Account No</td>
                                            <td>123456987</td>
                                        </tr>
                                        <tr>
                                            <td>IBAN</td>
                                            <td>AES1458789658</td>
                                        </tr>
                                        <tr>
                                            <td>Currency</td>
                                            <td>AED</td>
                                        </tr>
                                        <tr>
                                            <td>Swift Code</td>
                                            <td>SHA21231</td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="col-sm">
                                    One of three columns
                                </div>
                            </div>


                        </div>


                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id='printbtn'
                        onclick="printJS({printable: 'invoicePrint', type: 'html', header: null, documentTitle: null })">
                    PRINT
                </button>
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