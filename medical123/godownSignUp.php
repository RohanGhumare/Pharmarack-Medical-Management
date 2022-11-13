<?php require "assets/function.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php require "assets/autoloader.php" ?>
	<style type="text/css">
	<?php include 'css/customStyle.css'; ?>
  <?php include 'css/button.css'; ?>
	</style>
</head>
<body  style="background: url('photo2/login.jpg');background-size: 100%" >
<div class="login-box">
  <div class="well well-sm center" style="width: 25%;margin: auto;padding:4px 11px;margin-top: 111px;text-align: center;">
  	<h3 class="center bsu" >GoDown Sign Up</h3>
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
  <div class="col-md-3 col-sm-3 col-xs-6"> <a href="index.php" class="btn btn-sm animated-button victoria-one GoToHome">Go to Home</a> </div>
  <div class="alert alert-danger" id="error"  style="width: 25%;margin: auto;display: none;"></div>
  <div style="position: fixed;;top:0;background: rgba(0,0,0,0.7); width: 100%;height: 100%;z-index: -1"></div>

  <!-- /.login-box-body -->
</div>
</body>
</html>

<?php 

if (isset($_POST['submit'])) 
{
    $con = new mysqli('localhost','root','','store');
    if (isset($_POST['submit']))
     {
        if ($con->query("insert into godownuser (email,pass) values ('$_POST[usrname]','$_POST[psw]')")) 
        {
            echo "<script>alert('Wow! User Registration Completed.')</script>";
        }
        else
        {
          $notic ="<div class='alert alert-danger'>Error is:".$con->error."</div>";
        }
    }
   
}

 ?>