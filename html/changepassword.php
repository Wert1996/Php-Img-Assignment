<?php
?>
<!doctype html>
<html>
<head>
     <title>
         Change your Password
     </title>
</head>
<body>
          <div id="header"><h2><a href="profile.php">Profile</a></h2><h2><a href="logout.php">Logout</a></h2></div>
          <form action="changepassword.php" method="post">
          <input type="password" name="opass" placeholder=" Current Password" required/>&nbsp&nbsp<?php if($pl==2){ if(!$match){echo "Incorrect Password Entered";}} ?>  
          <input type="password" name="npass" placeholder="New Password" required/>
          <input type="password" name="cnpass" placeholder="Confirm New Password" required />&nbsp&nbsp<?php if($pl==2){if(!$nmatch){echo "The passwords do not match";}} ?>
          <input type="submit"/>
          </form>
          <div id="footer"></div>
          </body>
          </html>
          <?php
if(isset($_COOKIE[id])){
  if($_SERVER["REQUEST_METHOD"]=="POST"){
//FETCH REAL PASSWORD
$conn=mysqli_connect("172.25.55.156", "test", "test", "test");
if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
$sql="select password from anshumaan_userdata where id='$_COOKIE[id]'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
$rpass=$row['password'];
//FETCH POST VARIABLES 
$valid=0;
if(empty($_POST[opass]))
    {
      echo "Field cannot be empty";$valid--;
      }
      else{
        $opass=sha1($_POST[opass]."random");$valid++;
        }
if(empty($_POST[npass]))
    {
      echo "Field cannot be empty";$valid--;
      }
      else{
        $npass=sha1($_POST[npass]."random");$valid++;
        }
if(empty($_POST[cnpass]))
    {
      echo "Field cannot be empty";$valid--;
      }
      else{
        $cnpass=sha1($_POST[cnpass]."random");$valid++;
        }
//MATCH THE PASSWORDS
$match=1;$nmatch=0;$pl=0;
if($rpass===$opass){
      $match=0;$pl=1;}
else{ 
  echo "<h4>The entered password is not correct.</h4>";
  }
if($npass===$cnpass)
{
      $nmatch=1;$pl++;}else{ echo "<h4>Enter the same text in new password fields.</h4>";
}
if($match===0 && $nmatch===1 && $valid==3)
{
      $sql1="update anshumaan_userdata set password='$npass' where id='$_COOKIE[id]'";
          if(!mysqli_query($conn,$sql1))
                  {
                          echo "Error: ".mysqli_error();
                              }
                                  else{
                                          echo "Your password has been updated.";
                                          echo "<script>document.location='profile.php';</script>";
                                                      }    
                                                      }
}}
else{echo "<script>document.location='login.php'</script>";}

?>
