<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V-Care </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- header section starts  -->
    <header class="header">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


        <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> V-care. </a>

        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="#services">services</a>
            <a href="#about">about</a>
            <!-- <a href="#book">book</a> -->
            <a class="btn" id="loginbtn" href="login.php">Login / Register</a>


        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>

    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="image">
            <img src="image/home-img.svg" alt="">
        </div>

        <div class="content">
            <h3>stay safe, stay healthy</h3>
            <p></p>
            <a href="login.php" class="btn"> Get Started <span class="fas fa-chevron-right"></span> </a>
        </div>

    </section>

    <!-- home section ends -->

    <!-- icons section starts  -->

    <section class="services" id="services">

        <div class="box-container">
            <h1 class="heading"> our <span>services</span> </h1>
        </div>
        <div class="icons-container">

            <div class="icons">
                <i class="fas fa-user-md"></i>
                <h3>Predico</h3>
                <p>Heart disease Prediction</p>
            </div>

            <div class="icons">
                <i class="fas fa-calendar-check"></i>
                <h3>Online appointment</h3>
                <p>Book your slots</p>
            </div>

            <div class="icons">
                <i class="fas fa-comments"></i>
                <h3>Instant chat support</h3>
                <p>Chat with our experts</p>
            </div>
        </div>

        <!-- <div class="icons">
        <i class="fas fa-hospital"></i>
        <h3>80+</h3>
        <p>available hospitals</p>
    </div> -->

    </section>


    <section class="about" id="about">

        <h1 class="heading"> <span>about</span> us </h1>

        <div class="row">

            <div class="image">
                <img src="image/about-img.svg" alt="">
            </div>

            <div class="content">
                <h3>we take care of your healthy life</h3>
                <!-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure ducimus, quod ex cupiditate ullam in assumenda maiores et culpa odit tempora ipsam qui, quisquam quis facere iste fuga, minus nesciunt.</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus vero ipsam laborum porro voluptates voluptatibus a nihil temporibus deserunt vel?</p> -->
                <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
            </div>

        </div>

    </section>

 

    <section class="footer">

      

        <div class="credit"> created by <span>V Care </span> | all rights reserved </div>

    </section>

    <!-- footer section ends -->


    <!-- custom js file link  -->
    <!-- <script src="js/script.js"></script> -->

</body>

</html>