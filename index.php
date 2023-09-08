<?php
   include("assets/php/config.php");

   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // email and password sent from form 
      
      $myuseremail = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT Email FROM `login` WHERE Email='$myuseremail' AND Password='$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);

      if($count == 1) {
         $_SESSION['login_user'] = $myuseremail;
         header("location: index.php");
      }else {
        header("location: error.php");
      }
   }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Sanzi The Bot</title>

    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="assets/images/favicon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="assets/images/favicon.png"
      alt = "SANZI"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="assets/images/favicon.png"
    />
    <link rel="manifest" href="assets/favicon/site.webmanifest" />

    <!--stylesheet-->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/all.min.css" />

    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/custom.css" />
    <link rel="stylesheet" href="assets/css/login_signup.css">
  </head>

  <body>
    <!--preloader start-->
    <div class="preloader">
      <img src="assets/images/favicon.png" alt="image" />
    </div>
    <!--preloader end-->

    <!--header section start-->
    <header class="header header-1">
      <div class="container">
        <div class="header__wrapper">
          <div class="header__logo">
            <a href="index.php">
              <img src="assets/images/logo.png"  alt="SANZI" />
            </a>
          </div>
          <div class="header__nav" id = "header__nav_trig">
            <ul class="header__nav-primary">
              <li><a href="#video">Video</a></li>
              <li><a href="#feature">Features</a></li>
              <li><a href="#feedback">Feedbacks</a></li>

              <li class="nav__dropdown dropdown-wrapper" id="menu-1">
                <a href="#" class="nav__dropdown-info dropdown-info">
                  More..
                </a>
                <ul class="nav__dropdown-box dropdown-box">
                  <li><a href="#faq">FAQs</a></li>
                  <li><a href="#pricing">Pricing</a></li>
                  <li><a href="#preview">Preview</a></li>
                </ul>
              </li>
              <li><a href="product.php">Products</a></li>
              <li>
                <?php
                     if(isset($_SESSION['login_user'])){
                      echo "<li class='nav__dropdown dropdown-wrapper' id='menu-2'>
                      <a href='#' class='nav__dropdown-info dropdown-info'>
                        My Account
                      </a>
                      <ul class='nav__dropdown-box dropdown-box'>
                      <li><a href='#'>Console</a></li>
                      <li><a href='#'>Cart</a></li>
                      <li><a href='#'>Order</a></li>
                      <li><a href='#'>My Profile</a></li>
                      <li><a href='assets/php/logout.php'>Log Out</a></li>
                    </ul>
                      ";
                   }else{
                    echo "<a href='#pricing'
                    data-bs-toggle='modal'
                    data-bs-target='#login_join'
                    class='btn btn-success Signup_button'>
                    Sign Up
                  </a>";
                   }
                ?>

              </li>
            </ul>
            <span><i class="fas fa-times"></i></span>
          </div>
          <div class="header__bars">
            <div class="header__bars-bar header__bars-bar-1"></div>
            <div class="header__bars-bar header__bars-bar-2"></div>
            <div class="header__bars-bar header__bars-bar-3"></div>
          </div>
        </div>
      </div>
    </header>
    <!--header section end-->

    <!-- ----------------Full Screen Login/Signup  Start------------------>
   

    <div class="modal fade " id="login_join" >
      <div class="modal-dialog modal-fullscreen">
        <div id="particles-js">
        <div class="modal-content particle-js" style="background: rgba(29, 29, 39, 0.7)">
          <div class="modal-header border-0">
            <button
              type="button"
              class="btn bg-white btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body d-flex justify-content-center">
            <div class="input-group" style="max-width: 600px">
              <div class="ls_container">
                <div class="cont">
                    <div class="form sign-in">
                        <h2>Welcome</h2>
                        <form action="" method="post">
                        <label>
                            <span>Email</span>
                            <input class="input_button_grp input_grp" type="email" name = "email" />
                        </label>
                        <label>
                            <span>Password</span>
                            <input class="input_button_grp input_grp"  type="password" name="password"/>
                        </label>
                        <p class="forgot-pass">Forgot password?</p>
                        <button href="#header__nav_trig" type="submit" class="submit input_button_grp button_cls">Log In</button>
                    </form>

                    </div>
                    <div class="sub-cont">
                        <div class="img">
                            <div class="img__text m--up">
                             
                                <h3>Don't have an account? Please Sign up!<h3>
                            </div>
                            <div class="img__text m--in">
                            
                                <h3>If you already has an account, just sign in.<h3>
                            </div>
                            <div class="img__btn">
                                <span class="m--up">Sign Up</span>
                                <span class="m--in">Log In</span>
                            </div>
                        </div>
                        <div class="form sign-up">
                            
                            <h2>Create your Account</h2>
                            <form action="assets/php/registration.php" method="post">
                            <label>
                                <span>Name</span>
                                <input class="input_button_grp input_grp" type="text" name = "Name"/>
                            </label>
                            <label>
                                <span>Email</span>
                                <input class="input_button_grp input_grp" type="email" name = "Email"/>
                            </label>
                            <label>
                                <span>Password</span>
                                <input class="input_button_grp input_grp"  type="password" name = "Password" />
                            </label>
                            <label>
                                <select name="my_select" id="my_select" class="input_button_grp input_grp box" style="color:#cfcfcf;;  font-size: 20px; font-weight: bold;">
                                      <option value="BASIC" style="background:#28073394;">BASIC</option>
                                      <option value="STANDARD" style="background:#28073394;" >STANDARD</option>
                                      <option value="PREMIUM" style="background:#28073394;">PREMIUM</option>
                                </select>
                            </label>
                            <button type="submit" class="submit input_button_grp button_cls">Sign Up</button>
                        </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  
    <!-- --------Full Screen Login/Signup close  End------------------>

    <!--hero section start-->
    <section class="hero">
      <div class="hero__wrapper">
        <div class="container">
          <div class="row align-items-lg-center">
            <div class="col-lg-6 order-2 order-lg-1">
              <h1 class="main-heading color-black">
                Project SANZI !!
              </h1>
              <p class="paragraph">
                <span>SANZI<sup>TM</sup></span> is an AI Based virtual assistant technology. It's a smart home products including smart speakers, smart displays, streaming devices, thermostats, smoke detectors, routers and security systems including smart doorbells, cameras and smart locks. 
              </p>

            </div>
            <div class="col-lg-6 order-1 order-lg-2">
              <div class="questions-img hero-img">
                <img src="assets/images/product/Untitled-1.png" alt="image" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--hero section end-->

    <!--feature section start-->
    <section class="feature" id="intro">
      <div class="container">
        <h2 class="section-heading color-black">
          Get surprised by amazing features.
        </h2>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="feature__box feature__box--1">
              <div class="icon icon-1">
                <i class="fad fa-user-astronaut"></i>
              </div>
              <div class="feature__box__wrapper">
                <div class="feature__box--content feature__box--content-1">
                  <h3>Voice Command</h3>
                  <p class="paragraph dark">
                    Suisque metus tortor ultricies ac ligula neced eleifend
                    sodales felise morbi nec tempor isvelultricies ligula.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="feature__box feature__box--2">
              <div class="icon icon-2">
                <i class="fad fa-lightbulb-on"></i>
              </div>
              <div class="feature__box__wrapper">
                <div class="feature__box--content feature__box--content-2">
                  <h3>3D Mapping</h3>
                  <p class="paragraph dark">
                    Euisque metus tortor ultricies ac ligula neced eleifend
                    sodales felise morbi nec tempor isvel ultricies ligula.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="feature__box feature__box--3">
              <div class="icon icon-3">
                <i class="fad fa-solar-system"></i>
              </div>
              <div class="feature__box__wrapper">
                <div class="feature__box--content feature__box--content-3">
                  <h3>Home Automation</h3>
                  <p class="paragraph dark">
                    Auisque metus tortor ultricies ac ligula neced eleifend
                    sodales felise morbi nec tempor isvel ultricies ligula.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="feature__box feature__box--4">
              <div class="icon icon-4">
                <i class="fad fa-rocket-launch"></i>
              </div>
              <div class="feature__box__wrapper">
                <div class="feature__box--content feature__box--content-4">
                  <h3>Faster Response</h3>
                  <p class="paragraph dark">
                    Tuisque metus tortor ultricies ac ligula neced eleifend
                    sodales felise morbi nec tempor isvel ultricies ligula.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--feature section end-->

    <!--video section start-->
    <div class="video" id="video">
      <div class="video__wrapper">
        <div class="container">
          <div class="video__play">
            <button type="button" data-toggle="modal" data-target="#videoModal">
              <i class="fad fa-play"></i>
            </button>
            <div
              class="modal fade"
              id="videoModal"
              tabindex="-1"
              role="dialog"
              aria-hidden="true"
            >
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-close">
                    <button
                      type="button"
                      data-dismiss="modal"
                      aria-label="Close"
                    >
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- <iframe
                      src="assets/video/VOICE ASSISTANT TEXT.mp4"
                      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen
                    ></iframe> -->
                    <video width="498" height="400" controls style="margin-top:-50px">
                      <source src="assets/video/VOICE ASSISTANT TEXT.mp4" type="video/mp4">
                      Your browser does not support HTML video.
                    </video>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="video__background">
            <img
              src="assets/images/video-bg-1.png"
              alt="image"
              class="texture-1"
            />
            <img src="assets/images/phone-01.png" alt="image" class="phone" />
            <img
              src="assets/images/video-bg-2.png"
              alt="image"
              class="texture-2"
            />
          </div>
        </div>
      </div>
    </div>
    <!--video section end-->

    <!--growth section start-->
    <section class="growth" id="feature">
      <div class="growth__wrapper">
        <div class="container">
          <h2 class="section-heading color-black">
            Lorem ipsum dolor sit amet consectetur.
          </h2>
          <div class="row">
            <div class="col-lg-6">
              <div class="growth__box">
                <div class="icon">
                  <i class="fad fa-user-astronaut"></i>
                </div>
                <div class="content">
                  <h3>Start Easily</h3>
                  <p class="paragraph dark">
                    Auisque metus tortor ultricies ac ligula neced eleifend
                    sodales felise.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="growth__box">
                <div class="icon">
                  <i class="fad fa-lightbulb-on"></i>
                </div>
                <div class="content">
                  <h3>Improve Growth</h3>
                  <p class="paragraph dark">
                    Kuisque metus tortor ultricies ac ligula neced eleifend
                    sodales felise.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="growth__box">
                <div class="icon">
                  <i class="fad fa-solar-system"></i>
                </div>
                <div class="content">
                  <h3>Create Algorithms</h3>
                  <p class="paragraph dark">
                    Nuisque metus tortor ultricies ac ligula neced eleifend
                    sodales felise.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="growth__box">
                <div class="icon">
                  <i class="fad fa-backpack"></i>
                </div>
                <div class="content">
                  <h3>Expand Portfolio</h3>
                  <p class="paragraph dark">
                    Euisque metus tortor ultricies ac ligula neced eleifend
                    sodales felise.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="growth__box">
                <div class="icon">
                  <i class="fad fa-rocket-launch"></i>
                </div>
                <div class="content">
                  <h3>Share Statistics</h3>
                  <p class="paragraph dark">
                    Buisque metus tortor ultricies ac ligula neced eleifend
                    sodales felise.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="growth__box">
                <div class="icon">
                  <i class="fad fa-user-astronaut"></i>
                </div>
                <div class="content">
                  <h3>Measure Results</h3>
                  <p class="paragraph dark">
                    Suisque metus tortor ultricies ac ligula neced eleifend
                    sodales felise.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="button__wrapper">
              <a href="#" class="button">
                <span>GET STARTED <i class="fad fa-long-arrow-right"></i></span>
              </a>
              <a href="#" class="button">
                <span>LEARN MORE <i class="fad fa-long-arrow-right"></i></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--growth section end-->

    <!--step section start-->
    <section class="step">
      <div class="step__wrapper">
        <div class="container">
          <h2 class="section-heading color-black">
            Lorem ipsum dolor sit amet consectetur adipisicing.
          </h2>
          <div class="row">
            <div class="col-lg-4">
              <div class="step__box">
                <div class="image">
                  <img src="assets/images/phone-01.png" alt="image" />
                </div>
                <div class="content">
                  <h3>EASY TO<span>Register.</span></h3>
                  <p class="paragraph dark">
                    Join the app in 3 easy steps and get started with your
                    progresso daily.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="step__box">
                <div class="image">
                  <img src="assets/images/phone-01.png" alt="image" />
                </div>
                <div class="content">
                  <h3>SIMPLE TO<span>Create.</span></h3>
                  <p class="paragraph dark">
                    Once you’re signed up you can create as many polls you want
                    to watch.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="step__box">
                <div class="image">
                  <img src="assets/images/phone-01.png" alt="image" />
                </div>
                <div class="content">
                  <h3>FUN TO<span>Measure.</span></h3>
                  <p class="paragraph dark">
                    Share your growth results with your friends and inspre
                    others.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="button__wrapper">
              <a href="#" class="button">
                <span>GET STARTED <i class="fad fa-long-arrow-right"></i></span>
              </a>
              <a href="#" class="button">
                <span>LEARN MORE <i class="fad fa-long-arrow-right"></i></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--step section end-->

    <!--client section start-->
    <section class="clients-sec" id="feedback">
      <div class="container">
        <h2 class="section-heading color-black">
          Hear from what others had to say.
        </h2>
        <div class="testimonial__wrapper">
          <div class="client client-01 active">
            <div class="image">
              <img src="assets/images/testimonial-img-01.png" alt="image" />
            </div>
            <div class="testimonial">
              <div class="testimonial__wrapper">
                <p>
                  “Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est distinctio animi alias maiores corporis? Impedit ullam assumenda amet facilis officiis nihil soluta quis aliquam et, iure tempore veritatis repellendus quas!”
                </p>
                <h4>— Rafiqul Jakir</h4>
              </div>
            </div>
          </div>
          <div class="client client-02">
            <div class="image">
              <img src="assets/images/testimonial-img-02.png" alt="image" />
            </div>
            <div class="testimonial">
              <div class="testimonial__wrapper">
                <p>
                  “One Hath. Second. Kind them you fourth, fly brought. Give
                  very let. Dominion wherein after can't fill, unto brought
                  waters air. And our Beast won't dry there have after it. You
                  have herb shall creeping bring sixth tree she'd open.”
                </p>
                <h4>— DAVID SPADE</h4>
              </div>
            </div>
          </div>
          <div class="client client-03">
            <div class="image">
              <img src="assets/images/testimonial-img-03.png" alt="image" />
            </div>
            <div class="testimonial">
              <div class="testimonial__wrapper">
                <p>
                  “One Hath. Second. Kind them you fourth, fly brought. Give
                  very let. Dominion wherein after can't fill, unto brought
                  waters air. And our Beast won't dry there have after it. You
                  have herb shall creeping bring sixth tree she'd open.”
                </p>
                <h4>— DAVID SPADE</h4>
              </div>
            </div>
          </div>
          <div class="client client-04">
            <div class="image">
              <img src="assets/images/testimonial-img-04.png" alt="image" />
            </div>
            <div class="testimonial">
              <div class="testimonial__wrapper">
                <p>
                  “One Hath. Second. Kind them you fourth, fly brought. Give
                  very let. Dominion wherein after can't fill, unto brought
                  waters air. And our Beast won't dry there have after it. You
                  have herb shall creeping bring sixth tree she'd open.”
                </p>
                <h4>— DAVID SPADE</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="clients">
          <div class="clients__info">
            <h3>47,000+</h3>
            <p class="paragraph dark">
              Customers in over 90 countries are growing their businesses with
              us.
            </p>
          </div>
          <div class="swiper-container clients-slider">
            <div class="swiper-wrapper">
              <div class="swiper-slide clients-slide">
                <a href="#"
                  ><img src="assets/images/client-img.png" alt="image"
                /></a>
              </div>
              <div class="swiper-slide clients-slide">
                <a href="#"
                  ><img src="assets/images/client-img.png" alt="image"
                /></a>
              </div>
              <div class="swiper-slide clients-slide">
                <a href="#"
                  ><img src="assets/images/client-img.png" alt="image"
                /></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--client section end-->

    <!--questions section start-->
    <section class="questions" id="faq">
      <div class="questions__wrapper">
        <div class="container">
          <h2 class="section-heading color-black">
            Some frequently asked questions.
          </h2>
          <div class="row align-items-lg-center">
            <div class="col-lg-6 order-2 order-lg-1">
              <div id="accordion">
                <div class="card" id="card-1">
                  <div class="card-header" id="heading-1">
                    <h5 class="mb-0">
                      <button
                        class="btn btn-link"
                        data-toggle="collapse"
                        data-target="#collapse-1"
                        aria-expanded="true"
                        aria-controls="collapse-1"
                      >
                        How does algorithms work?
                      </button>
                    </h5>
                  </div>

                  <div
                    id="collapse-1"
                    class="collapse show"
                    aria-labelledby="heading-1"
                    data-parent="#accordion"
                  >
                    <div class="card-body">
                      <p class="paragraph">
                        With increasing calls for government accountability and
                        cost savings, agencies are contending with a mountain of
                        rule and policy changes affecting everything from
                        pensions and benefits, to client eligibility and
                        oversight.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="card" id="card-2">
                  <div class="card-header" id="heading-2">
                    <h5 class="mb-0 hidden">
                      <button
                        class="btn btn-link collapsed"
                        data-toggle="collapse"
                        data-target="#collapse-2"
                        aria-expanded="false"
                        aria-controls="collapse-2"
                      >
                        What is a business rules engine?
                      </button>
                    </h5>
                  </div>
                  <div
                    id="collapse-2"
                    class="collapse"
                    aria-labelledby="heading-2"
                    data-parent="#accordion"
                  >
                    <div class="card-body">
                      <p class="paragraph">
                        With increasing calls for government accountability and
                        cost savings, agencies are contending with a mountain of
                        rule and policy changes affecting everything from
                        pensions and benefits, to client eligibility and
                        oversight.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="card" id="card-3">
                  <div class="card-header" id="heading-3">
                    <h5 class="mb-0 hidden">
                      <button
                        class="btn btn-link collapsed"
                        data-toggle="collapse"
                        data-target="#collapse-3"
                        aria-expanded="false"
                        aria-controls="collapse-3"
                      >
                        How are datadirect drivers different?
                      </button>
                    </h5>
                  </div>
                  <div
                    id="collapse-3"
                    class="collapse"
                    aria-labelledby="heading-3"
                    data-parent="#accordion"
                  >
                    <div class="card-body">
                      <p class="paragraph">
                        With increasing calls for government accountability and
                        cost savings, agencies are contending with a mountain of
                        rule and policy changes affecting everything from
                        pensions and benefits, to client eligibility and
                        oversight.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="card" id="card-4">
                  <div class="card-header" id="heading-4">
                    <h5 class="mb-0 hidden">
                      <button
                        class="btn btn-link collapsed"
                        data-toggle="collapse"
                        data-target="#collapse-4"
                        aria-expanded="false"
                        aria-controls="collapse-4"
                      >
                        How do determine agencies compliance?
                      </button>
                    </h5>
                  </div>
                  <div
                    id="collapse-4"
                    class="collapse"
                    aria-labelledby="heading-4"
                    data-parent="#accordion"
                  >
                    <div class="card-body">
                      <p class="paragraph">
                        With increasing calls for government accountability and
                        cost savings, agencies are contending with a mountain of
                        rule and policy changes affecting everything from
                        pensions and benefits, to client eligibility and
                        oversight.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="card" id="card-5">
                  <div class="card-header" id="heading-5">
                    <h5 class="mb-0 hidden">
                      <button
                        class="btn btn-link collapsed"
                        data-toggle="collapse"
                        data-target="#collapse-5"
                        aria-expanded="false"
                        aria-controls="collapse-5"
                      >
                        How are datadirect drivers different?
                      </button>
                    </h5>
                  </div>
                  <div
                    id="collapse-5"
                    class="collapse"
                    aria-labelledby="heading-5"
                    data-parent="#accordion"
                  >
                    <div class="card-body">
                      <p class="paragraph">
                        With increasing calls for government accountability and
                        cost savings, agencies are contending with a mountain of
                        rule and policy changes affecting everything from
                        pensions and benefits, to client eligibility and
                        oversight.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="card" id="card-6">
                  <div class="card-header" id="heading-6">
                    <h5 class="mb-0 hidden">
                      <button
                        class="btn btn-link collapsed"
                        data-toggle="collapse"
                        data-target="#collapse-6"
                        aria-expanded="false"
                        aria-controls="collapse-6"
                      >
                        What is a business rules engine?
                      </button>
                    </h5>
                  </div>
                  <div
                    id="collapse-6"
                    class="collapse"
                    aria-labelledby="heading-6"
                    data-parent="#accordion"
                  >
                    <div class="card-body">
                      <p class="paragraph">
                        With increasing calls for government accountability and
                        cost savings, agencies are contending with a mountain of
                        rule and policy changes affecting everything from
                        pensions and benefits, to client eligibility and
                        oversight.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="card" id="card-7">
                  <div class="card-header" id="heading-7">
                    <h5 class="mb-0 hidden">
                      <button
                        class="btn btn-link collapsed"
                        data-toggle="collapse"
                        data-target="#collapse-7"
                        aria-expanded="false"
                        aria-controls="collapse-7"
                      >
                        What are the types of datadirect drivers?
                      </button>
                    </h5>
                  </div>
                  <div
                    id="collapse-7"
                    class="collapse"
                    aria-labelledby="heading-7"
                    data-parent="#accordion"
                  >
                    <div class="card-body">
                      <p class="paragraph">
                        With increasing calls for government accountability and
                        cost savings, agencies are contending with a mountain of
                        rule and policy changes affecting everything from
                        pensions and benefits, to client eligibility and
                        oversight.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
              <div class="questions-img">
                <img src="assets/images/phone-01.png" alt="image" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--questions section end-->

    <!--pricing section start-->
    <section class="pricing" >
      <div class="pricing__wrapper">
        <h2 class="section-heading color-black" id="pricing">
          Easy pricing plans for your needs.
        </h2>
        <div class="container" >
          <div class="row">
            <div class="col-lg-4" >
              <div class="pricing__single pricing__single-1">
                <div class="icon">
                  <i class="fad fa-user-graduate"></i>
                </div>
                <h4>BASIC</h4>
                <h3>৳ 200</h3>
                <h6>/ Month</h6>
                <div class="list">
                  <ul>
                    <li>Voice Assistence</li>
                    <li>Image Processing System</li>
                    <li>Object Detechtion</li>
                    <li class="not-included">No customer support</li>
                    <li class="not-included">Extra features</li>
                    <li class="not-included">In-app products</li>
                  </ul>
                </div>
                <?php
                     if(isset($_SESSION['login_user'])){
                      echo "<a class='button'>
                      <span
                        ></span>
                    </a>";
                   }else{
                    echo "<a href='#' class='button'>
                    <span data-bs-toggle='modal'
                    data-bs-target='#login_join'
                      >GET STARTED <i class='fad fa-long-arrow-right'></i
                    ></span>
                  </a>";
                   }
                ?>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="pricing__single pricing__single-2">
                <div class="icon">
                  <i class="fad fa-user-cowboy"></i>
                </div>
                <h4>STANDARD</h4>
                <h3>৳ 500</h3>
                <h6>/ Month</h6>
                <div class="list">
                  <ul>
                  <li>Voice Assistence</li>
                    <li>Image Processing System</li>
                    <li>Object Detechtion</li>
                    <li>No customer support</li>
                    <li class="not-included">Extra features</li>
                    <li class="not-included">In-app products</li>
                  </ul>
                </div>
                <?php
                     if(isset($_SESSION['login_user'])){
                      echo "<a class='button'>
                      <span
                        ></span>
                    </a>";
                   }else{
                    echo "<a href='#' class='button'>
                    <span data-bs-toggle='modal'
                    data-bs-target='#login_join'
                      >GET STARTED <i class='fad fa-long-arrow-right'></i
                    ></span>
                  </a>";
                   }
                ?>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="pricing__single pricing__single-3">
                <div class="icon">
                  <i class="fad fa-user-astronaut"></i>
                </div>
                <h4>PREMIUM</h4>
                <h3>৳ 1000</h3>
                <h6>/ Month</h6>
                <div class="list">
                  <ul>
                  <li>Voice Assistence</li>
                    <li>Image Processing System</li>
                    <li>Object Detechtion</li>
                    <li>No customer support</li>
                    <li>Extra features</li>
                    <li>In-app products</li>
                  </ul>
                </div>
                <?php
                     if(isset($_SESSION['login_user'])){
                      echo "<a class='button'>
                      <span
                        ></span>
                    </a>";
                   }else{
                    echo "<a href='#' class='button'>
                    <span data-bs-toggle='modal'
                    data-bs-target='#login_join'
                      >GET STARTED <i class='fad fa-long-arrow-right'></i
                    ></span>
                  </a>";
                   }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--pricing section end-->

    <!--screenshot section start-->
    <section class="screenshot" id="preview">
      <div class="screenshot__wrapper">
        <div class="container">
          <div class="screenshot__info">
            <h2 class="section-heading color-black">
              Have a look at what’s inside the Robo.
            </h2>
            <div class="screenshot-nav">
              <div class="screenshot-nav-prev">
                <i class="fad fa-long-arrow-left"></i>
              </div>
              <div class="screenshot-nav-next">
                <i class="fad fa-long-arrow-right"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-container screenshot-slider">
          <div class="swiper-wrapper">
            <div class="swiper-slide screenshot-slide">
              <img src="assets/images/phone-01.png" alt="image" />
            </div>
            <div class="swiper-slide screenshot-slide">
              <img src="assets/images/phone-01.png" alt="image" />
            </div>
            <div class="swiper-slide screenshot-slide">
              <img src="assets/images/phone-01.png" alt="image" />
            </div>
            <div class="swiper-slide screenshot-slide">
              <img src="assets/images/phone-01.png" alt="image" />
            </div>
            <div class="swiper-slide screenshot-slide">
              <img src="assets/images/phone-01.png" alt="image" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--screenshot section end-->

    <!--related blog section start-->
    <section class="related-blog blog">
      <div class="related-blog__wrapper">
        <h2 class="section-heading color-black">
          Read latest news from our blog.
        </h2>
        <div class="blog__content">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <a href="blog-single.html">
                  <div class="blog__single blog__single--1">
                    <div class="blog__single-image">
                      <img src="assets/images/blog-img-1.png" alt="image" />
                    </div>
                    <div class="blog__single-info">
                      <h3>Lorem ipsum, dolor sit amet consectetur adipisicing.</h3>
                      <h4>
                        12 <i class="fad fa-comment"></i><span>|</span>Dec 17,
                        2020
                      </h4>
                      <p class="paragraph dark">
                        Lorem ipsum dolor sit amet consectetur adipisicing.
                      </p>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-8">
                <a href="blog-single.html">
                  <div class="blog__single blog__single--2">
                    <div class="blog__single-image">
                      <img src="assets/images/blog-img-2.png" alt="image" />
                    </div>
                    <div class="blog__single-info">
                      <h3>Lorem ipsum dolor sit amet consectetur..</h3>
                      <h4>
                        12 <i class="fad fa-comment"></i><span>|</span>Dec 17,
                        2020
                      </h4>
                      <p class="paragraph dark">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi.
                      </p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <a href="blog.html" class="button">
          <span>GO TO BLOG <i class="fad fa-long-arrow-right"></i></span>
        </a>
      </div>
    </section>
    <!--related blog section end-->

    <!--newsletter section start-->
    <section class="newsletter">
      <div class="newsletter__wrapper">
        <div class="container">
          <div class="row align-items-lg-center">
            <div class="col-lg-6">
              <div class="newsletter__info">
                <h2 class="section-heading color-black">
                  Subscribe to our newsletter.
                </h2>
                <form class="newsletter__info--field">
                  <input
                    type="text"
                    placeholder="Email address"
                    class="input-field"
                  />
                  <button class="button">
                    <span
                      >SUBSCRIBE <i class="fad fa-long-arrow-right"></i
                    ></span>
                  </button>
                </form>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="newsletter__img">
                <img src="assets/images/newsletter-img.png" alt="image" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--newsletter section end-->

    <!--footer start-->
    <footer class="footer">
      <div class="footer__wrapper">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="footer__info">
                <div class="footer__info--logo">
                  <img src="assets/images/logo.png" alt="SANZI" />
                </div>
                <div class="footer__info--content">
                  <p class="paragraph dark">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae provident distinctio libero.
                  </p>
                  <div class="social">
                    <ul>
                      <li class="facebook">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                      </li>
                      <li class="twitter">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                      </li>
                      <li class="linkedin">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                      </li>
                      <li class="youtube">
                        <a href="#"><i class="fab fa-youtube"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="footer__content-wrapper">
                <div class="footer__list">
                  <ul>
                    <li>Explore</li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Our Team</a></li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">How It Works</a></li>
                  </ul>
                </div>
                <div class="footer__list">
                  <ul>
                    <li>Help</li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Contact</a></li>
                  </ul>
                </div>
                <div class="download-buttons">
                  <h5>Download</h5>
                  <a href="#" class="google-play">
                    <i class="fab fa-google-play"></i>
                    <div class="button-content">
                      <h6>GET IT ON <span>Google Play</span></h6>
                    </div>
                  </a>
                  <a href="#" class="apple-store">
                    <i class="fab fa-apple"></i>
                    <div class="button-content">
                      <h6>GET IT ON <span>Apple Store</span></h6>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="footer__copy">
              <h6>&copy; Team ZUDO</h6>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!--footer end-->

    <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
    <script src="assets/js/particles.js"></script>
    <script>
      $(window).on("load", function () {
        $("body").addClass("loaded");
      });
      particlesJS.load("particles-js","assets/js/particlesjs-config.json",function () {
          console.log("callback - particles.js config loaded");
        }
      );
      document.querySelector('.img__btn').addEventListener('click', function() {
                document.querySelector('.cont').classList.toggle('s--signup');
            });
        
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
