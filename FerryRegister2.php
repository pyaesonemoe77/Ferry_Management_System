<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ferry Registration Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 20px;
        background-image: url('f2.jpg');
        background-size: cover;
    }

    .container {
        max-width: 500px;
        margin: auto;
        background-color: #fff;
        padding: 50px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 5px rgba(11, 15, 15, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="file"],
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        box-sizing: border-box;
        
    }
    .form-group{
     margin-bottom: 30px;
    }

    .btn {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<div class="container">
     <h2 style="text-align: center;">Ferryowner Registration</h2>
     <button type="button" class="btn btn-primary"onclick="redirectToUMMG()" style="position: absolute; top: 10px; right: 10px;">&#x2715;</button>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="nrc">NRC:</label>
            <input type="text" id="nrc" name="nrc" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phno">Phone Number:</label>
            <input type="text" id="phno" name="phno" required>
        </div>
        <div class="form-group">
            <label for="carno">Car Number:</label>
            <input type="text" id="carno" name="carno" required>
        </div>
        <div class="form-group">
            <label for="cartype">Car Type:</label>
            <input type="text" id="cartype" name="cartype">
        </div>
        <input type="hidden" name="capacity" value="10">
        <div class="form-group">
            <label for="uni">Location:</label>
            <select id="uni" name="uni">
                <?php
                function dbConnect(){
                    $db = mysqli_connect("localhost:3310", "root", "", "ferrysystem");
                    if(mysqli_connect_error() >0) 
                        echo "Connection Error!" ;
                    else
                        return $db; 
                }
                $result = mysqli_query(dbConnect(), "SELECT * FROM uni");
                foreach ($result as $row) {
                    echo "<option value='$row[UniId]'>$row[UniName]</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="files">Photo:</label>
            <input type="file" id="files" name="files">
        </div>
        <button type="submit" name="submit" class="btn">Submit</button>
    </form>
</div>

<?php
if(isset($_POST['submit'])){ 
    $name=$_POST['name']; 
    $nrc=$_POST['nrc'];
    $email=$_POST['email'];
    $phno=$_POST['phno'];
    $carno=$_POST['carno'];
    $cartype=$_POST['cartype'];
    $capacity=$_POST['capacity'];
    $uni =$_POST['uni'];
    $photo=$_FILES['files']['name'];

    move_uploaded_file($_FILES['files']['tmp_name'],'uploads/' . $_FILES['files']['name']);

    function checkCarExists($carno) {
        $db = dbConnect();
        $sql = "SELECT * FROM car WHERE CarNo = '$carno'";
        $result = mysqli_query($db, $sql);
        $rowCount = mysqli_num_rows($result);
        mysqli_close($db);
        return $rowCount > 0;
    }

    require_once "database.php";
    
    if (checkCarExists($carno)) {
        echo "<script>alert('Car number already exists!');</script>";
    } else {

    $dbqry1= "INSERT INTO ferryform(Name,NRC,Email,Phno) VALUES ('$name','$nrc','$email',$phno);";
    mysqli_query(dbConnect(), $dbqry1);

    $dbqry2= "INSERT INTO car(CarNo,CarType,Capacity,NRC,photo) VALUES ('$carno','$cartype','$capacity','$nrc','$photo');";
    mysqli_query(dbConnect(), $dbqry2);

    $dbqry2= "INSERT INTO ferry(CarNo,UniId) VALUES ('$carno','$uni');";
    mysqli_query(dbConnect(), $dbqry2);
    header("Location:UMMG.php");
}}
?>
<script>
    function redirectToUMMG() {
        window.location.href = "UMMG.php";
    }
</script>
</body>
</html>
