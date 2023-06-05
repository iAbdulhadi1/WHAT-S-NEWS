<?php
include_once "../core/init.php";
#الاتصال بقاعدة البيانات
$email = $_SESSION['email'];
#بناءا على الايميل , تخزين الايميل 
checkLogin($email);
# الامر يفحص هل الايميل موجود في قاعدة البيانات
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MainPage</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/maincss.css" rel="stylesheet" />
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">What's News</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="myProfile">MyProfile</a>
                <!-- <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Massages">Massages</a> -->
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="events">Events</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="calendar">Calendar</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="mailto:basharsamman0@gmail.com">Contact Us</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="faq">Helps&FAQs</a> 
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="logout">Log Out</a>

            </div>

        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">Menu</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                </div>
            </nav>

            <!-- Page content-->
            <div class="container-fluid">
                <h1 class="mt-4">Homepage</h1>

                <div class="slidershow middle">



                    <div class="city">
                        <h2>Go to the events page</h2>
                        <button class="button button1"><a href="request" class="link-light">Create an event
                                request</a></button>
                        <button class="button button1"><a href="events" class="link-light">Attend an event</a></button>
                    </div>

                    <div class="slides">
                        <input type="radio" name="r" id="r1" checked>
                        <input type="radio" name="r" id="r2">
                        <input type="radio" name="r" id="r3">

                        <div class="slide s1">
                            <img src="images/liyb.jpg" alt="">
                        </div>
                        <div class="slide">
                            <img src="images/book.jpg" alt="">
                        </div>
                        <div class="slide">
                            <img src="images/foot.jpg" alt="">
                        </div>
                    </div>

                    <div class="navigation">
                        <label for="r1" class="bar"></label>
                        <label for="r2" class="bar"></label>
                        <label for="r3" class="bar"></label>


                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/main.js"></script>

</body>

</html>