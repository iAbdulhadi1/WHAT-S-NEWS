<?php include_once "../core/init.php"; 

if(!$_SESSION['email']){
  redirect('logout');
}


?>
<link rel="stylesheet" href="css/dashboard.css">

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title><?php echo NAME_WEBSITE; ?> | Events</title>
    <script defer src="js/jquery.slim.min.js" ></script>
    <script defer src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css" >
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

 
  </head>
  <body>
 


    <main role="main" class="p-4">
        
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Events</h1> 
      
        <div class="btn-toolbar mb-2 mb-md-0">
            
          <div class="btn-group mr-2">

           
            
           
 

          </div>
         <button type="button" class="btn btn-warning">
         <?php  
          $email = $_SESSION['email'] ;
  $res=mysqli_query($db,"SELECT * FROM `requests` WHERE email = '$email'");

   $request =  mysqli_num_rows($res); ?>
         Requests <span class="badge badge-light"><?= $request;?></span>
                <span class="sr-only">unread messages</span>
              </button>


             
         
            

          
        </div>
        <a href="logout" class="text-danger">Log Out</a>
      </div>



      

     


      <h2 class="text-info">Your Information</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Email</th>
              <th>Password</th>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Created at</th>
            </tr>
          </thead>
          <tbody>
            <?php  
  $res=mysqli_query($db,"SELECT * FROM `users` WHERE email = '$email'");

   $_SESSION['users'] =  mysqli_num_rows($res);
  if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    {
        echo "<tr>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['password']."</td>";
        echo "<td>".$row['firstname']."</td>";
        echo "<td>".$row['lastname']."</td>";
        echo "<td>".$row['created_at']."</td>";
        echo "</tr>";
    }
}  
            
            ?>
           
        
           
          </tbody>
        </table>
      </div>


      <!-- Requests  -->

      <h2 class="text-success">Your Events</h2>
      <div class="table-responsive">
      <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID Number</th>
              <th>Fullname</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Event</th>
              <th>Description</th>
              <th>File</th>
            </tr>
          </thead>
          <tbody>
            <?php  
  $res=mysqli_query($db,"SELECT * FROM `requests` WHERE email = '$email'");
  $_SESSION['requests'] =  mysqli_num_rows($res);
  if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    {
        echo "<tr>";
        echo "<td>".$row['id_number']."</td>";
        echo "<td>".$row['fullname']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['phone']."</td>";
        echo "<td>".$row['event']."</td>";
        echo "<td>".$row['description']."</td>";
        echo "<td><a href='files/".$row['filename']."'>".$row['filename']."<a/></td>";
        echo "</tr>";
    }
}         
            ?>
           
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
        <script src="js/dashboard.js"></script>
  </body>
</html>
