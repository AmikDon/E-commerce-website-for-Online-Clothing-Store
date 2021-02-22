<?php

    if (isset($_POST['submit'])){
        //Database connection
        include_once 'connect.php';

        //storing data from login form  to variables
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        //Check if variables are empty
        if (empty($email) || empty($password)){
            header("Location: login.php?login=empty");
            
        }
        else{
            $sql = "SELECT email, password FROM customer WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0){
                header("Location: account.php?account=success");
            }
            else{
                header("Location: login.php?login=invalid");
            }
        }
    }
    include_once 'header.php';
?>

    <!-- Breadcrumb -->
    <div class="page-breadcrumb">
        <div class="container">
            <ul>
                <li><a href="index.php">Home ></a></li>
                <li><a href="login.php">Log In</a></li>
            </ul>
        </div>
    </div>


    <!-- Login -->
    <div class="main-login">
        <div class="container">
            <div class="login-content">
                <div class="login-details">
                    <h1>Log In</h1>
                    <form action="" method="post">


                        <div class="loginforminput">
                            <span class="iconlogin"><i class="fa fa-envelope"></i></span>
                            <input type="text" name="email" placeholder="Email Address" value="">
                            <!-- <strong class="error">The email field is required.</strong> -->

                        </div>
                        <div class="loginforminput">
                            <span class="iconlogin"><i class="fa fa-lock"></i></span>
                            <input type="password" name="password" placeholder="Your Password">
                            <!-- <strong class="error">The password field is required.</strong> -->

                        </div>
                        <div class="loginforminput">

                            <div class="checkbox">
                                <label><input type="checkbox" value="">Keep me logged in</label>
                            </div>
                        </div>
                        <div class="loginforminput btnlogins">
                            <button name="submit" type="submit">Sign In</button>
                            <a class="forgetpass" href="forget-password.php">Forgot Your Password?</a>
                        </div>
                        <?php                            
                            if(!isset($_GET['login'])){
                                
                            }
                            else{
                                $loginCheck = $_GET['login'];

                                if ($loginCheck == "empty"){
                                    echo "<label>Enter both fields!!</label>";
                                    
                                }
                                elseif($loginCheck == "invalid"){
                                    echo "<label>Invalid email or password!!</label>";
                                }
                                elseif($loginCheck == "reset-password"){
                                    echo "<label>Please try logging in with new password!!</label>";
                                }
                            }
                        ?>
            
                    </form>
                </div>

                <div class="register-section">
                    <div class="insidereg">
                        <h2>Are You New To</h2>
                        <h2 class="strong">Modish Collection ?</h2>
                        <h5>Free and Fast registration</h5>
                        <a href="register.php" class="register-now">Register Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>

</body>

</html> 