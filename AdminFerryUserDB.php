<?php 
$con=mysqli_connect("localhost:3310","root","","ferrysystem");

            $query="SELECT * FROM uni,ferry,car,ferryform where uni.UniId=ferry.UniId and car.CarNo=ferry.CarNo and ferryform.NRC=car.NRC";
            $ret=mysqli_query($con,$query);
            echo "<table border=1>
                    <tr><td>Name</td><td>NRC</td><td>Email</td><td>Phno</td><td>CarNo</td><td>Location</td>
                    <td>Car No</td></tr>";
                    foreach($ret as $row){
                echo "<tr>";
                echo "<td>".$row['Name']."</td>";
                echo "<td>".$row['NRC']."</td>";
                echo "<td>".$row['Email']."</td>";
                echo "<td>".$row['Phno']."</td>";
                echo "<td>".$row['CarNo']."</td>";
                echo "<td>".$row['UniName']."</td>";
                echo "<td>".$row['CarNo']."</td>";
                echo "<td><a href='AdminFerryUserDB.php?delid=$row[CarNo]'>Delete</a></td></tr>";   
            }
                echo "</table>";
                echo "<br><br><br>";

    if(isset($_GET['delid'])){
    $carno=$_GET['delid'];
    $result=mysqli_query($con,"SELECT * FROM ferry WHERE CarNo='$carno'");
    foreach($result as $row){
      $db=mysqli_query($con,"SELECT * FROM userform WHERE Fid=$row[Fid]");
      if(mysqli_num_rows($db)>0){
        mysqli_query($con,"DELETE FROM userform WHERE Fid=$row[Fid]");
      }
      $db1=mysqli_query($con,"SELECT*FROM ferry WHERE CarNo='$row[CarNo]'");
      if(mysqli_num_rows($db1)>0){
        mysqli_query($con,"DELETE FROM ferry WHERE CarNo='$row[CarNo]'");
      }
        mysqli_query($con,"DELETE FROM ferryform WHERE NRC='(SELECT NRC FROM car WHERE CarNo=\'$row[CarNo]\')'");
        mysqli_query($con,"DELETE FROM car WHERE CarNo='$row[CarNo]'");
    }
    echo "<script>alert('Data deleted');</script>"; 
  }

  $user_result=mysqli_query($con,"SELECT * FROM uni,ferry,userform WHERE uni.UniId=ferry.UniId and ferry.Fid=userform.Fid");
  echo "<table border=1>
          <tr><td>Name</td><td>NRC</td><td>Phno</td><td>Address</td><td>Location</td><td>Car No</td></tr>";
          foreach($user_result as $row1){
      echo "<tr>";
      echo "<td>".$row1['UserName']."</td>";
      echo "<td>".$row1['NRC']."</td>";
      echo "<td>".$row1['Phno']."</td>";
      echo "<td>".$row1['Address']."</td>";
      echo "<td>".$row1['UniName']."</td>";
      echo "<td>".$row1['CarNo']."</td>";
      echo "<td><a href='AdminFerryUserDB.php?userdelid=$row1[NRC]'>Delete</a></td></tr>";   
  }
      echo "</table>";
      echo "<br><br><br>";

      if(isset($_GET['userdelid'])){
        $nrc=$_GET['userdelid'];
        mysqli_query($con,"DELETE FROM userform WHERE NRC='$nrc'");
      }


?>