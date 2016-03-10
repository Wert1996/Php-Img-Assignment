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

                      <input type="text" name="firstname" placeholder="First Name" required/><?php echo $fnerr ?><br><br>

                          <input type="text" name="lastname" placeholder="Last Name" required/><?php echo $lnerr ?><br><br>

                                <input type="text" name="ghostname" placeholder="Ghost Name (User Name :P)" required/><?php echo $gnerr ?><br><br>

                                    <input type="password" name="password" placeholder="Pass Phrase" required/><?php echo $perr ?><br><br>

                                        <input type="password" name="cpassword" placeholder="Confirm Pass Phrase" required/><br><br>

                                            <select name="gender" ><option value="Male" >Male</option><option value="Female">Female</option></select><?php echo $gerr ?><br><br>

                                                <input type="text" name="email" placeholder="Valid Email" required/><?php echo $emerr ?><br><br>

                                                    <input type="date" name="dob" required/><?php echo $derr ?><br><br><br><br>

                                                        <input type="image" alt="submit" src="https://www.capitalpridecenter.org/wp-content/uploads/2013/07/join-button.png" /><br><br><br>

                                                          </form><p id="formerror"></p></center>

                                                          </div>
                                                          <script src="../js/formval.js"></script>

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
                                                         if($_SERVER['REQUEST_METHOD']=="POST"){ 
                                                          f (empty($_POST[firstname])) {
                                                                 $fnErr = "Field required";$valid--;
                                                                    } else {
                                                                           $fn = test_input($_POST[firstname]);$valid++;
                                                                                // check if name only contains letters and whitespace
                                                                                if (!preg_match("/^[a-zA-Z ]*$/",$fn)) {
                                                                                         $fnErr = "Only letters and white space allowed";$valid--; 
                                                                                              }
                                                                                   }
                                                          if (empty($_POST[lastname])) {
                                                                 $lnErr = "Field required";$valid--;
                                                                    } else {
                                                                           $ln = test_input($_POST[lastname]);$valid++;
                                                                                // check if name only contains letters and whitespace
                                                                                if (!preg_match("/^[a-zA-Z ]*$/",$ln)) {
                                                                                         $lnErr = "Only letters and white space allowed";$valid--; 
                                                                                              }
                                                                                   }
                                                          if (empty($_POST[ghostname])) {
                                                                 $gnErr = "Field required";$valid--;
                                                                    } else {
                                                                           $gn = test_input($_POST[ghostname]);$valid++;
                                                                                // check if name only contains letters and whitespace
                                                                                if (!preg_match("/^[a-zA-Z ]*$/",$gn)) {
                                                                                         $gnErr = "Only letters and white space allowed";$valid--; 
                                                                                              }
                                                                                   }
                                                          if (empty($_POST[password])) {
                                                                 $passErr = "Field required";$valid--;
                                                                    } else {
                                                                           $p = test_input($_POST[password]);$valid++;
                                                                                // check if name only contains letters and whitespace
                                                                                if (!preg_match("/^[a-zA-Z ]*$/",$p)) {
                                                                                         $passErr = "Only letters and white space allowed";$valid--; 
                                                                                              }
                                                                                   }
                                                          if (empty($_POST[gender])) {
                                                                 $gErr = "Field required";$valid--;
                                                                    } else {
                                                                           $g = test_input($_POST[gender]);$valid++;
                                                                                // check if name only contains letters and whitespace
                                                                                if (!preg_match("/^[a-zA-Z ]*$/",$g)) {
                                                                                         $gErr = "Only letters and white space allowed";$valid--; 
                                                                                              }
                                                                                   }

                                                          if (empty($_POST[email])) {
                                                                 $emErr = "Field required";$valid--;
                                                                    } else {
                                                                           $em = test_input($_POST[email]);$valid++;
                                                                                // check if name only contains letters and whitespace
                                                                                if (!preg_match("/^[a-zA-Z ]*$/",$p)) {
                                                                                         $emErr = "Only letters and white space allowed";$valid--; 
                                                                                              }
                                                                                   }

                                                          if (empty($_POST[dob])) {
                                                                 $dErr = "Field required";$valid--;
                                                                    } else {
                                                                           $d = test_input($_POST[dob]);$valid++;
                                                                                // check if name only contains letters and whitespace
                                                                                if (!preg_match("/^[a-zA-Z ]*$/",$d)) {
                                                                                         $dErr = "Only letters and white space allowed";$valid--; 
                                                                                              }
                                                                                   }
                                                          if(empty($_POST[cpassword]){
                                                                $cperr="Field Required";$valid--;
                                                                  } else {
                                                                          $cp = test_input($_POST[cpassword]);$valid++;
                                                                            if(!preg match("/^[a-zA-Z]*$/",$cp){
                                                                                  $cperr="Only letters and white space required";$valid--;}
                                                                                    else{ if($p!=$cp){$cperr="Passwords do not match.";$valid--;}}
                                                                                    }
                                                          
                                                          if($valid===9){
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
                                                         }
?>
