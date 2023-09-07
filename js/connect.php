<?php
$dsn = "Driver={SQL Server};Server=vendorserver;Database=registered_DB";
$username = "joudy";
$password = "February2003!";

$connection = odbc_connect($dsn, $username, $password);

if ($connection) {
    echo "Connected to SQL Server successfully";
} else {
    echo "Connection failed: " . odbc_errormsg();
}
?>
