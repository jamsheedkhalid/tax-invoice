<?php
include('config/dbConfig.php');

$studentId = $_REQUEST['student_id'];
$familyid = $_REQUEST['family_Id'];


$sql = "SELECT * from tax_invoices WHERE family_id = '$familyid' AND student_admission = '$studentId'
        AND is_single = 1 AND is_deleted = 0";
$ExecQuery = MySQLi_query($conn, $sql);
if ($ExecQuery->num_rows > 0) {
    echo "<script>alert('Invoice already exists!')</script>";
} else {
    $sql = "INSERT INTO `tax_invoices` (`id`, `family_id`, `student_admission`, `is_single`, `is_multiple`, `is_book`, `invoice_date`,  `is_deleted` , `created_at`, `updated_at`) 
   VALUES (NULL, '$familyid', '$studentId', '1', '0', '0', current_date(),'0', current_timestamp(), current_timestamp())";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('New invoice saved successfully')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);