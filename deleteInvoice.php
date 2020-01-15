<?php
include('config/dbConfig.php');
$invoice_no = $_GET['invoice'];

$sql = "UPDATE `tax_invoices`  SET is_deleted = '1' WHERE `tax_invoices`.`id` = '$invoice_no'";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
