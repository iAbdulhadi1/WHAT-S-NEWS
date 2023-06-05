<?php include_once "../core/init.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['password'])){
        $password = clear($_POST['password']);

    }if(empty($_POST['password'])){
        $_SESSION['error'] =  "please enter password";
    }

    if(isset($_POST['email'])){
        $email = clear($_POST['email']);

    }if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] =  "please inser invalid email";
    }

    if(empty($_POST['email'])){
        $_SESSION['error'] =  "please enter email";
    }


    if($_SESSION['error'] == ""){
        //التحقق
        $result = mysqli_query($db,"SELECT `email`,`password` FROM users WHERE email = '$email' AND password= '$password' limit 1");
        $rows = mysqli_num_rows($result);
        if($rows==1){
            
        $_SESSION['email'] = $email;
            
        if($_SESSION['email'] == ADMIN_EMAIL){
            redirect("dashboard");
        }if($_SESSION['email'] != ADMIN_EMAIL){
            redirect("home");
        }
                
        }else{
            $_SESSION['error'] =  "Wrong email or password!";
            
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<title><?php echo NAME_WEBSITE; ?> | Login</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap v5.1.3 CDNs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CSS File -->
            <link href="css/login.css" rel="stylesheet" />

</head>

<body>

    <div class="login">
    <?php if(isset($_SESSION['error']) && $_SESSION['error'] != ""):?>
    <div class="alert alert-danger" role="alert">
<?php
{
echo $_SESSION['error'];
}
unset($_SESSION['error']);

?>
</div>
<?php endif ;?>


<?php if(isset($_SESSION['success']) && $_SESSION['success'] != ""):?>
    <div class="alert alert-success" role="alert">
<?php
{
echo $_SESSION['success'];
}
unset($_SESSION['success']);

?>
</div>
<?php endif ;?>
        <h1 class="text-center">Login</h1>
        
        <!--Email-->
        <form class="needs-validation" method="POST" action="">
            <div class="form-group was-validated">
                <label class="form-label" for="email">Email address</label>
                <input class="form-control" type="email" value="" name="email" id="email" >
                <div class="invalid-feedback">
                    Please enter your email address
                </div>
             </div>   
               <!--Password-->

            <div class="form-group was-validated">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" value="" name="password" id="password" >
                <div class="invalid-feedback">
                    Please enter your password
                </div>
            </div>
       
            <input class="btn btn-success" type="submit" name="submit"  value="SIGN IN">

        </form>
        <a href="register" >Or Register</a>
    </div>

</body>

</html>