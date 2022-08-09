<?php 
    session_start();
    session_unset();
    session_destroy();
    header("location: http://localhost/html/authentication.html")
?>