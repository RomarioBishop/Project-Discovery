<?php
$databaseDate = new DateTime("2024-01-01");

$currentDate = new DateTime("2024-01-01");

//calulate the difference in months
$intervals = $databaseDate->diff($currentDate);

$monthsDifference = $intervals->m + ($intervals->y * 12);
echo $monthsDifference . "<br>";
// If the current date is ahead of the last payment date or it's the same month, set payment status to true
if ($databaseDate >= $currentDate || $monthsDifference == 0 || $monthsDifference <= 2) {
    $paymentStatus = true;
    $arrears = false;
    echo "Payment status: " . ($paymentStatus ? "Paid" : "Unpaid");
    echo "<br>";
    if ($monthsDifference > 0 && $monthsDifference <= 2) {
        $prohibition = true;
        $prohibition_months = $monthsDifference;
        echo "Prohibition status: In Prohibition";
        echo "<br>";
        echo "Overdue by: " . $prohibition_months;
    }
} else {
    $paymentStatus = false;
    $arrears = true;
    $arrears_months = $monthsDifference;
    echo "Payment status: " . ($paymentStatus ? "Paid" : "Unpaid");
    echo "<br>";
    echo "Arrears status: " . ($arrears ? "In Arrears, Not Subscribed" : "Still counted as Paid");
    echo "<br>";
    echo "Overdue by: " . $arrears_months;
}
