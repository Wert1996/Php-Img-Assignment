<!doctype html>
<html>
<head>

  <title>

      Sign Up!!

        </title>

          <link rel="icon" href=""/>

            <link rel="stylesheet" href="../css/signup.css" />

            </head>

            <body>

              <div id="header"></div>

                  <div id="container">

                    <center><form action="signup.php" onsubmit="return f()" method="post">

                        <input type="text" name="firstname" placeholder="First Name" required/><br><br>

                            <input type="text" name="lastname" placeholder="Last Name" required/><br><br>

                                <input type="text" name="ghostname" placeholder="Ghost Name (User Name :P)" required/><br><br>

                                    <input type="password" name="password" placeholder="Pass Phrase" required/><br><br>

                                        <input type="password" name="cpassword" placeholder="Confirm Pass Phrase" required/><br><br>

                                            <select name="gender" ><option value="Male" >Male</option><option value="Female">Female</option></select><br><br>

                                                <input type="text" name="email" placeholder="Valid Email" required/><br><br>

                                                    <input type="date" name="dob" required/><br><br><br><br>

                                                        <input type="image" alt="submit" src="https://www.capitalpridecenter.org/wp-content/uploads/2013/07/join-button.png" /><br><br><br>

                                                          </form><p id="formerror"></p></center>

                                                          </div>
                                                          <script src="../js/formval.js"></script>

                                                          </body>

                                                          </html>
                                                          <?php
                                                          $server="172.25.55.156";
                                                          $user="test";
                                                          $upass="test";
                                                          $dbname="test";
                                                         if($_SERVER['REQUEST_METHOD']=="POST"){ 
                                                          $fn=htmlspecialchars($_POST[firstname]);
                                                          $ln=htmlspecialchars($_POST[lastname]);
                                                          $gn=htmlspecialchars($_POST[ghostname]);
                                                          $p=htmlspecialchars($_POST[password]);
                                                          $g=htmlspecialchars($_POST[gender]);
                                                          $em=htmlspecialchars($_POST[email]);
                                                          $d=htmlspecialchars($_POST[dob]);

                                                          $conn=mysql_connect($server,$user,$upass);
                                                          if($conn->connect_error){
                                                            die("Connection failed: " . $conn->connect_error);
                                                          }
                                                          mysql_select_db("test",$conn);
                                                          $str="random";
                                                          $p=sha1($p.$str);
                                                          $x="insert into anshumaan_userdata(firstname,lastname,ghostname,password,gender,email,date) values('$fn','$ln','$gn','$p','$g','$em','$d')";
    if (!mysql_query($x,$conn))
    {
        die('Error: ' . mysql_error());
          }
         echo "<h1 style='color:white'>Your account has been created.<a href='login.php'>Log IN</a></h1>";
           mysql_close($conn);
                                                         }
?>
