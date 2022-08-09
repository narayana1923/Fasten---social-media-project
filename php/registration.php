<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "fasten";
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $pass = $_POST["pass"];
    $pass = password_hash($pass,PASSWORD_BCRYPT);
    $num = $_POST["mobilenumber"];
    $DOB = $_POST["DOB"];
    $num = (int) $num;
    $DOB = $_POST["DOB"];
    $sql = "INSERT INTO `fasten_user`(`username`, `email`, `first_name`, `last_name`, `gender`, `mobile_number`, `password`, `date_of_birth`) 
    VALUES ('$uname','$email','$fname','$lname','$gender','$num','$pass','$DOB')";
    if ($conn->query($sql) === TRUE) {
        header("Location: http://localhost/html/");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    ?>
</body>

</html>