
<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body{
            padding: 20px;
            background-image: url('g5.jpg');
            background-size: cover;
        }
        .container{
            max-width: 600px;
            margin: auto;
            margin-top: 110px;
            padding: 30px;
            background-color:#D4E6F1  ;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 5px rgba(11, 15, 15, 0.1);
}
.form-group{
    margin-bottom:30px;
}
    </style>
</head>
<body>
<h2 class="text-center text-info-emphasis fw-bloder fs-1 fst-italic bg-info-subtle w-25 p-2 border border-light rounded-2 border-end" style="margin-left:500px;">MGY Ferry</h2>
    <div class="container">
    <?php
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $_SESSION["Email"] = $email;
            $password = $_POST["password"];
            $_SESSION["Password"] = $password;
            require_once "database.php";

            

            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($email=="admin@gmail.com" && $password=="12345678") {
                session_start();
                $_SESSION["user"] = "yes";
                header("Location: mya.php");
                die();
            }
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: CU.php");
                    die();
                } else {
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Email does not exist</div>";
            }
        }
        ?>
      <form action="login.php" method="post">
      <h2 class='text-center fw-bolder' id="login">Login</h2>
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
      </form>
      <br>
     <div><p>Create an account?<a href="registration.php" class="fw-bolder text-danger fst-italic">Register Here</a></p></div>
    </div>
</body>
</html>