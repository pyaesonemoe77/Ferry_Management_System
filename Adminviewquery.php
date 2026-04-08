<?php
$con=mysqli_connect("localhost:3310","root","","ferrysystem");
if(!$con){
    die("Could not connect:".mysqli_error());
}
?>

<form action="" method="post">
    <input type="hidden" name="location" value="CU">
    <button type="submit" name="submit">CU</button>
</form>
<form action="" method="post">
    <input type="hidden" name="location" value="TU">
    <button type="submit" name="submit2">TU</button>
</form>
<form action="" method="post">
    <input type="hidden" name="location" value="UMMG">
    <button type="submit" name="submit3">UMMG</button>
</form>
<?php
$con=mysqli_connect("localhost","root","","ferrysystem");
if(!$con){
    die("Could not connect:".mysqli_error());
}

if(isset($_POST['submit'])){
    $query1="SELECT * FROM uni,ferry,car,ferryform where uni.UniId=ferry.UniId and car.CarNo=ferry.CarNo and ferryform.NRC=car.NRC and UniName='CU'";
    $ret1=mysqli_query($con,$query1);

    echo "<table border=1><tr><td>Name</td>
            <td>NRC</td><td>Email</td><td>Phno</td>
            <td>CarNo</td><td>Location</td></tr>";
      foreach($ret1 as $row1){
        echo "<tr>";
        echo "<td>".$row1['Name']."</td>";
        echo "<td>".$row1['NRC']."</td>";
        echo "<td>".$row1['Email']."</td>";
        echo "<td>".$row1['Phno']."</td>";
        echo "<td>".$row1['CarNo']."</td>";
        echo "<td>".$row1['UniName']."</td></tr>";

    }
    echo"</table>";
    echo"<br><br><br>";

    $ret2=mysqli_query($con,"SELECT * FROM uni,ferry,userform WHERE uni.UniId=ferry.UniId and ferry.Fid=userform.Fid and UniName='CU'");
    echo "<table border=1><tr><td>Name</td>
            <td>Phno</td><td>CarNo</td><td>Address</td>
            <td>Location</td></tr>";
       foreach($ret2 as $row2){
        echo "<tr>";
        echo "<td>".$row2['UserName']."</td>";
        echo "<td>".$row2['Phno']."</td>";
        echo "<td>".$row2['CarNo']."</td>";
        echo "<td>".$row2['Address']."</td>";
        echo "<td>".$row2['UniName']."</td></tr>";
        
    }
    echo"</table>";
    echo"<br><br><br>";

}

if(isset($_POST['submit2'])){
     $query3="SELECT * FROM uni,ferry,car,ferryform where uni.UniId=ferry.UniId and car.CarNo=ferry.CarNo and ferryform.NRC=car.NRC and UniName='TU'";
     $ret3=mysqli_query($con,$query3);
     echo "<table border=1><tr><td>Name</td>
             <td>NRC</td><td>Email</td><td>Phno</td>
             <td>CarNo</td><td>Location</td></tr>";
       foreach($ret3 as $row3){
         echo "<tr>";
         echo "<td>".$row3['Name']."</td>";
         echo "<td>".$row3['NRC']."</td>";
         echo "<td>".$row3['Email']."</td>";
         echo "<td>".$row3['Phno']."</td>";
         echo "<td>".$row3['CarNo']."</td>";
         echo "<td>".$row3['UniName']."</td></tr>";
 
     }
     echo"</table>";
     echo"<br><br><br>";

    $ret4=mysqli_query($con,"SELECT * FROM uni,ferry,userform WHERE uni.UniId=ferry.UniId and ferry.Fid=userform.Fid and UniName='TU'");
    echo "<table border=1><tr><td>Name</td>
            <td>Phno</td><td>CarNo</td><td>Address</td>
            <td>Location</td></tr>";
       foreach($ret4 as $row4){
        echo "<tr>";
        echo "<td>".$row4['UserName']."</td>";
        echo "<td>".$row4['Phno']."</td>";
        echo "<td>".$row4['CarNo']."</td>";
        echo "<td>".$row4['Address']."</td>";
        echo "<td>".$row4['UniName']."</td></tr>";
        
    }
    echo"</table>";
    echo"<br><br><br>";

    }

       
if(isset($_POST['submit3'])){
    $query5="SELECT * FROM uni,ferry,car,ferryform where uni.UniId=ferry.UniId and car.CarNo=ferry.CarNo and ferryform.NRC=car.NRC and UniName='UMMG'";
    $ret5=mysqli_query($con,$query5);
    echo "<table border=1><tr><td>Name</td>
            <td>NRC</td><td>Email</td><td>Phno</td>
            <td>CarNo</td><td>Location</td></tr>";
      foreach($ret5 as $row5){
        echo "<tr>";
        echo "<td>".$row5['Name']."</td>";
        echo "<td>".$row5['NRC']."</td>";
        echo "<td>".$row5['Email']."</td>";
        echo "<td>".$row5['Phno']."</td>";
        echo "<td>".$row5['CarNo']."</td>";
        echo "<td>".$row5['UniName']."</td></tr>";

    }
    echo"</table>";
    echo"<br><br><br>";
   

    $ret6=mysqli_query($con,"SELECT * FROM uni,ferry,userform WHERE uni.UniId=ferry.UniId and ferry.Fid=userform.Fid and UniName='UMMG'");
    echo "<table border=1><tr><td>Name</td>
            <td>Phno</td><td>CarNo</td><td>Address</td>
            <td>Location</td></tr>";
       foreach($ret6 as $row6){
        echo "<tr>";
        echo "<td>".$row6['UserName']."</td>";
        echo "<td>".$row6['Phno']."</td>";
        echo "<td>".$row6['CarNo']."</td>";
        echo "<td>".$row6['Address']."</td>";
        echo "<td>".$row6['UniName']."</td></tr>";

        
    }
    echo"</table>";
    echo"<br><br><br>";
}
    mysqli_close($con);


?>