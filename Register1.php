<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 50px;
        background-image: url('f2.avif');
        background-size: 700px;
    }

    .container {
        max-width: 500px;
        margin: auto;
        background-color: #e0ffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .form-group textarea {
        height: 100px;
    }

    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        box-sizing: border-box;
        background-color: #fff;
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

<div class="container bg-info-subtle">
  <h2 style="text-align: center;">UserForm Registration</h2>
  <button type="button" onclick="redirectToTU()" style="position: absolute; top: 10px; right: 10px;">&#x2715;</button>
    <form action="" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="nrc">NRC:</label>
            <input type="text" id="nrc" name="nrc" required>
        </div>
        <div class="form-group">
            <label for="phno">Phone Number:</label>
            <input type="text" id="phno" name="phno" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>
        </div>
        <?php
        function dbConnect(){
            $db = mysqli_connect("localhost:3310", "root", "", "ferrysystem");
            if(mysqli_connect_error() >0) 
                echo "Connection Error!" ;
            else
                return $db; 
        }
        $car_no=$_GET['carno'];

        $result=mysqli_query(dbConnect(),"SELECT * FROM ferry WHERE CarNo='$car_no'");
        foreach($result as $row){
            echo "<input type='hidden' name='CarNo' value='$row[CarNo]'>";
        }

        echo "<div class='form-group'>";
        echo "<label for='uni'>Location:</label>";
        echo "<select id='uni' name='uni'>";
        $result1=mysqli_query(dbConnect(),"SELECT * FROM uni");
        foreach($result1 as $row1){
            echo "<option value='$row1[UniId]'>$row1[UniName]</option>";
        }
        echo "</select>";
        echo "</div>";
        ?>
        <button type="submit" name="Submit" class="btn">Submit</button>
    </form>
</div>
<?php
if(isset($_POST['Submit'])){
  $name=$_POST['name'];
  $nrc= $_POST['nrc'];
  $phno= $_POST['phno'];
  $address= $_POST['address'];
  $carno= $_POST['CarNo'];
  $uni =$_POST['uni'];
 
  $result2=mysqli_query(dbConnect(),"SELECT Fid from ferry WHERE CarNo='$carno' and UniId=$uni");
  foreach($result2 as $row2){
   
    mysqli_query(dbConnect(),"INSERT INTO userform(UserName,NRC,Phno,Address,Fid)VALUES('$name','$nrc','$phno','$address',$row2[Fid])");
  }
 
  header('Location:TU.php');
 

}
?>
<script>
    function redirectToTU() {
        window.location.href = "TU.php";
    }
</script>