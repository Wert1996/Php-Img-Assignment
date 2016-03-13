<?php
 
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
                  $conn=mysqli_connect("172.25.55.156", "test", "test","test");
                  if($conn->connect_error){
                  die("Connection failed: " .$conn->connect_error);}
                  $sql="select * from anshumaan_userdata where id='$_COOKIE[id]'"; 
                  $result=mysqli_query($conn,$sql);
                  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                  $rank=$row["rank"];
                  $ghostname=$row["ghostname"];
                  $hobbies=$row["hobbies"];
                  $sc=$row["stories_contributed"];
                  $sr=$row["stories_read"];
                  $rpass=$row["password"];
                  $per=$row["personal_life"];
                  $fs=$row["favorite_stories"];
                  if(count($_COOKIE)>0){echo "<body style=\"background-image:url('../images/back/$_COOKIE[id].jpg')\">
                <center>
                  <div id='header'><h2><a href='changepassword.php'>Change Password</a></h2><h2><a href='editprofile.php'>Edit Profile!</a></h2><h2><a href='logout.php'>Logout</a></h2></div>
                  <img src='../images/profile/$_COOKIE[id].jpg' id='dp' />
                  <div class='fill'>Rank:&nbsp'$rank'</div>
                  <div class='fill'>Ghost Name:&nbsp'$ghostname'</div>
                  <div class='fill'>Hobbies:&nbsp'$hobbies'</div>
                  <div class='fill'>Personal Life&nbsp'$per'</div>
                  <div class='fill'>Stories Contributed:&nbsp'$sc'</div>
                  <div class='fill'>Stories Read:&nbsp'$sr'</div>
                 <div class='fill'>Favorite Stories:&nbsp'$fs'</div>
                  <div id='footer'></div>
                  </center>
                  </body>
                  </html>";}
                  else {echo "<script>window.location.assign('login.php');</script>";}
                  
                ?>

