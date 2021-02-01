<?php
include('config/dbConfig.php');

$studentId = $_REQUEST['studentId'];

$student_info = "
    SELECT s.id                                   AS sid,
       s.admission_no,
       s.last_name,
       CONCAT(s.first_name, ' ', s.last_name) AS 'student_full_name',
       CONCAT(c.course_name, ' ', b.name)        'grade',
       b.id                                      'batch_id',
       b.name                                    'section'
FROM students s
         INNER JOIN batches b ON s.batch_id = b.id
         INNER JOIN courses c on b.course_id = c.id
WHERE (s.admission_no = '$studentId')
";

$result = $conn->query($student_info);
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo '<h3 align="center"><u>INVOICE</u></h3><br>
              <table style="width:100%">
                <tr>
                    <td>
                            <div align="center">
                                <b>Admission No.: </b><label id=\"student_id\">' . $row['admission_no'] . '</label>
                            </div>
                    </td>
                    <td>
                        <div align="center">
                        <b>Name: </b><label id=\"student_name\">' . $row['last_name'] . '</label>
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            <b> Grade: </b><label id=\"student_grade\">' . $row['grade'] . '</label>
                        </div>
                    </td>
                </tr>
              </table>
              ';
    }
}


//    Invoice
$inv = "
SELECT s.id                                   AS sid,
       s.admission_no,
       s.last_name,
       CONCAT(s.first_name, ' ', s.last_name) AS 'student_full_name',
       CONCAT(c.course_name, ' ', b.name)        'grade',
       b.id                                      'batch_id',
       b.name                                    'section',
       ffc.id                                    'ffc_id',
       ffc.name                                  'ffc_name',
       ffp.receiver_id,
       ffp.amount                                'amount',
       ffp.created_at                            'creation_date',
       ffc.start_date                            'start_date',
       ffc.due_date                              'due_date',
       ffc.is_deleted                            'catch_fees'
FROM `finance_fees` ff
         INNER JOIN students s ON ff.student_id = s.id
         INNER JOIN batches b ON s.batch_id = b.id
         INNER JOIN courses c ON b.course_id = c.id
         INNER JOIN finance_fee_collections ffc ON ff.fee_collection_id = ffc.id
         INNER JOIN financial_years fy ON ffc.financial_year_id = fy.id
         INNER JOIN collection_particulars cp ON ffc.id = cp.finance_fee_collection_id
         INNER JOIN finance_fee_particulars ffp ON ffp.id = cp.finance_fee_particular_id AND (
            (ffp.receiver_id = s.id AND ffp.receiver_type = 'Student') OR
            (ffp.receiver_id = s.student_category_id AND ffp.receiver_type = 'StudentCategory' AND ffp.batch_id = ff.batch_id) OR
            (ffp.receiver_id = s.batch_id AND ffp.receiver_type = 'Batch')
        )
WHERE (s.admission_no = '$studentId')
ORDER BY ffc_name
";

//echo $inv;

$result = $conn->query($inv);
if ($result->num_rows > 0) {
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
            <tbody>';

    while ($row = $result->fetch_assoc()) {

        if (strcmp($row['ffc_name'], 'Uniform') == 0) {
            echo '<tr>
                    <td class="feehead" colspan="3">' . $row['ffc_name'] . '</td>
                    <td class="feehead" align="right" id="uniform_fee">' . $row['amount'] . '</td>
                    <td class="feehead" align="right">5</td>
                    <td class="feehead" align="right" id="uniform_vat">' . (5 / 100) * $row['amount'] . ' </td>
                    <td class="feehead" align="right" id="uniform_total">' . ($row['amount'] + (5 / 100) * $row['amount']) . '</td>
                  </tr>';
        } elseif (strcmp($row['ffc_name'], 'Books') == 0) {
            echo '<tr>
                    <td class="feehead" colspan="3">' . $row['ffc_name'] . '</td>
                    <td class="feehead" align="right" id="uniform_fee">' . $row['amount'] . '</td>
                    <td class="feehead" align="right">0</td>
                    <td class="feehead" align="right" id="uniform_vat">0</td>
                    <td class="feehead" align="right" id="uniform_total">' . $row['amount'] . '</td>
                   </tr>';
        }
    }


    $tuition_sql = "
        SELECT s.id                                   AS sid,
               s.admission_no,
               s.last_name,
               CONCAT(s.first_name, ' ', s.last_name) AS 'student_full_name',
               CONCAT(c.course_name, ' ', b.name)        'grade',
               b.id                                      'batch_id',
               b.name                                    'section',
               ffc.id                                    'ffc_id',
               ffc.name                                  'ffc_name',
               ffp.receiver_id,
               ffp.amount                                'amount',
               ffp.created_at                            'creation_date',
               ffc.start_date                            'start_date',
               ffc.due_date                              'due_date',
               ffc.is_deleted                            'catch_fees'
        FROM `finance_fees` ff
         INNER JOIN students s ON ff.student_id = s.id
         INNER JOIN batches b ON s.batch_id = b.id
         INNER JOIN courses c ON b.course_id = c.id
         INNER JOIN finance_fee_collections ffc ON ff.fee_collection_id = ffc.id
         INNER JOIN financial_years fy ON ffc.financial_year_id = fy.id
         INNER JOIN collection_particulars cp ON ffc.id = cp.finance_fee_collection_id
         INNER JOIN finance_fee_particulars ffp ON ffp.id = cp.finance_fee_particular_id AND (
            (ffp.receiver_id = s.id AND ffp.receiver_type = 'Student') OR
            (ffp.receiver_id = s.student_category_id AND ffp.receiver_type = 'StudentCategory' AND ffp.batch_id = ff.batch_id) OR
            (ffp.receiver_id = s.batch_id AND ffp.receiver_type = 'Batch')
        )
        WHERE (s.admission_no = '$studentId' AND (lower(ffc.name) like '%installment%'))
        ORDER BY ffc_name";

//    echo $tuition_sql;

    $tuition_result = $conn->query($tuition_sql);
    if ($tuition_result->num_rows > 0) {
        echo '<td class="feehead" colspan="3">Tuition Fees <br>
                <i>';
        $tuition = 0;
        while ($row = $tuition_result->fetch_assoc()) {
            echo '<small id = "f_installment" style = "padding-left: 50px" >' . $row['amount'] . '</small ><br>';
            $tuition += $row['amount'];
        }
        echo '</i>
            </td>
            <td class="feehead" align="right" id="tuition_fee">' . $tuition . '</td>
            <td class="feehead" align="right">0</td>
            <td class="feehead" align="right" id="tuition_vat">0</td>
            <td class="feehead" align="right" id="tuition_total">' . $tuition . '</td>';
    }
}


//        <tr>
//                                    <td class="feehead" colspan="3">Transportation</td>
//                                    <td class="feehead" align="right" id="transportation_fee">' . $bus . '</td>
//                                    <td class="feehead" align="right">EXE</td>
//                                    <td class="feehead" align="right" id="transportation_vat">-</td>
//                                    <td class="feehead" align="right" id="transportation_total">' . $bus . '</td>
//                                </tr>


?>

