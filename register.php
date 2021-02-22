<?php

    if (isset($_POST['submit'])){
        //Database connection
        include_once 'connect.php';

        //storing data from login form  to variables
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password_confirmation = mysqli_real_escape_string($conn, $_POST['password_confirmation']);
        
        $sqlCheck = "SELECT email FROM customer WHERE email = '$email'";
        $result = mysqli_query($conn, $sqlCheck);
        $resultCheck = mysqli_num_rows($result);

        $phoneint = is_numeric($phone);

        

        //Check if variables are empty
        if(empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($password) || empty($password_confirmation)){
            header("Location: register.php?register=empty");
            exit();
        }
        elseif($resultCheck > 0){
            header("Location: register.php?register=accountexists");
            exit();

        }
        elseif($phoneint == FALSE){
            header("Location: register.php?register=phoneinvalid");

        }
        elseif($password != $password_confirmation){
            header("Location: register.php?register=passwordnotmatch");
            exit();
            
        }
        else{
            $verifyKey = md5(time().$first_name);
            $sqlRegister = "INSERT INTO customer (first_name, last_name, email, phone, password, verification_code) 
            VALUES ('$first_name', '$last_name', '$email', '$phone', '$password', '$verifyKey');";
            mysqli_query($conn, $sqlRegister);

            header("Location: register.php?register=success");
        }
    }
    
    include_once 'header.php';
?>

    <!-- Breadcrumb -->
    <div class="page-breadcrumb">
        <div class="container">
            <ul>
                <li><a href="index.php">Home ></a></li>
                <li><a href="#">My Account</a></li>
            </ul>
        </div>
    </div>


    <!-- Login -->
    <div class="main-login">
        <div class="container">
            <div class="login-content register-content">
                <div class="login-details">
                    <h1>Register</h1>
                    <form action="register.php" method="post" class="register-acc">

                        <div class="loginforminput">
                            <input type="text" name="first_name" placeholder="First Name" >
                        </div>

                        <div class="loginforminput">
                            <input type="text" name="last_name" placeholder="Last Name" >
                        </div>

                        <div class="loginforminput">
                            <input type="text" name="email" placeholder="Email" >
                        </div>

                        <div class="loginforminput">
                            <input type="text" name="phone" placeholder="Phone Number" >
                        </div>

                        <div class="loginforminput">
                            <input type="password" name="password" placeholder="Password">
                        </div>

                        <div class="loginforminput">
                            <input type="password" name="password_confirmation" placeholder="ReType Password">
                        </div>

                        <div class="loginforminput btnlogins">
                            <button name="submit" type="submit">Register Account</button>
                        </div>
                        <?php
                            if(!isset($_GET['register'])){
                                
                            }
                            else{
                                $registerCheck = $_GET['register'];

                                if ($registerCheck == "empty"){
                                    echo "<label>Enter all the fields!!</label>";
                                    
                                }
                                elseif($registerCheck == "accountexists"){
                                    echo "<label>Sorry! The account already exists!!</label>";

                                }
                                elseif($registerCheck == "phoneinvalid"){
                                    echo "<label>Please  enter phone number in digits!!</label>";
                                }
                                elseif($registerCheck == "invalid"){
                                    echo "<label>Invalid email or password!!</label>";
                                }
                                elseif($registerCheck =="passwordnotmatch"){
                                    echo "<label>Passwords do not match!!</label>";
                                }
                            }

                        ?>
                        
                    </form>
                </div>

                <div class="register-section">
                    <div class="insidereg">
                        <h2>Already A Member ?</h2>
                        <h5>Login With Your Registered Email ID</h5>
                        <a href="login.php" class="register-now">Login Now</a>
                    </div>
                </div>
                

            </div>
        </div>
    </div>



    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>

</body>

</html>