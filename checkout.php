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
    <title>CheckOut</title>

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
      .checkout_input input{
        width: 100%;
        padding: 5px 10px;
        font-size: 16px;
        border-radius: 8px;
        border: 1px solid #000;
        margin-bottom: 10px;
        background-color: #F0F7FC;
      }
      .Place-order_button{
        width:40% !important;
        background-color: rgb(8, 102, 8) !important;
        transition: 0.3s ease !important;
        color: #fff !important;
        border: none !important;
      }
      .Place-order_button:hover{
        background-color: rgb(4, 82, 4) !important;
      }
    </style>
  </head>

  <body>

  <?php
        $Product_title = $_GET['product_title'];
        $All_Product_Query = "SELECT * FROM `all_products` WHERE Product_title = '$Product_title'";
        $All_Product_Data = mysqli_query($db,$All_Product_Query);
        $all_product_row = mysqli_fetch_array($All_Product_Data);
    ?>

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

    <!--Product section start-->
    <?php
        $All_Product_Query = "SELECT * FROM `all_products` ORDER BY Product_ID ASC";
        $All_Product_Data = mysqli_query($db,$All_Product_Query);
    ?>

    <section class="hero">
      <div class="hero__wrapper">
        <div class="container">
            <div class="row">
              <div class="col-md-12 text-center">
                <h2>Checkout</h2>
              </div>
            </div>
            <div class="row ">
              <div class="col-md-12 bg-dark mb-4"></div>
            </div>
            <div class="row">
              <div class="col-md-7 ">
                   <h2 class="mb-4">Delevery Information</h2>
                   <form action="" class="checkout_input">
                   <div class="row">
                      <div class="col-md-6">
                            <input type="text" name="" id="" placeholder="First Name">
                            <input type="text" name="" id="" placeholder="Area">
                            <input type="text" name="" id="" placeholder="Zilla">
                      </div>
                      <div class="col-md-6">
                          <input type="text" name="" id="" placeholder="Last Name">
                          <input type="text" name="" id="" placeholder="Upozilla">
                          <input type="text" name="" id="" placeholder="Mobile Number"> 
                      </div>
                   </div>
                  <div class="row">
                    <div class="col-md-12">
                        <h2 class="mb-4">Payment Information</h2>
                        <input type="text" name="" id="" placeholder="Payment Method">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="" id="" placeholder="Phone Number">
                        <input type="submit" value="Place Order" class="Place-order_button">
                    </div>
                    <div class="col-md-6">
                    <input type="text" name="" id="" placeholder="Transaction ID">
                    </div>
                  </div>
                   </form>
              </div>
              <div class="col-md-5  p-5">
                   <h3>1 Item</h3>
                   <div class="row">
                    <div class="col-md-12 bg-dark"></div>
                   </div>
                   <div class="row mt-4">
                      <div class="col-md-4 ">
                            <img src="<?php echo $all_product_row['image']; ?>" alt="curt-img" width="130" height="130">
                      </div>
                      <div class="col-md-8">
                         <h3><?php echo $Product_title ?></h3>
                         <h3 class="text-muted">৳ <?php echo $all_product_row['Product_Price']; ?></h3>
                         <h3 class="text-muted">Quantity: 1</h3>
                      </div>
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
