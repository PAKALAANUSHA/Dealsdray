<!DOCTYPE HTML>  
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 
<nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <!--<a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>-->
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Employee list</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Anusha pakala</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

<?php
// define variables and set to empty values
/*<nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <!--<a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>-->
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Employee list</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Anusha pakala</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>*/
$nameErr = $emailErr = $genderErr = $websiteErr =$designationErr=$courseErr=$imageErr=$courseErr="";
$name = $email = $gender = $comment = $website = $designation=$course=$image="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if(empty($_POST["deignation"])){
    $designationErr="designation is required";
  }
  else{
    $designation=test_input($_POST["designation"]);
  }
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <label>Designation</label>
        <select name="designation">
        <option value="select">select</option>;
                <option value="HR">HR</option>;
                <option value="Manager">Manager</option>
                <option value="Sales">Sales</option>
        </select>
        <span class="error">*<?php echo $designationErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Course:
  <input type="checkbox" name="course" <?php if (isset($course) && $course=="MCA") echo "checked";?> value="MCA">MCA
  <input type="checkbox" name="course" <?php if (isset($course) && $course=="BCA") echo "checked";?> value="BCA">BCA
  <input type="checkbox" name="course" <?php if (isset($course) && $course=="BSC") echo "checked";?> value="BSC">BSC  
  <span class="error">* <?php echo $courseErr;?></span>
  <br><br>
  img upload:<input type="file" name="image" value="<?php echo $image;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
$name=$_POST['name'];
$email=$_POST['email'];
$designation=$_POST['designation'];
$gender=$_POST['gender'];
$course=$_POST['course'];
$conn = new mysqli('localhost','root','','employee');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
    $stmt=$conn->prepare("insert into companydetails(Name,Email,Designation,Gender,Course)values(?,?)");
    $stmt->bind_param("sssss",$name,$email,$designation,$gender,$course);
    $stmt->execute();

// Check conn
}
?>

</body>
</html>