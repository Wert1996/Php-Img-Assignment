<?php
setcookie('id',"",time()-3600);
?>
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

                      <input type="text" name="firstname" placeholder="First Name" required/><?php  ?><br><br>

                          <input type="text" name="lastname" placeholder="Last Name" required/><?php  ?><br><br>

                                <input type="text" name="ghostname" placeholder="Ghost Name (User Name :P)"  onkeyup="checkusername(this.value)"  required/><p id="message" style='color:white;'></p><br><br>

                                    <input type="password" name="password" placeholder="Pass Phrase" required/><?php ?><br><br>

                                        <input type="password" name="cpassword" placeholder="Confirm Pass Phrase" required/><br><br>

                                            <select name="gender" ><option value="Male" >Male</option><option value="Female">Female</option></select><?php  ?><br><br>

                                                <input type="text" name="email" placeholder="Valid Email" required/><?php  ?><br><br>

                                                    <input type="date" name="dob" required/><?php ?><br><br><br><br>

                                                        <input type="image" alt="submit" src="https://www.capitalpridecenter.org/wp-content/uploads/2013/07/join-button.png" /><br><br><br>

                                                          </form><p id="formerror"></p></center>

                                                          </div>
                                                          <script src="../js/ajax.js"></script>

                                                          </body>

                                                          </html>
                                                          <?php
                                                          function test_input($data) {
                                                              $data = trim($data);
                                                                $data = stripslashes($data);
                                                                  $data = htmlspecialchars($data);
                                                                    return $data;
                                                          }
                                                          $server="172.25.55.156";
                                                          $user="test";
                                                          $upass="test";
                                                          $dbname="test";
                                                          $valid=0;
                                                         if($_SERVER['REQUEST_METHOD']=="POST"){ 
                                                          if (empty($_POST[firstname])) {
                                                                 echo "<h3 style='color:white'>Field required</h3>";$valid--;
                                                                    } else {
                                                                           $fn = test_input($_POST[firstname]);$valid++;
                                                                                // check if name only contains letters and whitespace
                                                                                if (!preg_match("/^[a-zA-Z ]*$/",$fn)) {
                                                                                         echo  "<h3 style='color:white'>Only letters and white space allowed</h3>";$valid--; 
                                                                                              }
                                                                                   }
                                                          if (empty($_POST[lastname])) {
                                                                 echo "<h3 style='color:white'>Field required</h3>";$valid--;
                                                                    } else {
                                                                           $ln = test_input($_POST[lastname]);$valid++;
                                                                                // check if name only contains letters and whitespace
                                                                                if (!preg_match("/^[a-zA-Z ]*$/",$ln)) {
                                                                                         echo  "<h3 style='color:white'>Only letters and white space allowed</h3>";$valid--; 
                                                                                              }
                                                                                   }
                                                          if (empty($_POST[ghostname])) {
                                                                 echo  "<h3 style='color:white'>Field required</h3>";$valid--;
                                                                    } else {
                                                                           $gn = test_input($_POST[ghostname]);$valid++;
                                                                                // check if name only contains letters and whitespace
                                                                                if (!preg_match("/^[a-zA-Z ]*$/",$gn)) {
                                                                                         echo "<h3 style='color:white'>Only letters and white space allowed</h3>";$valid--; 
                                                                                              }
                                                                                   }
                                                          if (empty($_POST[password])) {
                                                                 echo  "<h3 style='color:white'>Field required</h3>";$valid--;
                                                                    } else {
                                                                           $p=sha1($_POST[password]."random");$valid++; 
                                                                                              }
                                                          if (empty($_POST[gender])) {
                                                                 echo  "<h3 style='color:white'>Field required</h3>";$valid--;
                                                                    } else {
                                                                           $g = test_input($_POST[gender]);$valid++;
                                                                                // check if name only contains letters and whitespace
                                                                                if (!preg_match("/^[a-zA-Z ]*$/",$g)) {
                                                                                         echo  "<h3 style='color:white'>Only letters and white space allowed</h3>";$valid--; 
                                                                                              }
                                                                                   }

                                                          if (empty($_POST[email])) {
                                                                 echo  "<h3 style='color:white'>Field required</h3>";$valid--;
                                                                    } else {
                                                                           $em = test_input($_POST[email]);$valid++;
                                                                               if(!filter_var($em,FILTER_VALIDATE_EMAIL)===false) 
                                                                                {
                                                                                          $valid++;
                                                                                              }
                                                                               else{echo "<h3 style='color:white'>Enter a valid Email Id</h3>";}
                                                                                   }

                                                          if (empty($_POST[dob])) {
                                                                 echo "<h3 style='color:white'>Field required</h3>";$valid--;
                                                                    } else {
                                                                           $d = test_input($_POST[dob]);$valid++;
                                                                                 
                                                                                              }
                                                                                   
                                                          if(empty($_POST[cpassword])){
                                                                echo "<h3 style='color:white'>Field Required</h3>";$valid--;
                                                                  } else {
                                                                          $cp=sha1($_POST[cpassword]."random");
                                                                          $valid++;
                                                                                    if($p!=$cp){echo "<h3 style='color:white'>Passwords do not match.</h3>";$valid--;}
                                                                                    }
                                                          
                                                          if($valid==9){
                                                          $conn=mysql_connect($server,$user,$upass);
                                                          if($conn->connect_error){
                                                            die("Connection failed: " . $conn->connect_error);
                                                          }
                                                          mysql_select_db("test",$conn);
                                                          $str="random";
                                                          
                                                          $x="insert into anshumaan_userdata(firstname,lastname,ghostname,password,gender,email,date) values('$fn','$ln','$gn','$p','$g','$em','$d')";
    if (mysql_query($x,$conn))
    {
        echo "<h1 style='color:white'>Your account has been created.<a href='login.php'>Log In</a></h1>";
        mysql_close($conn);
        die('Error: ' . mysql_error());
          }
    else{ die('Error: '.mysqli_error());}
                }
                }
?>
