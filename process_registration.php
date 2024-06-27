<?php

require_once("conn.php");

// Process form data using prepared statements
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the SQL statement with placeholders
    $sql = "INSERT INTO `students` 
            (`student_idnum`, `student_name`, `student_gender`, `student_grade`, `student_section`, `student_bdate`, 
            `student_email`, `student_weight`, `student_height`, `student_medicalhistory`, `student_allergy`, `student_medication`) 
            VALUES (?, ?, ?, ?,?, ?, ?, ?, ?, ?, ? ,?)";

    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters with the values from the form
    mysqli_stmt_bind_param($stmt, "sssssssddsss", $student_idnum, $student_name, $student_gender, $student_grade, $student_section, $student_bdate, $student_email, $student_weight, $student_height, $student_medicalhistory, $student_allergy, $student_medication);

    $rawBdate = date($_POST['student_bdate']);
    //$bdate = date_format(,'Y-m-d');
    // Retrieve data from the form
    $student_idnum = sanitizeInput($_POST['student_idnum']);
    $student_name = sanitizeInput($_POST['student_name']);
    $student_gender = sanitizeInput($_POST['student_gender']);
    $student_grade = sanitizeInput($_POST['student_grade']);
    $student_section = sanitizeInput($_POST['student_section']);
    $student_bdate = sanitizeInput($rawBdate);
    // $student_username = sanitizeInput($_POST['student_username']);
    // $student_password = password_hash($_POST['student_password'], PASSWORD_DEFAULT); // Hash the password
    $student_email = sanitizeInput($_POST['student_email']);
    $student_weight = sanitizeInput($_POST['student_weight']);
    $student_height = sanitizeInput($_POST['student_height']);
    $student_medicalhistory = sanitizeInput($_POST['student_medicalhistory']);
    $student_allergy = sanitizeInput($_POST['student_allergy']);
    $student_medication = sanitizeInput($_POST['student_medication']);
    // $student_plan = sanitizeInput($_POST['student_plan']);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        ?>
                    <script>
                        alert("Registration Successful!");
                        window.location.href ='studentlist.php';
                    </script>
                <?php

    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

?>
