<?php
    // use PHPMailer\PHPMailer\PHPMailer;
    
    require "header.php";
    require "connect.php";
    

    //if reset request is sent
    if (isset($_POST["reset-request-submit"])){

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        
        if(empty($email)){
            header ("Location: forget-password.php?forget-password=empty");
        }else{
            //creating tokens
            $selector = bin2hex(random_bytes(8));
            $token = random_bytes(32);

            $url = "reset-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
            $expires = date("U") + 1800;

            

            //deleting previous password requests record using prepared statements
            $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                //eroor message
                exit();
            }else{
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
            }

            //inserting password requests record with tokens and expiry date using prepared statements
            $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) 
            VALUES (?,?,?,?);";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                //eroor message
                exit();
            }else{
                $hashedToken = password_hash($token, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "ssss", $email, $selector, $hashedToken, $expires);
                mysqli_stmt_execute($stmt);
            }

            mysqli_stmt_close($stmt);
            mysqli_close($conn);

            // require_once "PHPMailer/PHPMailer.php";
            // require_once "PHPMailer/Exception.php";
            // require_once('PHPMailer/PHPMailerAutoload.php');
            // $mail = new PHPMailer();
            // $mail->isSMTP();
            // $mail->SMTPAuth = true;
            // $mail->SMTPSecure = 'ssl';
            // $mail->Host = 'smtp.gmail.com';
            // $mail->Port = '465';
            // $mail->isHTML();
            // $mail->Username = 'modishcollection62@gmail.com';
            // $mail->Password = 'modish123collection';
            // $mail->SetFrom('modishcollection62@gmail.com');
            // $mail->Subject = 'Reset Password';
            // $mail->Body = 'A test mail';
            // $mail->AddAddress('$email');
            // $mail->Send();
            $to = $email;
            $subject = "Reset Password";
            $message = "
            Hello,<br><br>
            <p>We received a password reset request.In order to reset your password please click the link below.
            If you did not made the request, you can ignore this email.</p><br><br>
            <a href='reset-password.php?email=$email&token=$token'>Reset Password</a><br>
            Kind regards,<br>
            Modish Collection.
            ";
            $headers = 'From: modishcollection62@gmail.com\r\n' .
                        'Reply-To: modishcollection62@gmail.com\r\n' .
                        'Content-type: text/html\r\n';
            
            mail($to, $subject, $message, $headers);
            header("Location: reset-password.php?reset=success");
        }
        
        
        

    }else{
        // header("Location: login.php");
    }
?>
    <!-- Breadcrumb -->
    <div class="page-breadcrumb">
        <div class="container">
            <ul>
                <li><a href="index.php">Home ></a></li>
                <li><a href="login.php">Log In ></a></li>
                <li><a href="forget-password.php">Forget password</a></li>
            </ul>
        </div>
    </div>
    
    <div class="main-login">
        <div class="container">
            <div class="login-content">
                <div class="login-details">
                    <h1>Forget Password</h1>
                    <form action="" method="post">


                        <div class="loginforminput">
                            <span class="iconlogin"><i class="fa fa-envelope"></i></span>
                            <input type="text" name="email" placeholder="Enter your Email Address">
                            <!-- <strong class="error">The email field is required.</strong> -->

                        </div>
                        
                        <div class="loginforminput">
                            <?php
                                
                                if(!isset($_GET['forget-password'])){
                                    echo "<label>Email will be sent to reset your password!!</label>";
                                }
                                else{
                                    $signupCheck = $_GET['forget-password'];

                                    if ($signupCheck == "empty"){
                                        echo "<label>Enter email!!</label>";
                                        
                                    }
                                    elseif($signupCheck == "invalid"){
                                        echo "<label>Enter a valid email!!</label>";
                                    }
                                }
                            ?>
                            

                        </div>
                        <div class="loginforminput btnlogins">
                            <button name="reset-request-submit" type="submit">SEND</button>
                        </div>
                        
            
                    </form>
                </div>

                
            </div>
        </div>
    </div>


</body>

</html>

