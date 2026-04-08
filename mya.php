<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <title>Dashboard by code</title>
    <style>
    
*{
  margin: 0;
  padding: 0;
  outline: none;
  border: none;
  text-decoration: none;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body{
  background: #dfe9f5;
}
.container{
  display: flex;

}
nav{
  position: relative;
  top: 0;
  bottom: 0;
  height: 100vh;
  left: 0;
  background: #fff;
  width: 280px;
  overflow: hidden;
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}
.logo{
  text-align: center;
  display: flex;
  margin: 10px 0 0 10px;
}
.logo img{
  width: 45px;
  height: 45px;
  border-radius: 50%;
}
.logo span{
  font-weight: bold;
  padding-left: 15px;
  font-size: 18px;
  text-transform: uppercase;
}
a{
  position: relative;
  color: rgb(85, 83, 83);
  font-size: 14px;
  display: table;
  width: 280px;
  padding: 10px;
}
nav .fas{
  position: relative;
  width: 70px;
  height: 40px;
  top: 14px;
  font-size: 20px;
  text-align: center;
}
.nav-item{
  position: relative;
  top: 12px;
  margin-left: 10px;
}
a:hover{
  background: #eee;
}
.logout{
  position: absolute;
  bottom: 0;
}
/* Main Section */
.main{
  position: relative;
  padding: 20px;
  width: 100%;
}
.main-top{
  display: flex;
  width: 100%;
}
.main-top i{
  position: absolute;
  right: 0;
  margin: 10px 30px;
  color: rgb(110, 109, 109);
  cursor: pointer;
}
.main-skills{
  display: flex;
  margin-top: 20px;
}
.main-skills .card{
  width: 25%;
  margin: 10px;
  background: #fff;
  text-align: center;
  border-radius: 20px;
  padding: 10px;
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}
.main-skills .card h3{
  margin: 10px;
  text-transform: capitalize;
}
.main-skills .card p{
  font-size: 12px;
}
.main-skills .card button{
  background: orangered;
  color: #fff;
  padding: 7px 15px;
  border-radius: 10px;
  margin-top: 15px;
  cursor: pointer;
}
.main-skills .card button:hover{
  background: rgba(223, 70, 15, 0.856);
}
.main-skills .card i{
  font-size: 22px;
  padding: 10px;
}
/* Courses */
.main-course{
  margin-top:20px ;
  text-transform: capitalize;
}
.course-box{
  width: 100%;
  height: 300px;
  padding: 10px 10px 30px 10px;
  margin-top: 10px;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}
.course-box ul{
  list-style: none;
  display: flex;
}
.course-box ul li{
  margin: 10px;
  color: gray;
  cursor: pointer;
}
.course-box ul .active{
  color: #000;
  border-bottom: 1px solid #000;
}
.course-box .course{
  display: flex;
}
.box{
  width: 33%;
  padding: 10px;
  margin: 10px;
  border-radius: 10px;
  background: rgb(235, 233, 233);
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}
.box p{
  font-size: 12px;
  margin-top: 5px;
}
.box button{
  background: #000;
  color: #fff;
  padding: 7px 10px;
  border-radius: 10px;
  margin-top: 3rem;
  cursor: pointer;
}
.box button:hover{
  background: rgba(0, 0, 0, 0.842);
}
.box i{
  font-size: 7rem;
  float: right;
  margin: -20px 20px 20px 0;
}
.html{
  color: rgb(25, 94, 54);
}
.css{
  color: rgb(104, 179, 35);
}
.js{
  color: rgb(28, 98, 179);
}
table,th,td{border: 2px solid black;
border-collapse: collapse;
padding: 10px;

}
tr:nth-child(even) {
            background-color: #ffffc2;
        }
.bb{
    text-align: center;
}

    </style>

</head>

<body onload="best()">

<div class="container">
    <nav>
        <ul>
        <li>
                <a href="#" class="logo">
                    <img src="p1.png" alt="">
                    <span class="nav-item"><input type="button" value="Admin" id="home"></span>
                </a>
        </li>
        <li>
                <a href="#" class="logo">
                    <img src="culogo.png" alt="">
                    <span class="nav-item">
                        <input type="button" value="CU" id="cu">
                    </span>
                </a>
        </li>
        <li>
                <a href="#" class="logo">
                    <img src="tulogo.jpg" alt="">
                    <span class="nav-item">
                        <input type="button" value="TU" id="tu">
                    </span>
                </a>
        </li>
        <li>
                <a href="#" class="logo">
                    <img src="ummglogo.jpg" alt="">
                    <span class="nav-item">
                        <input type="button" value="UMMG" id="ummg">
                    </span>
                </a>
        </li>
        <!--<li>
                <a href="" class="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Log out</span>
                </a>
        </li>-->
        </ul>
    </nav>
    <section class="main">
        <div class="main-top">
        </div>
    <div class="aa">
        <div class="main-skills">
            <div>
            <?php 
$con=mysqli_connect("localhost:3310","root","","ferrysystem");

            $query="SELECT * FROM uni,ferry,car,ferryform where uni.UniId=ferry.UniId and car.CarNo=ferry.CarNo and ferryform.NRC=car.NRC";
            $ret=mysqli_query($con,$query);
            echo "<div class='bb'>";
            echo "<table border=2 >
                    <tr><td>Name</td><td>NRC</td><td>Email</td><td>Phno</td><td>CarNo</td><td>Location</td>
                    <td></td></tr>";
                    foreach($ret as $row){
                echo "<tr>";
                echo "<td>".$row['Name']."</td>";
                echo "<td>".$row['NRC']."</td>";
                echo "<td>".$row['Email']."</td>";
                echo "<td>".$row['Phno']."</td>";
                echo "<td>".$row['CarNo']."</td>";
                echo "<td>".$row['UniName']."</td>";
                echo "<td><a href='mya.php?delid=$row[CarNo]'>Delete</a></td></tr>";   
            }
                echo "</table>";
                echo "</div>";
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
      echo "<td><a href='mya.php?userdelid=$row1[NRC]'>Delete</a></td></tr>";   
  }
      echo "</table>";
      echo "<br><br><br>";

      if(isset($_GET['userdelid'])){
        $nrc=$_GET['userdelid'];
        mysqli_query($con,"DELETE FROM userform WHERE NRC='$nrc'");
      }


?>
            </div>
        </div>
    </div>
    <div id="div1">
        <?php
        $con=mysqli_connect("localhost:3310","root","","ferrysystem");
        if(!$con){
            die("Could not connect:".mysqli_error());
        }
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
    ?>
        </div>
    <div id="div2" style="display: none;">
    <?php
        $con=mysqli_connect("localhost:3310","root","","ferrysystem");
        if(!$con){
            die("Could not connect:".mysqli_error());
        }
        $query1="SELECT * FROM uni,ferry,car,ferryform where uni.UniId=ferry.UniId and car.CarNo=ferry.CarNo and ferryform.NRC=car.NRC and UniName='TU'";
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

    $ret2=mysqli_query($con,"SELECT * FROM uni,ferry,userform WHERE uni.UniId=ferry.UniId and ferry.Fid=userform.Fid and UniName='TU'");
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
    ?>
    </div>
    <div id="div3" style="display: none;">
    <?php
        $con=mysqli_connect("localhost:3310","root","","ferrysystem");
        if(!$con){
            die("Could not connect:".mysqli_error());
        }
        $query1="SELECT * FROM uni,ferry,car,ferryform where uni.UniId=ferry.UniId and car.CarNo=ferry.CarNo and ferryform.NRC=car.NRC and UniName='UMMG'";
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

    $ret2=mysqli_query($con,"SELECT * FROM uni,ferry,userform WHERE uni.UniId=ferry.UniId and ferry.Fid=userform.Fid and UniName='UMMG'");
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
    ?>
    </div>
    </div>
    </section>
</div>

<script>
    var home=document.getElementById("home");
    var cu = document.getElementById("cu");
    var tu = document.getElementById("tu");
    var ummg = document.getElementById("ummg");

    home.addEventListener("click", function(){
        document.getElementById("div2").style.display = "none";
        document.getElementById("div3").style.display = "none";
        document.getElementById("div1").style.display = "none";
        document.querySelector(".aa").style.display = "block";
    });

    cu.addEventListener("click", function(){
        document.querySelector(".aa").style.display = "none";
        document.getElementById("div2").style.display = "none";
        document.getElementById("div3").style.display = "none";
        document.getElementById("div1").style.display = "block";
    });

    tu.addEventListener("click", function(){
        document.querySelector(".aa").style.display = "none";
        document.getElementById("div1").style.display = "none";
        document.getElementById("div3").style.display = "none";
        document.getElementById("div2").style.display = "block";
    });

    ummg.addEventListener("click", function(){
        document.querySelector(".aa").style.display = "none";
        document.getElementById("div1").style.display = "none";
        document.getElementById("div2").style.display = "none";
        document.getElementById("div3").style.display = "block";
    });

    function best() {
        document.querySelector(".aa").style.display = "block";
        document.getElementById("div1").style.display = "none";
        document.getElementById("div2").style.display = "none";
        document.getElementById("div3").style.display = "none";
    }
</script>

</body>
</html>




























