<?php
include_once "header.php";
?>

        <!-- Header-->
        <header class="bg-primary bg-gradient text-white">
            <div class="container px-4 text-center">
                <h1 class="fw-bolder">Welcome to What's News </h1>
                <p class="lead">Have a great experience joining the events</p>
                <a class="btn btn-lg btn-light" href="#about">explore</a>
            </div>
        </header>

        <!-- About section-->
        <section id="about">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2>About What's News</h2>
                        <p class="lead">Do not go to more than one site to see the events here, we will include all the events that the university establishes</p>
                        <ul>
                            <li>With a few clicks, you can register for the event</li>
                            <li>Request to create an event for university members</li>
                            <li>Easy to understand page</li>
                            <li>A new and wonderful experience to introduce yourself, your talents and your information</li>
                        </ul>
                    </div>
                </div>
            </div>

        </section>
        <!-- Services section-->
        <section class="bg-light" id="services">
            <div class="container px-4"></div>
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2>Join now</h2>

                        <button class="button button1"><a href="login" class="link-light stretched-link">Login</a></button>
                        
                        <button class="button button1"><a href="register" class="link-light stretched-link">Register</a></button>
                    </div>
                </div>
        </section>

        <!-- Contact section-->
        <section id="contact">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2>Contact us</h2>
                        
                        <form>
                            <label for="Fname"  class="form-label">First name:</label><br>
                            <input class="form-control w-50" type="text" id="Fname" name="Fname" ><br>
                            <label for="lname" class="form-label ">Last name:</label><br>
                            <input class="form-control w-50" type="text" id="Lname" name="Lname" >
                            <br>
                            <label for="Email" class="form-label ">Email:</label><br>
                            <input class="form-control w-50" type="text" id="Email" name="Email" >
                            <br>

                            <label class="form-label">
                                for suggestions or complaints :
                                <br />
 <textarea class="form-control" name="address" cols="43" rows="3"></textarea>
                              </label>
                              

                              <br>

                              <button type="submit" class="btn btn-success">Submit</button>
                          </form>

                    </div>
                </div>
            </div>
        </section>
        

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
