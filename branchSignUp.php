<?php require "assets/function.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php require "assets/autoloader.php" ?>
	<style type="text/css">
	<?php include 'css/customStyle.css'; ?>
  <?php include 'css/button.css' ?>
	</style>
</head>
<body  style="background: url('photo2/login.jpg');background-size: 100%" >


	<div class="login-box">
  <div class="well well-sm center" style="width: 25%;margin: auto;padding:4px 11px;margin-top: 111px;text-align: center;">
  	<h3 class="center bsu" >Branch Sign Up</h3>
  </div>
  <!-- /.login-logo -->
  <div class="container">
  <form action=""method="post">
    <label class="bsu" for="usrname">Email ID</label>
    <input type="text" id="usrname" name="usrname" required>

    <label class="bsu" for="psw">Password</label>
  <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

    <input name="submit" type="submit" value="Submit">
  </form>
</div>

<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
  <br>

  <div class="alert alert-danger" id="error"  style="width: 25%;margin: auto;display: none;"></div>
  <div style="position: fixed;;top:0;background: rgba(0,0,0,0.7); width: 100%;height: 100%;z-index: -1"></div>

  <!-- /.login-box-body -->
</div>
<div class="col-md-3 col-sm-3 col-xs-6"> <a href="index.php" class="btn btn-sm animated-button victoria-one GoToHome">Go to Home</a> </div>
</body>
</html>

<?php 

if (isset($_POST['submit'])) 
{
	$user = $_POST['usrname'];
    $pass = $_POST['psw'];
    $con = new mysqli('localhost','root','','store');
    if (isset($_POST['submit']))
     {
        if ($con->query("insert into branchuser (email,pass) values ('$_POST[usrname]','$_POST[psw]')")) 
        {
            echo "<script>alert('Wow! User Registration Completed.')</script>";
        }
        else
        {
          $notice ="< class='alert alert-danger'>Error is:".$con->error."</div>";
        }
    } 
}

 ?>
 <script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>