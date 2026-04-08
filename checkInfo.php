<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('f1.avif');
            background-size: cover;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 500px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .message {
            margin-top: 10px;
            font-weight: bold;
            color: #333;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }

        .back-link {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            color: #007bff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #D6EAF8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Check Form</h2>
        <form method="POST">
            <label for="nrc">NRC:</label>
            <input type="text" id="nrc" name="nrc" required>
            <label for="carno">Car Number:</label>
            <input type="text" id="carno" name="carno" required>
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php
        if(isset($_POST['submit'])){
            $con = mysqli_connect("localhost:3310", "root", "", "ferrysystem");
            if (!$con) {
                die("Could not connect:" . mysqli_error());
            }
            $nrc = mysqli_real_escape_string($con, $_POST['nrc']);
            $carno = mysqli_real_escape_string($con, $_POST['carno']);

            $sql = "SELECT userform.UserName, car.CarNo, uni.UniName
            FROM car
            INNER JOIN ferry ON car.CarNo = ferry.CarNo
            INNER JOIN userform ON userform.fid = ferry.fid
            INNER JOIN uni ON ferry.UniId = uni.UniId
            WHERE car.CarNo = '$carno'
            AND car.NRC = '$nrc'";

            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                
                echo "<table>";
                echo "<tr><th>Name</th><th>CarNo</th><th>UniName</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" . $row['UserName'] . "</td>";
                    echo "<td>" . $row['CarNo'] . "</td>";
                    echo "<td>" . $row['UniName'] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<div class='message error'>No matching records found.</div>";
            }
            mysqli_close($con);
        }
        ?>
        <a href="javascript:history.go(-1)" class="back-link">Go Back</a>
    </div>
</body>
</html>
