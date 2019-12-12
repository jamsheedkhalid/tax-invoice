
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
                    <div style="border: solid black 1px; padding: 5px">
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
                                        <div class="col " id="taxInvoice" style="min-width: 50em;">
                                <br>
                                            <table align="right">
                                    <tr><td align="right">
                                            <h2 style="color: green;"><u><b>TAX INVOICE</b></u></h2>
                                            <h6 id="trn">TRN:10000002342345</h6>
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
                                            <table class="table table-borderless">
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
                                            <table class="table table-borderless">

                                                <tr>
                                                    <br><br>
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

                            <table>
                                <tr>
                                    <td>
                                        <div class="col" align="left">
                                    <b>Student: </b><label id="student_id"></label> - <label id="student_name"></label>
                                </div>
                                    </td>
                                    <td>
                                        <div class="col" align="center">
                                    <b>Grade: </b><label id="student_grade"></label>
                                </div>
                                    </td>
                                    <td>
                                        <div class="col" align="right">
                                            <b>AY: </b><label id="academic_year"></label>
                                </div>
                                    </td>
                                </tr>
                            </table>


                            <table class="table table-bordered table-sm" id="feeTable" style="min-width: 100%">
                                <thead>
                                <tr>
                                    <th class="feehead" scope="col" colspan="3">Particular</th>
                                    <th class="feehead" scope="col">Amount</th>
                                    <th class="feehead" scope="col">VAT(%)</th>
                                    <th class="feehead" scope="col">VAT Amount</th>
                                    <th class="feehead" scope="col">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="feehead" colspan="3">Uniform</td>
                                    <td class="feehead" align="right" id="uniform_fee"></td>
                                    <td class="feehead" align="right">5</td>
                                    <td class="feehead" align="right" id="uniform_vat"></td>
                                    <td class="feehead" align="right" id="uniform_total"></td>
                                </tr>
                                <tr>
                                    <td class="feehead" colspan="3">Books</td>
                                    <td class="feehead" align="right" id="book_fee"></td>
                                    <td class="feehead" align="right" id="book_vat">0</td>
                                    <td class="feehead" align="right" id="book_total"></td>
                                    <td class="feehead" align="right">0</td>
                                </tr>
                                <tr>
                                    <td class="feehead" colspan="3">Tuition Fees <br>
                                        <i>
                                            <small id="f_installment" style="padding-left: 50px"></small>
                                            <br>
                                            <small id="s_installment" style="padding-left: 50px"> 2nd Installment :
                                                8000.00
                                            </small>
                                            <br>
                                            <small id="t_installment" style="padding-left: 50px"> 3nd Installment :
                                                9000.00
                                            </small>
                                        </i>


                                    </td>
                                    <td class="feehead" align="right" id="tuition_fee"></td>
                                    <td class="feehead" align="right">0</td>
                                    <td class="feehead" align="right" id="tuition_vat">0</td>
                                    <td class="feehead" align="right" id="tuition_total"></td>
                                </tr>
                                <tr>
                                    <td class="feehead" colspan="3">Transportation</td>
                                    <td class="feehead" align="right" id="transportation_fee"></td>
                                    <td class="feehead" align="right">NA</td>
                                    <td class="feehead" align="right" id="transportation_vat">-</td>
                                    <td class="feehead" align="right" id="transportation_total"></td>
                                </tr>

                                <tr align="right">
                                    <td class="feehead" colspan="6">Total (AED)</td>
                                    <td class="feehead" align="right" id="total"></td>
                                </tr>
                                <tr align="right">
                                    <td class="feehead" colspan="6">VAT Total (AED)</td>
                                    <td class="feehead" align="right" id="vat_total"></td>
                                </tr>
                                <tr align="right">
                                    <td class="feehead" colspan="6">Net Total (AED)</td>
                                    <td class="feehead" align="right" id="net_total"></td>
                                </tr>
                                </tbody>
                            </table>

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

                                <div class="col-sm-8"
                                     style="border-collapse: collapse; border: 1px solid black; font-size: 14px; padding: 10px; margin-top: 20px; margin-right: 20px">
                                    <table>
                                        <tr>
                                            Payment can be done in CASH/CHEQUE drawn in favour of Al Sanawbar School or
                                            through direct bank transfer
                                        </tr>
                                        <tr>
                                            <p><br> </br>Notes: <br>
                                                1. Please ensure that the above invoice amount is credited to our
                                                account after deduction of all bank charges <br>
                                                2. Kindly email student name, grade, Family ID and bank transfer</p>
                                        </tr>
                                    </table>
                                </div>
                            </div>


                        </div>

                        <hr>
                        <div align="center" class="row" style="margin-top: 100px; margin-bottom: 50px">
                            <div class="col-sm">
                                <i>
                                    <small>Principal</small>
                                </i>
                                <br> <br>
                                ______________________________
                            </div>

                            <div class="col-sm">
                                <i>
                                    <small>Accounts Officer</small>
                                </i>
                                <br> <br>
                                ______________________________
                            </div>
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

<script>
    function PrintElem(elem) {
        var mywindow = window.open('', 'PRINT', 'height=400,width=600');

        mywindow.document.write('<html><head><title>' + document.title + '</title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write('<h1>' + document.title + '</h1>');
        mywindow.document.write(document.getElementById(elem).innerHTML);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>
</body>