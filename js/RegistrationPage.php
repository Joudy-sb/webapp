<?php
$serverName = "vendorserver"; // Replace with your SQL Server name
$connectionOptions = array(
    "Database" => "registered_DB", // Replace with your database name
    "Uid" => "joudy",          // Replace with your username
    "PWD" => "February2003!"           // Replace with your password
);

// Establish the SQL Server connection
$connection = sqlsrv_connect($serverName, $connectionOptions);

if ($connection === false) {
    die(print_r(sqlsrv_errors(), true));
}

if (isset($_POST['submit'])) {
    // User input data
    $employeeFullName = $_POST['employee_full_name'];
    $employeeCompanyID = $_POST['employee_company_id'];
    $employeeGovnID = $_POST['employee_govn_id'];
    $employeePosition = $_POST['employee_position'];
    $employeeDOB = $_POST['employee_dob'];
    $employeeWorkEmail = $_POST['employee_work_email'];
    $companyName = $_POST['company_name'];
    $companyContactEmail = $_POST['company_contact_email'];
    $companyPhoneNumber = $_POST['company_phone_number'];
    $companyRegistrationNumber = $_POST['company_registration_number'];
    $companyType = $_POST['company_type'];
    $companyMOFID = $_POST['company_mof_id'];

    // Construct a SQL SELECT query to check if the data exists in the database
    $selectQuery = "SELECT * FROM registered_DB WHERE
                    [Employee Full Name] = '$employeeFullName' AND
                    [Employee Company ID Number] = '$employeeCompanyID' AND
                    [Employee Govn ID Number] = '$employeeGovnID' AND
                    [Employee Title/Position] = '$employeePosition' AND
                    [Employee Date of Birth] = '$employeeDOB' AND
                    [Employee Work Email Address] = '$employeeWorkEmail' AND
                    [Company Name] = '$companyName' AND
                    [Company's Contact Email] = '$companyContactEmail' AND
                    [Company's Phone Number] = '$companyPhoneNumber' AND
                    [Company's Certificate of Registration Number] = '$companyRegistrationNumber' AND
                    [Company's Type as Registered in Governmental authorities] = '$companyType' AND
                    [Company Ministry of Finance ID] = '$companyMOFID'";

    // Execute the SELECT query
    $result = sqlsrv_query($connection, $selectQuery);

    // Check if any rows were returned
    if ($result === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_has_rows($result)) {
        // Data exists in the database
        echo "Data already exists in the database.";
    } else {
        // Data does not exist in the database
        echo "Data does not exist in the database.";
    }

    // Close the SQL Server connection
    sqlsrv_close($connection);
}
?>
