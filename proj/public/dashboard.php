<?php include_once "../core/init.php"; 

if($_SESSION['email'] != ADMIN_EMAIL){
  redirect('logout');
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="css/dashboard.css">
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title><?php echo NAME_WEBSITE; ?> | Dashboard</title>
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
        <h1 class="h2">Dashboard</h1> 
      
        <div class="btn-toolbar mb-2 mb-md-0">
            
          <div class="btn-group mr-2">

            <button type="button" class="btn btn-info">
            <?php  
  $res=mysqli_query($db,"SELECT * FROM `users` WHERE email != 'admin@gmail.com'");

   $users =  mysqli_num_rows($res); ?>
                Users <span class="badge badge-light"><?= $users;?></span>
                <span class="sr-only">unread messages</span>
              </button>

          </div>
         <button type="button" class="btn btn-warning">
         <?php  
  $res=mysqli_query($db,"SELECT * FROM `requests`");

   $request =  mysqli_num_rows($res); ?>
         Requests <span class="badge badge-light"><?= $request;?></span>
                <span class="sr-only">unread messages</span>
              </button>
  
        </div>
        <a href="logout" class="text-danger">Log Out</a>
      </div>


      <h2 class="text-info">Users</h2>
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

  $res=mysqli_query($db,"SELECT * FROM `users` WHERE email != 'admin@gmail.com'");

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

  <h1>Requests</h1>

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
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      
      <?php
  $res = mysqli_query($db, "SELECT * FROM `requests`;");
  if (mysqli_num_rows($res) > 0) {
   while ($row = mysqli_fetch_assoc($res)) {
    echo "<tr>";
    echo "<td>" . $row['id_number'] . "</td>";
    echo "<td>" . $row['fullname'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";
    echo "<td>" . $row['event'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td><a href='files/" . $row['filename'] . "'>" . $row['filename'] . "</a></td>";
    echo "<td><button class='btn btn-danger' onclick='deleteRequest(" . $row['id_number'] . ")'>Delete</button></td>";
    echo "</tr>";
  }
}

      ?>
<script>
  function deleteRequest(id_number) {
  if (confirm("Are you sure you want to delete this request?")) {
    $.ajax({
      type: "POST",
      url: "delete_request.php",
      data: { id_number: id_number },
      success: function () {
        location.reload();
      },
      error: function () {
        alert("Error deleting request.");
      },
    });
  }
}
</script>
    </tbody>
  </table>
</body>
</html>
