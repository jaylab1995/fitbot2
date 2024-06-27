<?php
// Database connection
require_once 'conn.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
            window.location.href ='teacher.php';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Update Error: <?=$conn->error;?>");
            window.location.href ='teacher.php';
        </script>
        <?php
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
