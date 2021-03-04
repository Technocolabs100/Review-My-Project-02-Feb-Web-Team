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
<!-- HEADER -->
<?php
    require('connection.php');
    session_start();

    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $query    = "SELECT * FROM `signup` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);

        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");

        } else {
            echo "<div class='sh-login__form'>
                  <h3>Incorrect Username.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }

        else {
            echo "<div class='sh-input-copy'>
                  <h3>Incorrect password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }

    } else {
        ?>

<!-- MAIN -->
<main>
    <div class="sh-login">
        <div class="sh-login__logo"><a href="index.php" class="sh-logo"><img src="fonts/icons/sharehub/svg/Sharehub.svg" alt=""></a></div>
        <div class="sh-login__content">
            <p>Login with Sharehub</p>
            <div class="sh-login__form"  method="post" name="login">
                    <input type="text" class="form-control" placeholder='Username' required autofocus ="true/">
                    <div class="sh-input-copy">
                        <input type="password" class="form-control" placeholder='Password' required>
                        <a href="blog.html">Copy</a>
                    </div>
                    <div class="sh-login__send">
                        <a href="signup.php">Need an account?</a>
                        <button type="submit" class="sh-btn">Login</button>
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
