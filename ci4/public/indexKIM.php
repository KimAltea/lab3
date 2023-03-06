<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kim Altea</title>
    <link rel="stylesheet" href="js/style.css">
    <center>
        <p id="demo"></p>
    
        <script>
        const d = new Date();
        document.getElementById("demo").innerHTML = d;
        </script>
    </center>
</head>
<body>
<div class="wrapper">
    <div class="left">
        <img src="img/ALTEA-LOGO.png" alt="user" width="250">
        <script>
            window.alert('Hi guys ^_^');
            
            </script>
        <button type="button" onclick="myFunction()">My Nickname!</button>

<p id="nickname"></p>
<p id="demo"></p>

<script>
function myFunction() {
  document.getElementById("nickname").innerHTML = "kimmyyy";
}
</script>
<p id="person"></p>
<script>
    const person = {fname:"Kimberly Ann", lname:"Altea", age:18};

let txt = "";
for (let x in person){
    txt += person[x] + " ";
}
document.getElementById("person").innerHTML = txt;
</script>
<p>My Favorite color:</p>
<p id="Color"></p>
<script>
    const Color = ["SkyBlue", "Black", "Cream"];

let color = "";
for (let x of Color) {
  color += x + "<br>";
}

document.getElementById("Color").innerHTML = color;
</script>
<script>

</script>

    </div>
    <div class="right">
       
        <div class="info">
            <h3>Information</h3>
            <div class="info_data">
                <div class="data"></div>
                    <h4>Email</h4>
                    <p>kealtea@student.apc.edu.ph</p>
            </div>
            <div class="data">
                <h4>School</h4>
                <p>Asia Pacific College (APC)</p>
                <h4>Course</h4>
                <p>Bachelor of Science in Information Technology Specializing Mobile and Internet (BSIT-MI)</p>
            </div>
        </div>
    </div>
</div>
</div>
<p id="rem"></p>
<script>
    let language ="Don't just exist, live";

    let k = "";
    for (let x of language){
        k += x + "<br>";
    }
document.getElementById("rem").innerHTML = k;
</script>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

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
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
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

<h2> Contact me!</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$servername = "192.168.150.213";
$username = "webprogmi211";
$password = "j@zzyAngle30";
$dbname = "webprogmi211";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

$name = $_POST['name'];
$email = $_POST['email'];
$website = $_POST['website'];
$comment = $_POST['comment'];

$sql = "INSERT INTO kealtea_myguests (Fullname, email, website, comment)
VALUES ('$name','$email', '$website', '$comment')";

if ($conn->multi_query($sql) === TRUE) {
 echo "New records created successfully";
} else {
 echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "SELECT id, Fullname, email, website, comment FROM kealtea_myguests";
$result = $conn->query($sql);

$conn->close();
}
?>



</body>
</html>