<?php include_once "../core/init.php";
$email = $_SESSION['email'];
checkLogin($email);


$result = mysqli_query($db,"SELECT * FROM users WHERE email = '$email' LIMIT 1");


  while ($row = $result->fetch_assoc()) {
    $_SESSION['fullname'] = $row['firstname']." ".$row['lastname'];
}


if(isset($_POST['submit'])){

  if(isset($_POST['IdNumber'])){
    $IdNumber = $_POST['IdNumber'];
  }
  if(empty($_POST['IdNumber'])){
    $_SESSION['error'] =  "please inser IdNumber";
  }


  if(isset($_POST['FullName'])){
    $FullName = clear($_POST['FullName']);
  }
  if(empty($_POST['FullName'])){
    $_SESSION['error'] =  "please insert FullName";
  }

  if(isset($_POST['email'])){
    $email = $_SESSION['email'];
  }
  if(empty($_POST['email'])){
    $_SESSION['error'] =  "please insert email";
  }


  if(isset($_POST['PhoneNumber'])){
    $PhoneNumber = clear($_POST['PhoneNumber']);
  }
  if(empty($_POST['PhoneNumber'])){
    $_SESSION['error'] =  "please insert PhoneNumber";
  }

  if(isset($_POST['EventTitle'])){
    $EventTitle = clear($_POST['EventTitle']);
  }
  if(empty($_POST['EventTitle'])){
    $_SESSION['error'] =  "please write a EventTitle";
  }

  if(isset($_POST['Description'])){
    $Description = clear($_POST['Description']);
  }
  if(empty($_POST['Description'])){
    $_SESSION['error'] =  "please write a  Description";
  }

//pic
  if(isset($_FILES['filename'])){
    $filename = $_FILES['filename']['name'];
    $filename_size = $_FILES['filename']['size'];
    $filename_error = $_FILES['filename']['error'];
    $fileExt = explode(".",$filename);
    $end = strtolower(end($fileExt)); //gime the last  
    $allowed = array("jpg","jpeg","pdf","png","svg"); // الصيغ المسموحة 
    if(in_array($end,$allowed)){
      if($filename_error == 0){ 
        if($filename_size < 600000000){  //  1000000 Bytes = 1 MB    // 20000000 = 20mb
          $new_name = time().'.'.$end;
          
          $target = "./files/".$new_name;	
          if(!empty($filename)){
            if (move_uploaded_file($_FILES['filename']['tmp_name'],$target)){
            }
          }
  
        
        }else{
          $_SESSION['error'] = "File too big";
        
        }
  
      }else{
      
        $_SESSION['error'] = "You have error in your file";
  
      }
  
    }else{
      $_SESSION['error'] = "Type of file not accepted";
    }
      
  }
    
  if(!isset($_FILES['filename']) || empty($_FILES['filename']) || $_FILES['filename'] == ""){
      $_SESSION['error'] ="Please choose file";
  }

  if($_SESSION['error'] == ""){
    $insert = mysqli_query($db,"INSERT INTO `requests`(`id_number`, `fullname`, `email`, `phone`, `event`, `description`, `filename`) 
    VALUES ('$IdNumber','$FullName','$email','$PhoneNumber','$EventTitle','$Description','$new_name')");
     $_SESSION['success'] = "Your request sent success .Thanks";
     redirect("request");
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Form</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="css/requestcss.css">
</head>
<body>

<div class="wrapper">
    <div class="title">
      Request Form
    </div>
    <div class="form">
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
        <form action="" method="post" enctype="multipart/form-data">

       <div class="inputfield">
        <label for="IdNumber">ID Number:</label><br>
        
        <input type="text" id="IdNumber" name="IdNumber" class="input" value="<?= mt_rand(99999,999999) ;?>" ><br>
       </div>  

       <div class="inputfield">
          <label>Full Name</label>
          <input type="text" id="FullName" name="FullName" value="<?= $_SESSION['fullname'] ;?>"  class="input" >
       </div>  

        <div class="inputfield">
          <label>Email Address</label>
          <input type="email" class="input" name="email" value="<?= $_SESSION['email'] ;?>" >
          
       </div> 

      <div class="inputfield">
          <label>Phone Number</label>
          <input type="text" id="PhoneNumber" name="PhoneNumber" class="input">
       </div> 

       <div class="inputfield">
        <label>Event title</label>
        <input type="text" id="Eventtitle" name="EventTitle" class="input">
     </div> 

      <div class="inputfield">
          <label>Description of the event</label>
          <textarea class="textarea" name="Description"></textarea>
       </div> 

       <input type="file" id="myFile" name="filename">
       <p>put a picture describing the event</p>
       
       <br><br>

      <div class="inputfield terms">
          <label class="check">
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <p>Agreed to terms and conditions</p>
       </div> 
      <div class="inputfield">
        <input type="submit" value="Create a request" name="submit" class="btn">

      </div>
      <a href="home">cancel</a>
    </div>
</div>	
</form>
</body>
</html>