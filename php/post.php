<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/4e76d3d314.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="../phpprograms/post.css" rel="stylesheet">
    <title>Create Post</title>
</head>

<body>
    <div class="container">
    <div class="col-lg-4"></div>
    <div class="thumbnail col-lg-4 shadow-lg p-3 mb-5 bg-white circle">
    <form action="post.php" method="post" enctype="multipart/form-data" class="post">
    <h1 class="text-warning">POST HERE</h1>
        <textarea name="desc" placeholder="Description" class="textarea col-lg-11" rows="3"></textarea>
    <div class="col-lg-11 upload">
        <label for="filein"><img src="https://img.icons8.com/ios/50/000000/import.png"/>
        <input type="file" name="media" id="filein" onchange="readURL(this,'Picture')" >Upload from your device</label>
    </div>
        <div class="col-lg-11 types">
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item col-sm-4 text-center active"><button class="btn btn-responsive btn-defult"><i class="fas fa-photo-video"></i> Photo</button></li>
            <li class="list-group-item col-sm-4 text-center"><button class="btn "><i class="bi bi-fonts bi-lg"></i>Text</button></li>
            <li class="list-group-item col-sm-4 text-center"><button class="btn"><i class="fas fa-smile-beam"></i>Memoji</button></li>
        </ul>
        </div>
        <input type="submit" class="col-lg-11 btn1 btn btn-primary" >
    </form>
    </div>
    </div>
</body>
<?php
session_start();
$username = $_SESSION['username'];
function getPostID()
{
    global $username;
    $conn = new mysqli("localhost", "root", "", "fasten");
    $sql = "select post_id from posts where username = '$username' order by post_id desc limit 1";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        return "$username-1";
    } else {
        $row = $result->fetch_array();
        $post_id = $row[0];
        $arr = explode("-", $post_id);
        $arr[1] = ((int)$arr[1]) + 1;
        return $arr[0] . '-' . $arr[1];
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "fasten");
    if ($conn->connect_error) {
        die("Connection failed " . $conn->connect_error);
    }
    $des = $_POST["desc"];
    $status = $statusMsg = '';
    $status = 'error';
    if (!empty($_FILES["media"]["name"])) {
        $fileName = basename($_FILES["media"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'mp4');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['media']['tmp_name'];
            $target_dir = "../assets/$username/" . ($fileType != 'mp4'? 'images/':'videos/');
            mkdir($target_dir,0777,true);
            move_uploaded_file($_FILES["media"]["tmp_name"], $target_dir.basename($_FILES["media"]["name"]));
            $post_id = getPostID();
            $sql = "INSERT INTO `posts`(`post_id`, `username`, `posted_on`, `post_desc`, `media`,`media_type`) 
                VALUES ('$post_id','$username','2021/12/12','$des','$fileName','$fileType')";
            $insert = $conn->query($sql);
            if ($insert) {
                $status = 'success';
                $statusMsg = "File uploaded successfully.";
                header("location: http://localhost/php/");
            } else {
                $statusMsg = "File upload failed, please try again.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        }
    } else {
        $statusMsg = 'Please select an image file to upload.';
    }
    echo $statusMsg;
}
?>

</html>