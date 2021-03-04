<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Sharehub - Responsive HTML5 Template">
    <meta name="author" content="etheme.com">
    <title>Sharehub - Responsive HTML5 Template</title>

    <!-- STYLESHEET -->
    <!-- FONTS -->
    <!-- Muli -->
    <link href="https://fonts.googleapis.com/css?family=Signika:300,400,600,700" rel="stylesheet">

    <!-- icon -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="fonts/icons/fontawesome/css/font-awesome.min.css"/>

    <link rel="stylesheet" href="fonts/icons/sharehub/style.css"/>

    <!-- Vendor -->
    <!-- Custom -->
    <link rel="stylesheet" href="vendor/magnificPopup/dist/magnific-popup.css" type="text/css" />
    <link href="css/style.css" rel="stylesheet"/>

    <!-- JAVA SCRIPT -->
    <!-- require -->
    <script data-main="js/app" src="vendor/require/require.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php
require('connection.php');
 if (isset($_REQUEST['username'])) {
      $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $repassword = stripslashes($_REQUEST['repassword']);
        $repassword = mysqli_real_escape_string($con, $repassword);

         $query    = "INSERT into `signup` (username,  email, password , repassword)
                     VALUES ('$username',  '$email', '" . md5($password) . "', '".md5($repassword)."')";
         $result   = mysqli_query($con, $query);

          if ($result) {
            echo "<div class='sh-login__form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='sh-login__form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='signup.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>


<!-- HEADER -->


<!-- MAIN -->
<main>
    <div class="sh-login">
        <div class="sh-login__logo"><a href="index.php" class="sh-logo"><img src="fonts/icons/sharehub/svg/Sharehub.svg" alt=""></a></div>
        <div class="sh-login__content">
            <p>Sign up with Sharehub</p>
            <div class="sh-login__form" action="" method="post">
               
                    <input type="text" class="form-control" placeholder='Username' required>
                    <input type="email" class="form-control" placeholder='Email' required>
                    <input type="password" class="form-control" placeholder='Password' required>
                    <input type="password" class="form-control" placeholder='Retype Password' required>
                    <div class="sh-login__send">
                        <a href="login.php">Already have an account?</a>
                        <button type="submit" class="sh-btn">Sign up</button>
                    </div>
                    <div class="sh-login__footer">
                        <p>or with Social Network</p>
                        <div class="sh-login__social">
                            <a href="" class="sh-btn-social__facebook sh-btn-social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="" class="sh-btn-social__twitter sh-btn-social"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="" class="sh-btn-social__google sh-btn-social"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        </div>
                    </div>
               
            </div>
        </div>
    </div>
</main>
<?php
    }

<!-- FOOTER -->
<footer>
    <div class="sh-footer">
        <div class="container">
            <p class="text-center">Terms & Conditons . Privacy Policy</p>
        </div>
    </div>
</footer>
?>
</body>
</html>
