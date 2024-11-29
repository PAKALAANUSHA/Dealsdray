<!--<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/x-icon" href="icon.png">
    <style>
        #div1{
        margin-left:30%;
        margin-top:50px;
        width:400px;
        height:500px;
        background-color:lightblue;
        border-radius:10px;
        padding-top:5px;
        padding-left:10px;
        }
        .lh{
            margin-top:50px;
            text-align: center;
        }
        form{
            margin-left:80px;
            margin-top:50px;
        }
        input{
            height:25px;
            width:200px;
            border-radius:10px;
        }
        button{
            height:25px;
            width:200px;
            margin-top:30px;
            border-radius: 10px;
            background-color: lightpink;
        }
    </style>
</head>
<body>
    <div id="div1">
     <h3 class="lh">Login Page</h3>
     <form action="connect.php" method="post">
        <label>User name</label><br><br>
        <input type="text" name="name"><br><br>
        <label>Password</label><br><br>
        <input type="password" name="password"><br><br>
        <button>LOGIN</button>
     </form>
    </div>-->
    <?php
$name=$_POST['name'];
$password=$_POST['password'];
$conn = new mysqli('localhost','root','','employee');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
    $stmt=$conn->prepare("insert into employeesdata(user_name,password)values(?,?)");
    $stmt->bind_param("ss",$name,$password);
    $stmt->execute();

// Check connection
//$sql = "INSERT INTO employeesdata (s_no,user_name,password)
//VALUES (1,$name,$password)";
//if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
 // }
 echo "<h1>New records created successfully</h1>";
}
?>