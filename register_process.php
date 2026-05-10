<?php
$conn = mysqli_connect("localhost", "root", "", "code_with_soumya");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check_stmt = mysqli_prepare($conn, "SELECT email FROM users WHERE email = ?");
    mysqli_stmt_bind_param($check_stmt, "s", $email);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_store_result($check_stmt);

    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script src='script.js'></script>";
    echo "<body style='background:#0d1117;'>"; // Blank black screen during alert

    if(mysqli_stmt_num_rows($check_stmt) > 0) {
        echo "<script>setTimeout(() => { showGlassAlert('error', 'Already Registered', 'This email is already in our database.'); }, 100);</script>";
        echo "<meta http-equiv='refresh' content='3;url=login.html'>";
    } else {
        $stmt = mysqli_prepare($conn, "INSERT INTO users (email, mobile, password) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $email, $mobile, $pass);
        
        if(mysqli_stmt_execute($stmt)) {
            echo "<script>setTimeout(() => { showGlassAlert('success', 'Success!', 'Account created. Please login now.'); }, 100);</script>";
            echo "<meta http-equiv='refresh' content='3;url=login.html'>";
        }
    }
    echo "</body>";
}
?>