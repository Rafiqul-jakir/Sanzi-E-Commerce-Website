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
      // $active = $row['Name'];
      $count = mysqli_num_rows($result);
      
      // If result matched $myuseremail and $mypassword, table row must be 1 row
		
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
    <link rel="stylesheet" href="assets/css/login_signup.css">
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/custom.css" />
    <link rel="stylesheet" href="assets/css/login_signup.css">
    <link rel="stylesheet" href="assets/css/product-page.css">
    <style>
        .buy_now_button,.add_to_cart_button{
            width: 100% !important;
            display: block !important;
            padding: 10px 17px;
            border:none;
            border-radius: 4px;
            font-size: 15px;
            color: #fff;
        }
        .buy_now_button{
            background-color: #F700B4;
            transition: 0.3s;
            text-align: center;
        }
        .buy_now_button:hover{
            background-color: #c90695;
            color: #fff;
            text-align: center;
        }
        .add_to_cart_button{
            background-color: #9900F9;
            transition: 0.3s;
            text-align: center;
        }
        .add_to_cart_button:hover{
            background-color: #6a03aa;;
            color: #fff;
            text-align: center;
        }
        .description{
          width: 100%;
          
          border-radius: 8px;
          padding: 15px;
        }
        .description p{
          font-size: 18px;
        }
    </style>
  </head>

  <body>


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
              <li><a href="index.php">Home</a></li>
              <li><a href="index.php#feedback">Feedbacks</a></li>
              <li><a href="index.php#faq">FAQs</a></li>
              <li><a href="index.php#pricing">Pricing</a></li>
              <li><a class="menu-active" href="#">Products</a></li>
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

    <!--Product section start-->
    <?php
        $Product_title = $_GET['product_title'];
        $All_Product_Query = "SELECT * FROM `all_products` WHERE Product_title = '$Product_title'";
        $All_Product_Data = mysqli_query($db,$All_Product_Query);
        $all_product_row = mysqli_fetch_array($All_Product_Data)
    ?>

    <section class="hero">
      <div class="hero__wrapper">
        <div class="container">

          <div class="row ">
            <div class="col-lg-6 mb-5">
                <img class="card-img-top" src="<?php echo $all_product_row['image']; ?>" alt="Product image">
            </div>
            <div class="col-lg-6 mb-5">
                <h2 class="section-heading color-black " style="font-size: 26px">
                <?php echo $all_product_row['Product_title']; ?>
                </h2>
                <form action="abc.php">
                   <div class="row">
                    <div class="col-md-3">
                      <p class="card-text" style="font-size: 23px; margin-top:28px;">
                        ৳ <?php echo $all_product_row['Product_Price']; ?>
                      </p>
                    </div>
              
                          <div class="col-md-4 card-text" style="font-size: 20px; margin-top:28px;">
                          <level for="number" class="level">Quantiry</level>
                            <select name="quantity_select" id="" style="padding-left: 10px;">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option></option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select>
                          </div>
                        </div>
                      <div class="row mt-5">
                          <div class="col-md-3">
                            
                          <?php
                          if(isset($_SESSION['login_user'])){
                            echo "<a type='submit' href='checkout.php?product_title=$all_product_row[Product_title]'' class='buy_now_button mb-3'>Buy Now</a>";
                        }else{
                          echo "<a href='#pricing'
                          data-bs-toggle='modal'
                          data-bs-target='#login_join'
                          class='buy_now_button mb-3'>
                          Buy Now
                        </a>";
                        }
                      ?>
                
                      </div>
                 
                    <div class="col-md-3 ">
                    <?php
                     if(isset($_SESSION['login_user'])){
                      echo "<button type='submit' class='add_to_cart_button'>Add to Cart</button>";

                   }
                   else{
                    echo "<a href='#pricing'
                    data-bs-toggle='modal'
                    data-bs-target='#login_join'
                    class='add_to_cart_button' >
                    Add to Cart
                  </a>";
                   }
                ?>
                    </div>
                </div>
                  </form>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 ">
                   <div class="description">
                      <h2>Product Details</h2>
                      <p>
                      <?php echo $all_product_row['Product_description']; ?>
                      </p>
                   </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Product section end-->


 
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
