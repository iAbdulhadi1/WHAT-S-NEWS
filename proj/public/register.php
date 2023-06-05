<?php include_once "../core/init.php"; 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//عندما يرسل المستخدم معلومات التسجيل قم بالتحقق : 

    if(isset($_POST['firstname'])){
        $firstname = clear($_POST['firstname']);
    }
    if(strlen($_POST['firstname'])  <= 3){
        $_SESSION['error'] =  "firstname should be more than 3 characters";
    }

    if(isset($_POST['lastname'])){
        $lastname = clear($_POST['lastname']);

    }if(strlen($_POST['lastname']) <= 3){
        $_SESSION['error'] =  "lastname should be more than 3 characters";
    }

    
    if(isset($_POST['password'])){
        $password = clear($_POST['password']);

    }if(strlen($_POST['password']) < 8){
        $_SESSION['error'] =  "password should be more than 8 characters";
    }


    if(isset($_POST['email'])){
        $email = clear($_POST['email']);

    }if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] =  "please inser invalid email";
    }

    // check email 
      $res=mysqli_query($db,"SELECT email FROM `users` WHERE email = '$email'");
      if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if($email==isset($row['email']))
        {
            $_SESSION['error'] =  "email already exists";
        }
    }

    // تخزين الوقت الذي انشاء به الحساب
    $created_at = date("F j, Y, g:i a"); 
    $url = bin2hex(random_bytes(16)) ;

    //اذا كان لايحتوي على خطا اكمل العملية
    if($_SESSION['error'] == ""){
        $insert = mysqli_query($db,"INSERT INTO users(firstname, lastname, email, password, url, created_at)
         VALUES ('$firstname','$lastname','$email','$password','$url','$created_at')");
         $_SESSION['success'] = "Account created successfully , login now";
         redirect("login");
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title><?php echo NAME_WEBSITE; ?> | Register</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap v5.1.3 CDNs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CSS File -->
    <link rel="stylesheet" href="css/login.css">

</head>

<body>

<br>
    <div class="login">
        <br>
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

        <h1 class="text-center">Register</h1>
        <form class="needs-validation" method="POST" action="">


            <!--Name-->
        <div class="form-group was-validated">
            <label class="form-label" for="Fname">First Name</label>
            <input class="form-control" type="text" id="Fname" name="firstname" required >
            <div class="invalid-feedback">
                Please enter your First Name
            </div>
        </div>

        <div class="form-group was-validated">
            <label class="form-label" for="Lname">Last Name</label>
            <input class="form-control" type="text" id="Lname" name="lastname" required >
            <div class="invalid-feedback">
                Please enter your Last Name
            </div>
        </div>

            <!--Email-->
            <div class="form-group was-validated">
                <label class="form-label" for="email">Email address</label>
                <input class="form-control" type="email" id="email" name="email" required>
                <div class="invalid-feedback">
                    Please enter your email address
                </div>
             </div>
             
            <!--Password-->
            <div class="form-group was-validated">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password" required>
                <div class="invalid-feedback">
                    Please enter your password
                </div>
            </div>

       

            <input class="btn btn-success w-100" type="submit" name="submit" value="SIGN UP">

        </form>

        <a href="login" >Or Login</a>
    </div>

</body>

</html>