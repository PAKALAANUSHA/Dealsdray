<!DOCTYPE html>
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
    <?php
    $emailErr=$passErr="";
    $email=$pass="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        /*if (empty($_POST["name"])) {
          $nameErr = "Name is required";
        } else {
          $name = test_input($_POST["name"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
          }
        }*/
        
  if (empty($_POST["name"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
        
          if (empty($_POST["password"])) {
            $passErr = "password is required";
          } else {
            $pass = test_input($_POST["password"]);
            }
    }
    
        ?>
    <body>
<div id="div1">
     <h3 class="lh">Login Page</h3>
     <form method="post" action="connect.php">
        <label>User name</label><br><br>
        <input type="text" name="name" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span><br><br>
        <label>Password</label><br><br>
        <input type="text" name="password" value="<?php echo $pass;?>">
  <span class="error">* <?php echo $passErr;?></span>
        <button>LOGIN</button>
     </form>
    </div>
</body>
</html>