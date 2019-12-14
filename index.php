
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
    <script src="js/generateInvoice.js"></script>
    <script src="js/generateInvoiceAll.js"></script>
    <script src="js/showStudents.js"></script>
    <link rel="stylesheet" type="text/css" href="js/print/print.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
<h1 align="center" style="padding-top: 10px; color: green"><u>TAX INVOICE</u></h1>

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
            <div class="modal-body" id="invoicePrint">
                <div class="container"  >
                    <div style="border: solid black 1px; padding: 5px; he">
                        <div class="row " style="padding: 20px" >
                            <table style="max-width: 100%">
                                <tr>
                                    <td>
                                        <div class="col">
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
                                    </td>

                                    <td>
                                        <div class="col " id="taxInvoice" style="min-width: 45em;">
                                <br>
                                            <table align="right">
                                    <tr><td align="right">
                                            <h2 style="color: green;"><u><b>TAX INVOICE</b></u></h2>
                                            <h6 id="trn">TRN:100270764200003</h6>
                                        </td></tr>
                                </table>
                            </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <hr>
                        <div class="row" style="margin: 5px;">
                            <table class="table table-bordered table-sm" id="billInfo" style="min-width: 100%; ">
                                <tr>
                                    <td>
                                        <div class="col" style="padding-top: 10px; ">
                                Bill To <br>
                                            <table class="table table-borderless table-sm">
                                    <tr>
                                        <td><b>Name</b></td>
                                        <td id="parent_name">: Mr/Mrs. John</td>
                                    </tr>
                                    <tr>
                                        <td><b>Parent ID</b></td>
                                        <td id="parent_id"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tel</b></td>
                                        <td id="parent_tel"></td>
                                    </tr>
                                </table>

                            </div>
                                    </td>
                                    <td>
                                        <div class="col" style="">
                                            <table class="table table-borderless table-sm">

                                                <tr>
                                        <td><b>Invoice No</b></td>
                                        <td>: 123456</td>
                                    </tr>
                                    <tr>
                                        <td><b>Invoice Date</b></td>
                                        <td id="invoice_date">:</td>
                                    </tr>
                                </table>
                            </div>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div style="margin: 5px; padding-top: 25px">
                            <div id="invoiceTable">

                            </div>
                            <div class="row" style="padding: 20px">
                                <table class="table table-bordered table-sm ">
                                    <tr>
                                        <td>
                                            <div class="col tableBorder">
                                    Bank Details: <br>
                                                <table class="table table-sm table-borderless "
                                                       style="border-collapse: collapse;font-size: 14px; min-width: max-content">
                                        <tr>
                                            <td>Bank Name</td>
                                            <td>: Bank of Sharjah</td>
                                        </tr>
                                        <tr>
                                            <td>Branch</td>
                                            <td>: Al Ain</td>
                                        </tr>
                                        <tr>
                                            <td>Account Name</td>
                                            <td>: Al Sanawbar School</td>
                                        </tr>
                                        <tr>
                                            <td>Account No</td>
                                            <td>: 01106-357005</td>
                                        </tr>
                                        <tr>
                                            <td>IBAN</td>
                                            <td>: AED900120000001106357005</td>
                                        </tr>
                                        <tr>
                                            <td>Currency</td>
                                            <td>: AED</td>
                                        </tr>
                                        <tr>
                                            <td>Swift Code</td>
                                            <td>: SHARAEAS</td>
                                        </tr>
                                    </table>
                                </div>
                                        </td>
                                        <td>

                                            <div class="col  notes"
                                                 style="border-collapse: collapse; font-size: 14px; padding: 10px; margin-top: 20px; margin-right: 20px">
                                                <table class="table table-sm table-borderless ">
                                                    <tr>
                                                        <td>
                                                            Payment can be done in CASH/VISA/CHEQUE drawn in favour of
                                                            Al Sanawbar School or
                                                        through direct bank transfer
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <br>
                                                            <p>Notes: <br>
                                                            1. Please ensure that the above invoice amount is credited to our
                                                            account after deduction of all bank charges <br>
                                                            2. Kindly email student name, grade, Family ID and bank transfer</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
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
                                <i>
                                    <small>Principal</small>
                                </i>
                                <br> <br>
                                            ___________________________
                            </div>
                                    </td>
                                    <td width="200px;"></td>
                                    <td>

                                        <div class="col-sm" style="min-width: 50%!important;" align="center">
                                            <i>
                                                <small>Accounts Officer</small>
                                            </i>
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
                <button type="button" class="btn btn-primary" id='printbtn'
                        onclick="printJS({printable: 'invoicePrint',css: 'css/print.css', type: 'html', showModal: true,targetStyles: '*'});">
                    PRINT
                </button>
            </div>
        </div>
    </div>
</div>


</body>