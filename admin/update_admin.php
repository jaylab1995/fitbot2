<?php
// Database connection
require_once '../conn.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize the form data
    $user_id = htmlspecialchars($_POST['user_id']);

    $user_name = htmlspecialchars($_POST['user_name']);
    $user_username = htmlspecialchars($_POST['user_username']);
    $user_password = htmlspecialchars($_POST['user_password']);



    // Update query with prepared statements
    if (!empty($user_password)) {
        $sql = "UPDATE users SET user_name=?, user_username=?, user_password=? WHERE user_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $user_name, $user_username, $user_password, $user_id);
    } else {
        $sql = "UPDATE users SET user_name=?, user_username=? WHERE user_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $user_name, $user_username, $user_id);
    }

    // Execute query
    if ($stmt->execute() === TRUE) {
        ?>
        <script>
            alert("Update Successful!");
            window.location.href ='admin_account.php';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Update Error: <?=$conn->error;?>");
            window.location.href ='addmin_account.php';
        </script>
        <?php
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
