
<?php
include('config/dbConfig.php');
$search = $_GET['q'];

$sql= "SELECT DISTINCT
                 students.last_name en_name, students.first_name ar_name,
                 students.admission_no admission_no, students.familyid familyid,
                 guardians.first_name parent_name, guardians.mobile_phone parent_number,
                 batches.name section, courses.course_name grade
                    FROM students INNER JOIN guardians ON students.familyid = guardians.familyid
                INNER JOIN
                    batches ON students.batch_id = batches.id
                INNER JOIN
                    courses ON batches.course_id = courses.id
               
            WHERE students.admission_no LIKE '$search' 
               OR  students.familyid LIKE '$search' 
               OR guardians.first_name LIKE '$search'
               OR students.first_name LIKE N'$search%' 
               OR students.middle_name LIKE N'$search%' 
               OR students.last_name LIKE N'$search%' 
            AND (
                courses.is_deleted !=1
                 AND
                batches.is_deleted !=1
              )
            ORDER BY students.familyid ASC";
//echo $sql;
$ExecQuery = MySQLi_query($conn, $sql);
if ($ExecQuery->num_rows > 0) {
    $si =0;
    echo " <table class='table table-bordered ' style='text-align:center;'> 
 <thead class=thead-dark style='width: 100%!important; '><tr>
                                            <th>SI No. <br> رقم</th>
                                            <th>Parent </th>
                                            <th>Name </th>
                                            <th>Grade</th>
                                            <th>Admission Number <br> رقم القبول</th>
                                            <th>Family ID <br> رقم العائلة</th>
                                            <th colspan='2'>Action <br> عمل</th>
                                        </tr>
                                    </thead>
                           ";
    while ($row = $ExecQuery->fetch_assoc()) {
        $data = array(
            0 => $row['admission_no'],
            1 => $row['en_name'],
            2 => $row['parent_name'],
            3 => $row['familyid'],
            4 => $row['parent_number'],
            6 => $row['grade'],
            7 => $row['section'],

        );
        $admission = $row['admission_no'];
        $name = $row['en_name'];

        $invoice = "SELECT * from tax_invoices WHERE family_id = '$row[familyid]' AND student_admission = '$row[admission_no]'
        AND is_single = 1 AND is_deleted = 0";
        $Result = MySQLi_query($conn, $invoice);
        if ($Result->num_rows > 0) {
            while ($rowInvoice = $Result->fetch_assoc()) {
                $has_invoice = 1;
                $data[8] = $rowInvoice['id'];
                $data[5] = $rowInvoice['invoice_date'];
//                $data = array(
//                    8 => $rowInvoice['id'],
//                    5 => $rowInvoice['invoice_date']
//                );
            }
        } else {
            $has_invoice = 0;

        }

        $invoiceAll = "SELECT * from tax_invoices WHERE family_id = '$row[familyid]'
        AND is_multiple = 1 AND is_deleted = 0";
        $ResultAll = MySQLi_query($conn, $invoiceAll);
        if ($ResultAll->num_rows > 0) {
            while ($rowInvoiceAll = $ResultAll->fetch_assoc()) {
                $has_invoiceAll = 1;
                $data[9] = $rowInvoiceAll['id'];
                $data[10] = $rowInvoiceAll['invoice_date'];

            }
        } else {
            $has_invoiceAll = 0;

        }

        $bookInvoice = "SELECT * from tax_invoices WHERE family_id = '$row[familyid]' AND student_admission = '$row[admission_no]'
        AND is_book = 1 AND is_deleted = 0";
        $resultBook = MySQLi_query($conn, $bookInvoice);
        if ($resultBook->num_rows > 0) {
            while ($rowBookInvoice = $resultBook->fetch_assoc()) {
                $has_book = 1;
                $data[11] = $rowBookInvoice['id'];
                $data[12] = $rowBookInvoice['invoice_date'];

            }
        } else {
            $has_book = 0;

        }

        echo"<tr><td>".++$si."</td>".
            "<td style='text-align:left'>".$row['parent_name']."</td>".
            "<td style='text-align:left'>" . $row['en_name'] . "<br>" . $row['ar_name'] . "</td>" .
//            "<td style='text-align:right'>".$row['ar_name']."</td>".
            "<td style='text-align:left'>" . $row['grade'] . " - " . $row['section'] . "</td>" .
            "<td>".$row['admission_no']."<br>". engtoarabic($row['admission_no'])."</td>".
            "<td>" . $row['familyid'] . "<br>" . engtoarabic($row['familyid']) . "</td>";

        if ($has_book == 1) {
            echo "<td><button id='btnViewBookInvoice' title='View Tax Invoice for Books' onclick='viewBookInvoice( " . json_encode($data) . " )' data-toggle='modal' data-target='#invoiceModalCenter' class='btn btn-success btn-sm'>View Book Invoice</button> ";
        } else {
            echo "<td><button id='btnGenerateBookInvoice' title='Generate Tax Invoice for Books' onclick='generateBookInvoice( " . json_encode($data) . " )' class='btn btn-primary btn-sm'>Generate Book Invoice</button> ";

        }


        if ($has_invoice == 1) {
            echo "<td><button id='btnViewInvoice' title='View Fees Tax Invoice' onclick='viewInvoice( " . json_encode($data) . " )' data-toggle='modal' data-target='#invoiceModalCenter' class='btn btn-success btn-sm'>View Invoice</button> ";
        } else {
            echo "<td><button id='btnGenerateInvoice' title='Generate Fees Tax Invoice' onclick='generateInvoice( " . json_encode($data) . " )' class='btn btn-primary btn-sm'>Generate Invoice</button> ";

        }

        if ($has_invoiceAll == 1) {
            echo " <button title='View Fees Tax Invoice for All' onclick='viewInvoiceALL( " . json_encode($data) . " )'
                  data-toggle='modal' data-target='#invoiceModalCenter'
                  class='btn btn-success btn-sm'>View Invoice All </button>"
                . "</td></tr>";
        } else {
            echo " <button title='Generate Fees Tax Invoice for All' onclick='generateInvoiceALL( " . json_encode($data) . " )'   
                  class='btn btn-primary btn-sm'>Generate Invoice All </button>"
                . "</td></tr>";
        }

    }

    echo "</table>";
} else echo "<table style='height:300px; width:100%' class=table-bordered><tr><td style='padding:50px'> <div class='alert alert-danger' role='alert'><strong>No students found!</strong> Please search again.</div></td></tr></table>";

?>

<?php
function engtoarabic($str){
    $western_arabic = array('0','1','2','3','4','5','6','7','8','9');
    $eastern_arabic = array('٠','١','٢','٣','٤','٥','٦','٧','٨','٩');

    $str = str_replace($western_arabic, $eastern_arabic, $str);
    return $str;
}


