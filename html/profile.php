<?php
session_start();
?>
<!doctype html>
<html>
<head>

  <title>

        My Disguise

                </title>

                          <link rel="icon" href=""/>

                                      <link rel="stylesheet" href="../css/profile.css"/>

                                                  </head>

<?php
session_start();               
$match=0;
                  $conn=mysqli_connect("172.25.55.156", "test", "test","test");
                  if($conn->connect_error){
                  die("Connection failed: " .$conn->connect_error);}
                  $username=$_POST[username];
                  $pass=sha1($_POST[password]."random");
                  $sql="select * from anshumaan_userdata where ghostname='$username'"; 
                  $result=mysqli_query($conn,$sql);
                  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                  $rank=$row["rank"];
                  $img_src=$row["img_src"];
                  $ghostname=$row["ghostname"];
                  $hobbies=$row["hobbies"];
                  $sc=$row["stories_contributed"];
                  $sr=$row["stories_read"];
                  $rpass=$row["password"];
                  $back=$row["back_image"];
                  $per=$row["personal_life"];
                  $fs=$row["favorite_stories"];
                  if($pass===$rpass){$match=1;}
              if($match){$_SESSION[n]=$username; echo "<body style='background-image:url('$back')'>
              <center><img src=".$img_src." id='dp' />
               <a href='editprofile.php'><img id='editp' src='https://image.freepik.com/free-icon/user-profile-edit-button_318-32453.jpg'/></a>                                                                      <div class='fill'><div class='label'>Rank</div><div class='alabel'>".$rank."</div></div>
               <div class='fill'><div class='label'>Ghost Name</div><div class='alabel'>".$ghostname."</div></div>                                                                                                    <div class='fill'><div class='label'>Hobbies and Interests</div><div class='alabel'>".$hobbies."</div></div>                                                                                           <div class='fill'><div class='label'>Stories Contributed</div><div class='alabel'>".$sc."</div></div>
              <div class='fill'><div class='label'>Stories Read</div><div class='alabel'>".$sr."</div></div>
              <div class='fill'><div class='label'>Personal Life</div><div class='alabel'>".$per."</div></div>
             <div class='fill'><div class='label'>Favorite Horror Stories</div><div class='alabel'>".$fs."</div></div></center>
             </body></html>";}
              else {echo "<p>The username and password do not match.<a href='login.php'>Try to login again.</a></p>";}
              ?>

