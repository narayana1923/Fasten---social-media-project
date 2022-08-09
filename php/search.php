<?php
session_start();
$username = $_SESSION["username"];
$user = $_POST['user'];
$conn = new mysqli("localhost", "root", "", "fasten");
$friends = "SELECT username,first_name,last_name,gender,profile_picture FROM fasten_user fu where username in 
    (SELECT friendname from friends where username = '$username') and username like '%$user%'";
$addFriend = "SELECT * from fasten_user where username not in (
            SELECT friendname from friends where username = '$username'
                UNION
            SELECT username FROM friend_requests WHERE friendname = '$username'
                UNION
            select friendname from friend_requests where username = '$username'
        ) and username !='$username' and username like '%$user%'";
$cancelRequest = "SELECT * from fasten_user where username in (
                    select username from friend_requests where friendname = '$username'
                ) and username like '%$user%'";
$acceptRequest = "SELECT * from fasten_user where username in (
                    select friendname from friend_requests where username = '$username'
                ) and username like '%$user%'";
$result1 = $conn->query($friends);
$result2 = $conn->query($addFriend);
$result3 = $conn->query($cancelRequest);
$result4 = $conn->query($acceptRequest);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../css/search.css">
    <title>Search</title>
</head>

<body style="background-color:#f2f2f2;">
    <?php
    function displayProfile($profile,$username,$type)
    {
        echo "<div class='person row bg-white shadow-lg p-3 mb-5 rounded'>
                <div class='col-4'>";
        if ($profile != null)
            echo "<img src='../assets/$username/profile.png' alt='prof' width='40px' height='40px' class='rounded-circle' />";
        else
            echo "<img src='data:image/png;base64,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' alt='prof' width='80px' height='80px' class='rounded-circle' />";
        echo "</div>
                <div class='col-5 text-black' style='padding-top:10px'>
                    <b>$username</b>
                    <p>Hey guys</p>
                </div>
                <div class='col' style='padding-top:10px'>";
        if($type == "friends"){
            echo "<button class='btn'><a href='#'>
                    <i class='bi bi-messenger'></i>
                </a>
            </button>";
        }
        else if($type == "cancel"){
            echo "<button class='btn circle'><a href='cancelRequest.php?user_id=$username'>
                    <i class='bi bi-x-circle' style='color:black'></i>
                </a>
            </button>";
        }
        else if($type == "accept"){
            echo "<button class='btn'><a href='acceptRequest.php?user_id=$username'>
                    <i class='bi bi-person-plus-fill'></i>
                </a>
            </button>";
        }
        else if($type == "add"){
            echo "<button class='btn btn-secondary circle'><a href='addFriend.php?user_id=$username'>
                <i class='bi bi-person-plus' style='color:white'></i>
                </a>
            </button>";
        }
        echo  "</div>
                <hr>
            </div>";
    }
    ?>
    <div class="content">
        <div class="search-results">
            <?php
            while ($row = $result1->fetch_assoc()) {
                displayProfile($row['profile_picture'],$row['username'],"friends");
            }
            while ($row = $result2->fetch_assoc()) {
                displayProfile($row['profile_picture'],$row['username'],"add");
            }
            while ($row = $result3->fetch_assoc()) {
                displayProfile($row['profile_picture'],$row['username'],"cancel");
            }
            while ($row = $result4->fetch_assoc()) {
                displayProfile($row['profile_picture'],$row['username'],"accept");
            }
            ?>
        </div>
    </div>
</body>

</html>