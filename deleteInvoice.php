<?php
include('config/dbConfig.php');
$invoice_no = $_GET['invoice'];

$sql = "DELETE FROM `tax_invoices` WHERE `tax_invoices`.`id` = '$invoice_no'";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
