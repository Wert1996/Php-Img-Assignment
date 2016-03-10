<?php
session_start();
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
          <input type="password" name="opass" placeholder=" Current Password" />&nbsp&nbsp<?php if(!$match){echo "Incorrect Password Entered";} ?>  
          <input type="password" name="npass" placeholder="New Password" />
          <input type="password" name="cnpass" placeholder="Confirm New Password" />&nbsp&nbsp<?php if(!$nmatch){echo "The passwords do not match"; } ?>
          <input type="submit"/>
          </form>
          <div id="footer"></div>
          </body>
          </html>
          <?php
if(isset($_SESSION[id])){
//FETCH REAL PASSWORD
$conn=mysqli_connect("172.25.55.156", "test", "test", "test");
if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
$sql="select password from anshumaan_userdata where id='$_SESSION[id]'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
$rpass=$row['password'];
//FETCH POST VARIABLES
$opass=$_POST[opass];
$npass=$_POST[npass];
$cnpass=$_POST[cnpass];
$opass=sha1($opass."random");
$npass=sha1($npass."random");
$cnpass=sha1($cnpass."random");
//MATCH THE PASSWORDS
$match=1;$nmatch=0;
if($rpass===$opass){
      $match=0;
  }
if($npass===$cnpass)
{
      $nmatch=1;
}
if($match===0 && $nmatch==1)
{
      $sql1="update anshumaan_userdata set password='$npass' where id='$_SESSION[id]'";
          if(!mysqli_query($conn,$sql1))
                  {
                          echo "Error: ".mysqli_error();
                              }
                                  else{
                                          echo "Your password has been updated.";
                                          echo "<script>document.location='profile.php';</script>";
                                                      }    
                                                      }
}
else{echo "<script>document.location='login.php'</script>";}
?>
