<?php
$con=mysqli_connect("localhost","root","root","ferrysystem");
if(!$con){
    die("Could not connect:".mysqli_error());
}
mysqli_query($con,"INSERT INTO ferryform(Name,NRC,Phno,CarNo,CarType,Capacity,Location)VALUES('U Ye','8/TTK(N)096433','09423665226','1J-1111','Light Truck','15','CU')");
mysqli_query($con,"INSERT INTO ferryform(Name,NRC,Phno,CarNo,CarType,Capacity,Location)VALUES('U Thu','8/TTK(N)096432','09243665226','2J-2222','Hijet','10','CU')");
mysqli_query($con,"INSERT INTO ferryform(Name,NRC,Phno,CarNo,CarType,Capacity,Location)VALUES('U Thura','8/TTK(N)096983','09423665226','3J-3333','Light Truck','15','CU')");
mysqli_query($con,"INSERT INTO ferryform(Name,NRC,Phno,CarNo,CarType,Capacity,Location)VALUES('U Than','8/TTK(N)096433','09423665226','4J-4444','Light Truck','15','TU')");
mysqli_query($con,"INSERT INTO ferryform(Name,NRC,Phno,CarNo,CarType,Capacity,Location)VALUES('U Myint','8/TTK(N)096433','09423665226','5J-5644','Hijet','10','TU')");
mysqli_query($con,"INSERT INTO ferryform(Name,NRC,Phno,CarNo,CarType,Capacity,Location)VALUES('U Linn','8/TTK(N)096433','09423665226','6J-1433','Light Truck','15','TU')");
mysqli_query($con,"INSERT INTO ferryform(Name,NRC,Phno,CarNo,CarType,Capacity,Location)VALUES('U Win','8/TTK(N)096433','09423665226','7J-3321','Light Truck','15','UMMG')");
mysqli_query($con,"INSERT INTO ferryform(Name,NRC,Phno,CarNo,CarType,Capacity,Location)VALUES('U Naing','8/TTK(N)096433','09423665226','8J-9855','Hijet','10','UMMG')");
mysqli_query($con,"INSERT INTO ferryform(Name,NRC,Phno,CarNo,CarType,Capacity,Location)VALUES('U Zayar','8/TTK(N)096433','09423665226','9J-2311','Light Truck','15','UMMG')");
mysqli_close($con);
?>