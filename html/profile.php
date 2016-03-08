<!doctype html>
<html>
<?php
$correct=0;
                  $conn=new mysqli("172.25.55.156", "test", "test","test");
                                    if($conn->connect_error){
                                                          die("Connection failed: " .$conn->connect_error);}
                                                                           
                  $username=$_POST['username'];
                  $pass=$_POST['password'];
                  $realpass=mysqli_query($conn,"select password from anshumaan_userdata where username=".$username);
                  echo $realpass;

                  if($realpass)
                  {
                    if($realpass===$pass)
                    {
                      $correct=1;
                      $ghostname=$username;
                    }
                  }
if($correct){$email=mysqli_query("select email from anshumaan_userdata where username=".$username.";",$conn);
}
if($correct){$rank=mysqli_query("select rank from anshumaan_userdata where username=".$username.";",$conn);}
if($correct){$hobbies=mysqli_query("select hobbies from anshumaan_userdata where username=".$username.";",$conn);}
if($correct){$per=mysqli_query("select personal_life from anshumaan_userdata where username=".$username.";",$conn);}
if($correct){$sc=mysqli_query("select stories_contributed from anshumaan_userdata where username=".$username.";",$conn);}
if($correct){$sr=mysqli_query("select stories_read from anshumaan_userdata where username=".$username.";",$conn);}
if($correct){$fs=mysqli_query("select favorite_stories from anshumaan_userdata where username=".$username.";",$conn);}
if($correct){$img_src=mysqli_query("select img_src from anshumaan_userdata where username=".$username.";",$conn);}
echo $email;
?>
<head>

  <title>

      My Disguise

        </title>

          <link rel="icon" href=""/>

            <link rel="stylesheet" href="../css/profile.css"/>

            </head>

            <body>

              <center><div id="dp"><?php
                echo "<img src='".$img_src."' height='100%' width='100%' /> ";
              ?></div>

                  <a href=""><img id="editp" src="https://image.freepik.com/free-icon/user-profile-edit-button_318-32453.jpg"/></a>

                    <div class="fill"><div class="label">Rank</div><div class="alabel"><?php echo $rank;  ?></div></div>

                      <div class="fill"><div class="label">Ghost Name</div><div class="alabel"><?php  echo $ghostname;  ?></div></div>

                        <div class="fill"><div class="label">Hobbies and Interests</div><div class="alabel"><?php  echo $hobbies;  ?></div></div>

                          <div class="fill"><div class="label">Stories Contributed</div><div class="alabel"><?php  echo $sc; ?></div></div>

                            <div class="fill"><div class="label">Stories Read</div><div class="alabel"><?php echo $sr; ?></div></div>

                              <div class="fill"><div class="label">Personal Life</div><div class="alabel"><?php  echo $per;  ?></div></div>

                                <div class="fill"><div class="label">Favorite Horror Stories</div><div class="alabel"><?php  echo $fs;  ?></div></div></center>

                                </body>
                                </html>

