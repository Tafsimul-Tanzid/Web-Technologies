<html>
<head>
<style>
.err {color: red;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $dateofbirthErr = $emailErr = $genderErr =  $degreeErr= $bloodgroupErr="";
$name = $email = $gender  = $dateofbirth =  $degree= $bloodgroup="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } 
  
  if (str_word_count($_POST["name"]) > 2) {
    $nameErr = "Max 2 words only";
  } 
  
  else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-'. ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      $name = "";
    }

  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $email = "";
    }
  }
    


  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["dateofbirth"])){
    $dateofbirthErr="Date of birth is required";
  }
  else {
    $dateofbirthbErr = "" ;
    $dateofbirth = $_POST["dateofbirth"];
  }
  if(isset($_POST['degree'])){
    if (sizeof($_POST["degree"])<2){
    $degreeErr="At least two 2 field is required";
    }else{
    $degreeErr="";
    $degree=$_POST['degree'];
    }
  $degErr="At least 2 field is required";
  }

  if (empty($_POST['bloodgroup'])){
    $bloodgroupErr="Blood group is requied";
  } else {
    $bloodgroupgErr="";
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="err">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="err">* <?php echo $emailErr;?></span>
  <br><br>
  Date of birth:<input type="date" name="dateofbirth">
  <span class="err">* <?php echo $dateofbirthErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="err">* <?php echo $genderErr;?></span>
  <br><br>
  Degree: 
  <input type="checkbox" name="deg[]" value="SSC">SSC 
  <input type="checkbox" name="deg[]" value="HSC">HSC 
  <input type="checkbox" name="deg[]" value="BSc">BSC 
  <input type="checkbox" name="deg[]" value="MSc">MSC
  <span class="err">* <?php echo $degreeErr;?></span> 
  <br><br>
  <label for="bloodgroup"> Blood group:</label>
  <select id="bloodgroup" name="bloodgroup">
  <option value=""></option>
  <option value="A+">A+</option>
  <option value="B+">B+</option>
  <option value="O+">O+</option>
  <option value="AB+">AB+</option>
  <option value="A-">A-</option>
  <option value="B-">B-</option>
  <option value="O-">O-</option>
  <option value="AB-">AB-</option>
  </select> 
  <span class="err">* <?php echo $bloodgroupErr;?></span>
  <br> <br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h1>Your Input:</h1>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
echo "<br>";
echo $dateofbirth;
echo "<br>";
echo $bloodgroup;
?>

</body>
</html>