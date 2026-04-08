<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url('f1.avif');
            background-size: cover;
        }
        .container{
            width:800px;
        }
    </style>
</head>
<body>
<ul class="nav justify-content-end bg-dark mb-3 rounded-pill border border-3">
    <li class="nav-item">
        <a class="nav-link fs-5 text-light" href="logout.php">Logout</a>
    </li>
    <li class="nav-item">
        <a class="nav-link fs-5 text-light" href="checkInfo.php">Check Info</a>
    </li>
    <li class="nav-item">
        <a href="FerryRegister1.php" class="nav-link fs-5 text-light">Ferry Register</a>
    </li>
</ul>
<!--
<h2 class="text-center text-info-emphasis fw-bloder fs-1 fst-italic bg-info-subtle w-25 p-2 border border-light rounded-2 border-end" style="margin-left:500px;">MGY Ferry</h2>-->
<h3 class="shadow-none p-4 mb-4 bg-body-secondary-subtle text-primary-emphasis fst-italic fw-bold text-center">Technology University Magway<abbr title=" Technology University Magway" style="text-decoration:none">(TUMGY)</abbr></h3>

<?php
$con = mysqli_connect("localhost:3310", "root", "", "ferrysystem");
if (!$con) {
    die("Could not connect:" . mysqli_error());
}
$sql = "SELECT CarNo FROM ferry WHERE UniId='2'";
$result1 = mysqli_query($con, $sql);

if (mysqli_num_rows($result1) > 0) {
    ?>
    <div class="container text-center">
        <div class="row mb-5">
            <?php
            while ($row1 = mysqli_fetch_assoc($result1)) {
                $qry = "SELECT UserName FROM userform,ferry WHERE CarNo='{$row1['CarNo']}' and UniId='2' and userform.Fid=ferry.Fid";
                $ret = mysqli_query($con, $qry);
                if (mysqli_num_rows($ret) < 10) {
                    $query1 = "SELECT photo,CarNo,Name FROM car,ferryform WHERE CarNo='{$row1['CarNo']}' and ferryform.NRC=car.NRC ";
                    $result = mysqli_query($con, $query1);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <img class="d-block w-100" src="uploads/<?php echo $row['photo']; ?>" alt="Card image">
                                    <div class="card-body">
                                        <h5 class="card-title">CarNo: <?php echo $row['CarNo']; ?></h5>
                                        <p class="card-text">Owner: <?php echo $row['Name']; ?></p>
                                        <a href='Register1.php?carno=<?php echo $row['CarNo']; ?>' class="btn btn-primary">Register</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } 
                }
            }
            ?>
        </div>
    </div>
    <?php
} else {
    echo "0 results";
}

mysqli_close($con);
?>

<ul class="pagination justify-content-end">
    <li class="page-item "><a class="page-link" href="CU.php">CU</a></li>
    <li class="page-item active"><a class="page-link" href="TU.php">TU</a></li>
    <li class="page-item"><a class="page-link" href="UMMG.php">UMMG</a></li>
</ul>

<script>
    function closeRegisterForm() {
        var registerForm = document.getElementById("register-userform");
        header("Location:TU.php");
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
