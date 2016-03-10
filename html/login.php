<?php
        session_start();
?>
<!doctype html>
<html>

<head>

<title>

The Biggest Horror Stories Collection!!

</title>

<link rel="icon" href="../images/hslogo.jpg">

<link rel="stylesheet" href="../css/login.css">
</head>

<body>

<div id="header">
<img id="logo" src="../images/hslogo.jpg" />

</div>

<div id="auxilliary">

<div id="signupdiv">

<center><h1>Welcome to the house of horrors!!</h1><br>

<h3>Read stories straight out of the deepest corners of hell in this ghost library.</h3><br>
<h3>Got a good story yourself?? Feel free to contribute. No pussy stuff here though. Only the toughest souls are allowed to stay!!</h3><br>

<h4>Log In At the Right or Get Registered as a Ghost by <br><h2>Clicking On the Image Below</h2>.</h4><br><br>
<a href="signup.php"><img src="https://rugrabbit.com/sites/default/files/imagecache/big/susan_meller/19-2014/more_images/old_ledger_inside_cover.jpg" /></a></center>
</div>

<div id="logindiv">

<center>

<h1>Enter Thee!!</h1><br><br>

<form action="login.php" method="post">

<input type="text" placeholder="Pseudonym" name="username" class="credentials" /> <br><br>
<input type="text" placeholder="Pass Phrase" name="password" class="credentials" /><br><br>

<input type="image" alt="submit" src="http://www.pixelations.com/ogham/content/ogart/enter.gif" /> 

 </form>

</center>

 </div>

 </div>

</body>
 </html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
$conn=mysqli_connect("172.25.55.156", "test", "test","test");
if($conn->connect_error){
    die("Connection failed: " .$conn->connect_error);}

function test_input($data) {
    $data = trim($data);
      $data = stripslashes($data);
        $data = htmlspecialchars($data);
          return $data;
}
if (empty($_POST[username])) {
       $nameErr = "Name is required";$valid=0;
          } else {
                 $username = test_input($_POST["name"]);$valid=1;
                      // check if name only contains letters and whitespace
                      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                               $nameErr = "Only letters and white space allowed";$valid=0; 
                                    }

                         }
if (empty($_POST[password])) {
       $passErr = "Field required";
          } else {
                 $pass = test_input($_POST[password]);
                      // check if name only contains letters and whitespace
                      if (!preg_match("/^[a-zA-Z ]*$/",$pass)) {
                               $passErr = "Only letters and white space allowed"; 
                                    }
                         }
$pass=sha1($_POST[password]."random");
$sql="select * from anshumaan_userdata where ghostname='$username'"; 
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$rpass=$row["password"];
if($pass===$rpass && $valid===1){
$_SESSION['n']=$username;
$_SESSION['id']=$row['id'];
echo "<script>window.location.assign('profile.php');</script>";}}
?>
