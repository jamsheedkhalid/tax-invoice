
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
    echo " <table class='table table-bordered ' style='text-align:center'> <thead class=thead-dark ><tr>
                                            <th>SI No. <br> رقم</th>
                                            <th>Parent </th>
                                            <th>Name </th>
                                            <th style='font-size:20px'>اسم</th>
                                            <th>Grade</th>
                                            <th>Admission Number <br> رقم القبول</th>
                                            <th>Family ID <br> رقم العائلة</th>
                                            <th>Action <br> عمل</th>
                                        </tr>
                                    </thead>";
    while ($row = $ExecQuery->fetch_assoc()) {
        $data = array(
            0 => $row['admission_no'],
            1 => $row['en_name'],
            2 => $row['parent_name'],
            3 => $row['familyid'],
            4 => $row['parent_number'],
            5 => date("d-m-Y"),
            6 => $row['grade'],
            7 => $row['section'],

        );

        $admission = $row['admission_no'];
        $name = $row['en_name'];

        echo"<tr><td>".++$si."</td>".
            "<td style='text-align:left'>".$row['parent_name']."</td>".
            "<td style='text-align:left'>".$row['en_name']."</td>".
            "<td style='text-align:right'>".$row['ar_name']."</td>".
            "<td style='text-align:left'>" . $row['grade'] . " - " . $row['section'] . "</td>" .
            "<td>".$row['admission_no']."<br>". engtoarabic($row['admission_no'])."</td>".
            "<td>".$row['familyid']."<br>". engtoarabic($row['familyid'])."</td>"
            . "<td><button title='Generate Tax Invoice' onclick='generateInvoice( " . json_encode($data) . " )' data-toggle='modal' value=" . $row['en_name'] . " data-target='#invoiceModalCenter' class='btn btn-danger btn-sm'>Generate Invoice</button>"
            . "</td></tr>";

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


