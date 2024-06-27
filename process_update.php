<?php

require_once("conn.php");



// Process form data using prepared statements

if (isset($_POST['update'])) 
{


    $id = sanitizeInput($_POST['student_id']);
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


    // Prepare and bind the SQL statement with placeholders
    $sql = "UPDATE `students` SET `student_idnum`='$student_idnum',`student_name`='$student_name',`student_gender`='$student_gender',`student_grade`='$student_grade',`student_section`='$student_section',`student_bdate`='$student_bdate',`student_email`='$student_email',`student_weight`='$student_weight',`student_height`='$student_height',`student_medicalhistory`='$student_medicalhistory',`student_allergy`='$student_allergy',`student_medication`='$student_medication' WHERE `student_id` = '$id'";

    $stmt = mysqli_query($conn, $sql);

// Execute the prepared statement
    if ($stmt) {
        ?>
        <script>
            alert("Update Successful!");
            window.location.href ='studentlist.php?grade=<?=$student_grade;?>&section=A';
        </script>
        <?php

    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the statement and connection

}

if (isset($_POST['inactive'])) 
{
    //var_dump($_POST);
    $id = sanitizeInput($_POST['inactive_id']);
    $inactive_name = sanitizeInput($_POST['inactive_name']);

    $student_x = "UPDATE `students` SET `student_status`='0' WHERE student_id = '$id'";


    $process_inactivation = mysqli_query($conn, $student_x);

    

    if($process_inactivation) 
    {
        ?>
        <script>
            alert("Notice: Success! Student: <?=$inactive_name;?>, mark as inactive!");
            window.location.href ='studentlist.php?grade=7&section=A';
        </script>
        <?php

    } 
    else 
    {

        ?>
        <script>
            alert("Error:<?=mysqli_error($conn);?> Student: <?=$inactive_name;?>, mark as inactive unsuccessful!");
            window.location.href ='studentlist.php?grade=7&section=A';
        </script>
        <?php
        

    }


}

?>
