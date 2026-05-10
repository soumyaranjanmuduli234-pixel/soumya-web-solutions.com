<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "code_with_soumya");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL Injection Protection (Secure)
    $stmt = mysqli_prepare($conn, "SELECT id, password FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)) {
        if(password_verify($password, $row['password'])) {
            // Secure Session Management
            session_regenerate_id(true); 
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_email'] = $email;
            
            header("Location: index.php"); // Corrected to .php
            exit();
        } else {
            echo "<script>alert('Invalid Password!'); window.location='login.html';</script>";
        }
    } else {
        echo "<script>alert('User not found!'); window.location='login.html';</script>";
    }
}
?>