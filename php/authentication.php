<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../css/authentication.css" />
  <title>Welcome</title>
</head>

<body>
  <div class="container mt-5">
    <div class="mb-4 fasten-tag">
      <span class="h1 fast multicolortext">Fasten</span>
    </div>
    <div class="row justify-content-center ">
      <div class="col-4 card shadow-2-strong  shadow-lg p-3 mb-5 bg-white circle">
        <h1 class="h3 mt-3 mb-3 font-weight-normal text-center">
          Sign in
        </h1>
        <form id="loginForm" action="../php/login.php" method="post" class="signpage">
          <div class="card-body">

            <label for="emailaddress" class="sr-only mb-1">Email address</label>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">
                <i class="bi bi-person"></i>
              </span>
              <input type="email" name="emailaddress" id="emailaddress" class="form-control" placeholder="Email" required />
            </div>
            <label for="password" class="sr-only mb-1">Password</label>
            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="bi bi-keyboard"></i>
              </span>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="Remember me" />
                Remember me
              </label>
            </div>
            <div class="mt-3">
              <button class="btn btn-primary">Sign In</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-1 or text-center">OR</div>
      <div class="col-6 card shadow-2-strong shadow-lg p-3 mb-5 bg-white circle">
        <h1 class="h3 text-center">Sign Up</h1>
        <form id="registrationForm" method="post" class="needs-validation signup" action="../php/authentication.php">
          <div class="card-body">

            <div class="input-group mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" />
                <label for="floatingInput">First Name</label>
                <div class="invalid-feedback change">
                  Only characters are allowed
                </div>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" />
                <label for="floatingInput">Last Name</label>
                <div class="invalid-feedback">
                  Only characters are allowed
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <div class="form-floating">
                <input type="text" name="uname" id="uname" class="form-control" placeholder="Username" />
                <label for="uname">Username</label>
                <div class="invalid-feedback">
                  Username should contain atleast 8 characters
                </div>
              </div>
              <div class="form-floating">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" />
                <label for="email">Email</label>
                <div class="invalid-feedback">Enter a valid email</div>
              </div>
            </div>
            <div class="radio-group mb-3">
              <label for="form-label">Gender: </label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="maleGender" value="male" />
                <label class="form-check-label" for="gender"> Male </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="female" />
                <label class="form-check-label" for="gender"> Female </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="otherGender" value="other" />
                <label class="form-check-label" for="gender"> Other </label>
                <div class="invalid-feedback">
                  select your gender
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <div class="form-floating">
                <input type="password" name="pass" id="pass" class="form-control" placeholder="password" />
                <label for="pass">Password</label>
                <div class="invalid-feedback">
                  Username should contain atleast 8 characters
                </div>
              </div>
              <div class="form-floating">
                <input type="password" name="cnfrmpass" id="cnfrmpass" class="form-control" placeholder="Confirm Password" />
                <label for="cnfrmpass">Confirm Password</label>
                <div class="invalid-feedback">Passwords doesn't match</div>
              </div>
            </div>
            <div class="row">
              <div class="input-group col">
                <span class="input-group-text">
                  <i class="bi bi-phone"></i>
                </span>
                <input type="text" name="mobilenumber" id="mobilenumber" class="form-control" placeholder="Mobile Number" />
                <div class="invalid-feedback">Invalid mobile number</div>
              </div>
              <div class="col">
                <input type="date" name="DOB" id="DOB" class="form-control" />
                <div class="invalid-feedback">Your age should be greater than 18</div>
              </div>
            </div>
            <div class="mt-3">
              <button class="btn btn-primary">Sign Up</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="../js/authentication.js"></script>
  <?php
function callFun($msg)
{
  echo "<script type=\"text/javascript\">
            $msg
          </script>";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "fasten";
  $conn = new mysqli($servername, $username, $password, $database);
  if ($conn->connect_error) {
    header("Location: http://localhost/php/authentication.php");
  }
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $uname = $_POST["uname"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];
  $pass = $_POST["pass"];
  $pass = password_hash($pass, PASSWORD_BCRYPT);
  $num = $_POST["mobilenumber"];
  $DOB = $_POST["DOB"];
  $DOB = $_POST["DOB"];
  $sqlMob = "select * from fasten_user where mobile_number='$num'";
  $sqlUser = "select * from fasten_user where username='$uname'";
  $sqlEmail = "select * from fasten_user where email='$email'";
  $flag = false;
  if ($conn->query($sqlMob)->num_rows > 0) {
    $flag = true;
    callFun("dup('mobilenumber','Mobile number ');");
  }
  if ($conn->query($sqlUser)->num_rows > 0) {
    $flag = true;
    callFun("dup('uname','Username ');");
  }
  if ($conn->query($sqlEmail)->num_rows > 0) {
    $flag = true;
    callFun("dup('email','Email ');");
  }
  if (!$flag) {
    $sql = "INSERT INTO `fasten_user`(`username`, `email`, `first_name`, `last_name`, `gender`, `mobile_number`, `password`, `date_of_birth`) 
      VALUES ('$uname','$email','$fname','$lname','$gender','$num','$pass','$DOB')";
    if ($conn->query($sql) === TRUE) {
      header("location: http://localhost/php/");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  $conn->close();
}
?>
</body>

</html>