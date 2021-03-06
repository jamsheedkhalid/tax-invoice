<?php
include('config/dbConfig.php');

$familyid = $_REQUEST['familyId'];


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
               
            WHERE   students.familyid = '$familyid'

            AND (
                courses.is_deleted !=1
                 AND
                batches.is_deleted !=1
              )
            ORDER BY students.familyid ASC";

$result = $conn->query($inv);
if ($result->num_rows > 0) {
    $gd_total = $gd_vat = $gd_net = 0;
    while ($row = $result->fetch_assoc()) {
        echo '<div style="width:100%;margin-top:20px;">
                <table id="student_info" style="width:100%;diplay:block; margin-left:auto;margin-right:auto;">
                    <tr>
                        <td colspan="3" style="font-size: 20px"><strong>Name: </strong>' . $row['en_name'] . '</td>
                    </tr>
                    <tr>
                        <td><strong>MOE#: </strong>' . $row['admission_no'] . '</td>
                        <td><strong>Grade: </strong>' . $row['grade'] . '-' . $row['section'] . '</td>
                    </tr>
                </table>
            </div>';
        switch ($row['grade']) {
            case ' KG1 ':
            case ' KG2 ':
                $book = 840;
                $uniform = 90;
                $bus = 3500;
                $tuition = 5570 + 4500 + 3200;
                $installment_1 = 5570;
                $installment_2 = 4500;
                $installment_3 = 3200;
                break;

            case 'GR 1':
            case 'GR 2':
            case 'GR 3':
                $book = 1320;
                $uniform = 100;
                $bus = 3500;
                $installment_1 = 6080;
                $installment_2 = 5500;
                $installment_3 = 3650;
                $tuition = $installment_3 + $installment_2 + $installment_1;
                break;

            case 'GR 4':
                $book = 1320;
                $uniform = 100;
                $bus = 3500;
                $installment_1 = 6080;
                $installment_2 = 6500;
                $installment_3 = 5530;
                $tuition = $installment_3 + $installment_2 + $installment_1;
                break;
            case 'GR 5':
            case 'GR 6':
                $book = 1680;
                $uniform = 100;
                $bus = 3500;
                $installment_1 = 6720;
                $installment_2 = 7000;
                $installment_3 = 4390;
                $tuition = $installment_3 + $installment_2 + $installment_1;
                break;

            case 'GR 7':
            case 'GR 8':
                $book = 1680;
                $uniform = 100;
                $bus = 3500;
                $installment_1 = 6720;
                $installment_2 = 8000;
                $installment_3 = 8120;
                $tuition = $installment_3 + $installment_2 + $installment_1;
                break;
            case 'GR 9':
                $book = 1920;
                $uniform = 100;
                $bus = 3500;
                $installment_1 = 7480;
                $installment_2 = 9500;
                $installment_3 = 11210;
                $tuition = $installment_3 + $installment_2 + $installment_1;
                break;

            case 'GR10':
                $book = 1200;
                $uniform = 100;
                $bus = 3500;
                $installment_1 = 8200;
                $installment_2 = 9500;
                $installment_3 = 10490;
                $tuition = $installment_3 + $installment_2 + $installment_1;
                break;

            case 'GR11':
                $book = 2760;
                $uniform = 100;
                $bus = 3500;
                $installment_1 = 6640;
                $installment_2 = 11500;
                $installment_3 = 10050;
                $tuition = $installment_3 + $installment_2 + $installment_1;
                break;

            case 'GR12':
                $book = 1800;
                $uniform = 100;
                $bus = 3500;
                $installment_1 = 7600;
                $installment_2 = 11000;
                $installment_3 = 9590;
                $tuition = $installment_3 + $installment_2 + $installment_1;
                break;

        }
        $total = (($uniform ) + $book + $tuition );
        $vat_total = ((5 / 100) * $uniform);
        $net_total = ((($uniform + (5 / 100) * $uniform) + $book + $tuition ));

        $gd_total = $gd_total + $total;
        $gd_vat = $gd_vat + $vat_total;
        $gd_net = $gd_vat + $gd_total;

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
                                    <td class="feehead" colspan="3">Uniform</td>
                                    <td class="feehead" align="right" id="uniform_fee">' . $uniform . '</td>
                                    <td class="feehead" align="right">5</td>
                                    <td class="feehead" align="right" id="uniform_vat">' . ((5 / 100) * $uniform) . ' </td>
                                    <td class="feehead" align="right" id="uniform_total">' . ($uniform + (5 / 100) * $uniform) . '</td>
                                </tr>
                                <tr>
                                    <td class="feehead" colspan="3">Books</td>
                                    <td class="feehead" align="right" id="book_fee">' . $book . '</td>
                                    <td class="feehead" align="right" id="book_vat">0</td>
                                    <td class="feehead" align="right">0</td>
                                    <td class="feehead" align="right" id="book_total">' . $book . '</td>
                                </tr>
                                <tr>
                                    <td class="feehead" colspan="3">Tuition Fees <br>
                                        <i>
                                            <small id="f_installment" style="padding-left: 50px">' . $installment_1 . '</small>
                                            <br>
                                            <small id="s_installment" style="padding-left: 50px">' . $installment_2 . '
                                            </small>
                                            <br>
                                            <small id="t_installment" style="padding-left: 50px">' . $installment_3 . '
                                            </small>
                                        </i>


                                    </td>
                                    <td class="feehead" align="right" id="tuition_fee">' . $tuition . '</td>
                                    <td class="feehead" align="right">0</td>
                                    <td class="feehead" align="right" id="tuition_vat">0</td>
                                    <td class="feehead" align="right" id="tuition_total">' . $tuition . '</td>
                                </tr>
                               

                                <tr align="right">
                                    <td class="feehead" colspan="6">Total (AED)</td>
                                    <td class="feehead" align="right" id="total">' . $total . '</td>
                                </tr>
                                <tr align="right">
                                    <td class="feehead" colspan="6">VAT Total (AED)</td>
                                    <td class="feehead" align="right" id="vat_total"> ' . $vat_total . ' </td>
                                </tr>
                                <tr align="right">
                                    <td class="feehead" colspan="6">Net Total (AED)</td>
                                    <td class="feehead" align="right" id="net_total">' . $net_total . '</td>
                                </tr>
                                </tbody>
                            </table>
       ';

    }

//    <tr>
//                                    <td class="feehead" colspan="3">Transportation</td>
//                                    <td class="feehead" align="right" id="transportation_fee">' . $bus . '</td>
//                                    <td class="feehead" align="right">EXE</td>
//                                    <td class="feehead" align="right" id="transportation_vat">-</td>
//                                    <td class="feehead" align="right" id="transportation_total">' . $bus . '</td>
//                                </tr>

    echo '<div class="row"><div id="notes_div" class="col-half">';
    echo '<table class="table-borderless">
              <tr>
                <td style="text-align:left">Payment can be done in CASH/VISA/CHEQUE drawn in favour of Al Sanawbar School or through direct bank transfer</td>
              </tr>
              <tr>
                <td style="text-align:left">
                    <p>Notes: <br>1. Please ensure that the above invoice amount is credited to our account after deduction of all bank charges
                    <br>2. Kindly email student name, grade, Family ID and bank transfer</p>
                </td>
              </tr>
            </table>
        </div>';
    
    echo '<div id="total_div" class="col-half">';
    echo '<br> <table align="right" class="table-bordered tableBorder">
        <thead class="black white-text tableBorder">
        <tr  class="tableBorder"><td>Grand Total</td>
        <td class="tableBorder">Grand VAT Total</td>
        <td class="tableBorder">Grand Net Total</td> </tr>
        </thead>
        <tbody class="tableBorder"  align="right" style="text-align: right"><tr>
        <td class="tableBorder">AED ' . $gd_total . '</td>
        <td class="tableBorder">AED ' . $gd_vat . '</td>
        <td class="tableBorder">AED ' . $gd_net . '</td></tr>
        </tbody>
        </table> ';
    echo '</div>';
    echo '</div>';
}

?>

