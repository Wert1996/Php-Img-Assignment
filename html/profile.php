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

                  $conn=mysqli_connect("172.25.55.156", "test", "test","test");
                  if($conn->connect_error){
                  die("Connection failed: " .$conn->connect_error);}
                  $sql="select * from anshumaan_userdata where id='$_SESSION[id]'"; 
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
                  if(isset($_SESSION[n])){echo "<body style='background-image:url('../images/back/$_SESSION[id].jpg')'>
                <center>
                  <div id='header'><h2><a href='changepassword.php'>Change Password</a></h2><h2><a href='editprofile.php'>Edit Profile!</a></h2><h2><a href='logout.php'>Logout</a></h2></div>
                  <img src='../images/profile/$_SESSION[id].jpg' id='dp' />
                  <div id='rank'>Rank:&nbsp'$rank'</div>
                  <div id='ghostname'>Ghost Name:&nbsp'$ghostname'</div>
                  <div id='hobbies'>Hobbies:&nbsp'$hobbies'</div>
                  <div id='personal_life'>Personal Life&nbsp'$per'</div>
                  <div id='stories_contributed'>Stories Contributed:&nbsp'$sc'</div>
                  <div id='stories_read'>Stories Read:&nbsp'$sr'</div>
                 <div id='favorite_stories'>Favorite Stories:&nbsp'$fs'</div>
                  <div id='footer'></div>
                  </center>
                  </body>
                  </html>";}
                  else {echo "<p><a href='login.php'>Try to login again.</a></p>";}
                ?>

