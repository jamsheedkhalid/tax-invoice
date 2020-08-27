<?php
include('config/dbConfig.php');

$studentId = $_REQUEST['studentId'];

$inv = "SELECT DISTINCT
                 students.last_name en_name, students.first_name ar_name,
                 students.admission_no admission_no, students.familyid familyid,
                 guardians.first_name parent_name, guardians.mobile_phone parent_number,
                 batches.name section, courses.course_name grade
                    FROM students INNER JOIN guardians ON students.immediate_contact_id = guardians.id
                INNER JOIN
                    batches ON students.batch_id = batches.id
                INNER JOIN
                    courses ON batches.course_id = courses.id
               
            WHERE   students.admission_no= '$studentId'

            AND (
                courses.is_deleted !=1
                 AND
                batches.is_deleted !=1
              )
            ORDER BY students.familyid ASC";

//echo $inv;

$result = $conn->query($inv);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '
<h3 align="center"><u>BOOKS INVOICE</u></h3> <br>
<table>
                                <tr>
                                    <td>
                                        <div class=\"col\" align=\"left\">
                                    <b>Student: </b><label id=\"student_id\">' . $row['admission_no'] . '</label> - <label id=\"student_name\">' . $row['en_name'] . '</label>
                                </div>
                                    </td>
                                    <td>
                                        <div class=\"col\" align=\"center\">
                                    <b> Grade: </b><label id=\"student_grade\">' . $row['grade'] . '-' . $row['section'] . '</label>
                                </div>
                                    </td>
                                </tr>
                            </table>
';
        switch ($row['grade']) {
            case ' KG1 ':
            case ' KG2 ':
                $book = 840;
                break;

            case 'GR 1':
            case 'GR 2':
            case 'GR 3':
                $book = 1320;
                break;

            case 'GR 4':
                $book = 1320;
                break;
            case 'GR 5':
            case 'GR 6':
                $book = 1680;
                break;

            case 'GR 7':
            case 'GR 8':
                $book = 1680;
                break;
            case 'GR 9':
                $book = 1920;
                break;

            case 'GR10':
                $book = 1200;
                break;

            case 'GR11':
                $book = 2760;
                break;

            case 'GR12':
                $book = 1800;
                break;

        }

        echo '
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
                                    <td class="feehead" colspan="3">Books</td>
                                    <td class="feehead" align="right" id="book_fee">' . $book . '</td>
                                    <td class="feehead" align="right" id="book_vat">0</td>
                                    <td class="feehead" align="right">0</td>
                                    <td class="feehead" align="right" id="book_total">' . $book . '</td>
                                </tr>

                                <tr align="right">
                                    <td class="feehead" colspan="6">Total (AED)</td>
                                    <td class="feehead" align="right" id="total">' . $book . '</td>
                                </tr>
                                <tr align="right">
                                    <td class="feehead" colspan="6">VAT Total (AED)</td>
                                    <td class="feehead" align="right" id="vat_total"> 0 </td>
                                </tr>
                                <tr align="right">
                                    <td class="feehead" colspan="6">Net Total (AED)</td>
                                    <td class="feehead" align="right" id="net_total">' . $book . '</td>
                                </tr>
                                </tbody>
                            </table>
       
       ';

    }
}

?>

