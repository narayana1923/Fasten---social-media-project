<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["emailaddress"];
    $pass = $_POST["password"];
    $conn = new mysqli("localhost", "root", "", "fasten");
    if ($conn->connect_error) {
        die("Connection cannot be established " . $conn->connect_error);
    }
    $sql = "select email, password,username from fasten_user where email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($email == $row['email'] && password_verify($pass, $row['password'])) {
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $row['username'];
            header("location: http://localhost/php/");
        } else {
            header("location: http://localhost/html/authentication.html");
            echo "Invalid email/password";
        }
    } else {
        echo "Invalid email/password";
    }
}
