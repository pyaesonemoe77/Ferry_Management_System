<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: mya.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>User Dashboard</title>
</head>
<body>

    <?php
    if(isset($_SESSION['Email']) && isset($_SESSION['Password'])){
        $a=$_SESSION['Email'];
        $b=$_SESSION['Password'];
        if($a=="admin@gmail.com" && $b="admin12345678"){

        }} ?>
        
</body>
</html>