<?php
    $conn = new mysqli("localhost","root","","fasten");
    if(isset($_GET['user_id'])){
        session_start();
        $username = $_SESSION['username'];
        $friendname = $_GET['user_id'];
        $dt = date('Y/m/d');
        $sql = "insert into friend_requests(username,friendname,sent_date)
                values('$friendname','$username','$dt')";
        $conn->query($sql);
    }
    header("location: http://localhost/php/");
?>
