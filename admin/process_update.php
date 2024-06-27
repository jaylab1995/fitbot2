<?php

require_once("../conn.php");

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
    $student_status = sanitizeInput($_POST['student_status']);


    // Prepare and bind the SQL statement with placeholders
    $sql = "UPDATE `students` SET `student_idnum`='$student_idnum',`student_name`='$student_name',`student_gender`='$student_gender',`student_grade`='$student_grade',`student_section`='$student_section',`student_bdate`='$student_bdate',`student_email`='$student_email',`student_weight`='$student_weight',`student_height`='$student_height',`student_medicalhistory`='$student_medicalhistory',`student_allergy`='$student_allergy',`student_medication`='$student_medication', `student_status` = '$student_status' WHERE `student_id` = '$id'";

    $stmt = mysqli_query($conn, $sql);

// Execute the prepared statement
    if ($stmt) {
        ?>
        <script>
            alert("Update Successful!");
            window.location.href ='admin_studentlist.php?grade=<?=$student_grade;?>';
        </script>
        <?php

    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['teacher'])) 
{
    $teacher_name = sanitizeInput($_POST['teacher_name']);
    $teacher_gender = sanitizeInput($_POST['teacher_gender']);
    $teacher_designation = sanitizeInput($_POST['teacher_designation']);
    $teacher_username = sanitizeInput($_POST['teacher_username']);
    $teacher_password = sanitizeInput($_POST['teacher_password']);
    

    $sql1 = "INSERT INTO `teachers`( `teacher_name`, `teacher_gender`, `teacher_designation`, `teacher_username`, `teacher_password`, `teacher_status`) VALUES ('$teacher_name','$teacher_gender','$teacher_designation','$teacher_username','$teacher_password','1')";


    $result1 = mysqli_query($conn,$sql1);

    if ($result1) 
    {
        ?>
        <script>
            alert("Registration Successful!");
            window.location.href ='admin_teacherlist.php';
        </script>
        <?php
    } 
    else 
    {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['update_teacher'])) 
{
    // Collect and sanitize the form data
    $teacher_id = htmlspecialchars($_POST['teacher_id']);
    $teacher_name = htmlspecialchars($_POST['teacher_name']);
    $teacher_gender = htmlspecialchars($_POST['teacher_gender']);
    $teacher_designation = htmlspecialchars($_POST['teacher_designation']);
    $teacher_username = htmlspecialchars($_POST['teacher_username']);
    $teacher_password = htmlspecialchars($_POST['teacher_password']);



    // Update query with prepared statements
    if (!empty($teacher_password)) {
        $sql = "UPDATE teachers SET teacher_name=?, teacher_gender=?, teacher_designation=?, teacher_username=?, teacher_password=? WHERE teacher_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $teacher_name, $teacher_gender, $teacher_designation, $teacher_username, $teacher_password, $teacher_id);
    } else {
        $sql = "UPDATE teachers SET teacher_name=?, teacher_gender=?, teacher_designation=?, teacher_username=? WHERE teacher_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $teacher_name, $teacher_gender, $teacher_designation, $teacher_username,  $teacher_id);
    }

    // Execute query
    if ($stmt->execute() === TRUE) {
        ?>
        <script>
            alert("Update Successful!");
            window.location.href ='admin_teacherlist.php';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Update Error: <?=$conn->error;?>");
            window.location.href ='admin_teacherlist.php';
        </script>
        <?php
    }

    // Close statement and connection

}

if (isset($_POST['inactive_teacher'])) 
{

    $id = sanitizeInput($_POST['inactive_id']);
    $inactive_name = sanitizeInput($_POST['teacher_name']);

    $teacher_x = "UPDATE `teachers` SET `teacher_status`='0' WHERE teacher_id = '$id'";


    $process_inactivation = mysqli_query($conn, $teacher_x);



    if($process_inactivation) 
    {
        ?>
        <script>
            alert("Notice: Success! Teacher: <?=$inactive_name;?>, mark as inactive!");
            window.location.href ='admin_teacherlist.php';
        </script>
        <?php

    } 
    else 
    {

        ?>
        <script>
            alert("Error:<?=mysqli_error($conn);?> Student: <?=$inactive_name;?>, mark as inactive unsuccessful!");
            window.location.href ='admin_teacherlist.php';
        </script>
        <?php


    }
}
?>
