<?php
$conn = mysqli_connect("localhost", "root", "", "sanzi");
    session_start();
    if(isset($_SESSION['login_admin']) == FALSE){
        header("location: admin_login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/173a949cb2.css" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/admin.css">
    <style>
        .input_grp form input {
        border: 1px solid #888888;
        border-radius: 8px;
        margin: 10px;
        height: 37px;
        padding: 12px;
        display: block;
        }
        .input_grp form input[type="file"]{
            border: none !important;
            border-bottom: 1px solid;
            padding-left:0px;
            margin-bottom: 26px;
            margin-top:-5px;
        }
    .input_grp textarea{
        border: 1px solid #888888;
        border-radius: 8px;
        margin: 10px;
        padding: 12px;
    }
    .level{
        margin-top: 20px;
        padding: 12px;
    }
    .input_grp form input[type="submit"]{
        border: none;
        padding:10px 17px;
        background: #04aa6d;
        height: 45px;
        margin-top: 20px;
        color: #fff;
    }
    .input_grp form input[type="submit"]:hover{
        background: #038153;
    }

    </style>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <img src="assets/images/favicon.png" alt="abc" width="30px" height="30px"> <span class="nav_logo-name">SANZI's Admin</span> </a>
                <div class="nav_list">
                    <a href="#" class="nav_link active" onclick="DashboardFunction()">
                            <i class='bx bx-grid-alt nav_icon'></i> 
                            <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="#" class="nav_link" onclick= "myFunction('all_users')"> 
                        <i class="fas fa-users nav_icon"></i> 
                        <span class="nav_name">All Users</span>
                    </a> 
                    <a href="#" class="nav_link" onclick= "myFunction('approve_account')"> 
                        <i class="fa-regular fa-square-check"></i> 
                        <span class="nav_name">Approve Account</span>
                    </a> 
                    <a href="#" class="nav_link "  onclick = "myFunction('veiw_product')">
                        <i class="bx bx-cart-alt nav_icon"></i>
                        <span class="nav_name"> View Products</span> 
                    </a>
                    <a href="#" class="nav_link" onclick ="myFunction('pending_orders')"> 
                        <i class="fa-regular fa-clock nav_icon"></i>
                        <span class="nav_name">Pending Orders</span> 
                    </a>
                    <a href="#" class="nav_link" onclick ="myFunction('packeges')">
                        <i class="fas fa-th nav_icon"></i>
                        <span class="nav_name">Packeges</span>
                    </a>
                    <a href="#" class="nav_link" onclick ="myFunction('all_trans')">
                        <i class="fas fa-money-check-alt nav_icon"></i>
                        <span class="nav_name">All Transactions</span>
                    </a>
                    <a href="#" class="nav_link" onclick ="myFunction('profile')"> 
                        <i class="fas fa-user-circle nav_icon"></i>
                        <span class="nav_name">Profile</span> 
                    </a>
                    <a href="assets/php/logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">LogOut</span> </a>
                </div>
            </div> 
        </nav>
    </div>

    <!-- Dashboard Section Start----------------------- -->
    <div class="height-100 bg-light" id="dashboard">
        <div class="container-xl">
            <div class="row ">
                    <div class="col-md-3 float-left mt-5">
                    <div class="card box-shadow">
                    <div class="card-header text-lg-center" style="font-weight: bold">New Orders</div>
                    <div class="card-body text-center ">
                        <span style="font-size:23px;">2</span>
                    </div>
                    </div>
                </div>
                <div class="col-md-3 float-center mt-5 mx-auto">
                    <div class="card box-shadow">
                    <div class="card-header text-lg-center" style="font-weight: bold">Pending Orders</div>
                    <div class="card-body text-center ">
                        <span style="font-size:23px">5</span>
                    </div>
                    </div>
                </div>
                <div class="col-md-3 float-rigt mt-5 ">
                    <div class="card box-shadow">
                    <div class="card-header bold text-lg-center" style="font-weight: bold">Net InCome</div>
                    <div class="card-body text-center ">
                        <span style="font-size:23px;">$ 500</span>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard Section close----------------------- -->

    <!-- All Users Section Start----------------------- -->
    <?php
        $All_Users_Query = "SELECT * FROM `user_registration` ORDER BY ID ASC";
        $All_Users__Data = mysqli_query($conn,$All_Users_Query);
    ?>
    <div class="height-100 bg-light" id="all_users">
        <div class="container-xl">
        <div class="table-responsive">
                <table class="table table-striped table-hover">
                        <tr class="text-center">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Packege</th>
                        </tr>
                        <?php
            while($all_users_row = mysqli_fetch_array($All_Users__Data)){ ?>
                        <tr class="text-center">
                        <td>
                            <?php echo $all_users_row['Name']; ?>
                        </td>
                        <td>
                            <?php echo $all_users_row['Email']; ?>
                        </td>
                        <td>
                            <?php echo $all_users_row['Packege']; ?>
                        </td>
                        </tr>

                        <?php } ?>
                    </table>
            </div>
        </div>
    </div>
    <!-- All Users Section close----------------------- -->

    <!-- Account Approve Section Start----------------------- -->
    <?php
        $Account_Approve_Query = "SELECT * FROM `account_approve` ORDER BY ID ASC";
        $Account_Approve_Data = mysqli_query($conn,$Account_Approve_Query);
    ?>
    <div class="height-100 bg-light" id="approve_account">
        <div class="container-xl mt-5">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                        <tr class="text-center">
                        <th>Users ID</th>
                        <th>Email</th>
                        <th>Packege</th>
                        <th>Ammount</th>
                        <th>Phone Number</th>
                        <th>Transaction ID</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        </tr>
                        <?php
            while($all_users_row = mysqli_fetch_array($Account_Approve_Data)){ ?>
                        <tr class="text-center">
                        <td>
                            <?php echo $all_users_row['ID']; ?>
                        </td>
                        <td>
                            <?php echo $all_users_row['Email']; ?>
                        </td>
                        <td>
                            <?php echo $all_users_row['Packege']; ?>
                        </td>
                        <td>
                            <?php echo $all_users_row['Ammout']; ?>
                        </td>
                        <td>
                            <?php echo $all_users_row['Phone Number']; ?>
                        </td>
                        <td>
                            <?php echo $all_users_row['Transaction_ID']; ?>
                        </td>
                        <td>
                            <?php echo $all_users_row['Payment_method']; ?>
                        </td>
                        <td  class="approve_btn">
                            <?php echo "
                            <a href='assets/php/user_approve.php?user_id=$all_users_row[ID]'>Approve</a>"
                            ?>
                            </td>
                        </tr>

                        <?php } ?>
                    </table>
            </div>  
        </div>
    </div>
    <!-- Account Approve Section close----------------------- -->

    <!-- View Product Section Start----------------------- -->
    <?php
        $All_Product_Query = "SELECT * FROM `all_products` ORDER BY Product_ID ASC";
        $All_Product_Data = mysqli_query($conn,$All_Product_Query);
    ?>

    <div class=" bg-light" id="veiw_product">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-8 ">
                    <div class="row" style="margin-top: 20px;">
                    <?php
                    while($all_product_row = mysqli_fetch_array($All_Product_Data)){ ?>
                        <div class="col-md-4 mb-5">
                            <div class="card">
                        
                                <img class="card-img-top" src="<?php echo $all_product_row['image']; ?>" alt="Product image">
                                <div class="card-body">
                                <h5 class="card-title"><?php echo $all_product_row['Product_title']; ?></h5>
                                <p class="card-text">৳ <?php echo $all_product_row['Product_Price']; ?></p>
                                <p class="card-text" style="display: inline;">Quantity: <?php echo $all_product_row['Product_Quantity']; ?></p>
                                <p class="delete_btn" style="display: inline; float: right;">
                                <?php echo "
                                <a href='assets/php/product_delete.php?product_title=$all_product_row[Product_title]'>Delete</a>"
                                ?>
                                </p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="col-md-4 mb-5" style="position: fixed;right: 2px; float: right;">
                    <div class="card">
                        <div class="card-body">
                            <h2>Add New Product</h2>
                            <div class="input_grp">
                                <form action="product_upload.php"  method="post" enctype="multipart/form-data">
                                    <input type="text" name="Title" id="" placeholder="Title">
                                    <textarea name="Description" id="" cols="30" rows="5" placeholder="Description"></textarea>

                                    <input type="file" name="image" id="file" class="inputfile" />

                                    <input type="text" name="Price" id="" placeholder="price">

                                    <level for="number" class="level">Quantiry</level>
                                    <select name="quantity_select" id="number">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <input type="submit" value="Add product">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- View Product Section close----------------------- -->

    <!-- pending Orders Section Start----------------------- -->
    <div class="height-100 bg-light" id="pending_orders">
        <div class="container-xl">
            <p>pending Orders Section</p>
        </div>
    </div>
    <!-- pending Orders Section close----------------------- -->

    <!-- packeges Section Start----------------------- -->
    <div class="height-100 bg-light" id="packeges">
        <div class="container-xl">
            <p>packeges Section</p>
        </div>
    </div>
    <!-- packeges Section close----------------------- -->

    <!-- All Transaction Section Start----------------------- -->
    <div class="height-100 bg-light" id="all_trans">
        <div class="container-xl">
            <p>All Transaction Section</p>
        </div>
    </div>
    <!-- All Transaction Section close----------------------- -->

    <!-- profile Section Start----------------------- -->
    <div class="height-100 bg-light" id="profile">
        <div class="container-xl">
            <p>profile Section</p>
        </div>
    </div>
    <!-- profile Section close----------------------- -->
    



    <script src="assets/js/admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/173a949cb2.js" crossorigin="anonymous"></script>

    <script>
        
            var dashboard = document.getElementById("dashboard");
            var all_users = document.getElementById("all_users");
            var approve_account = document.getElementById("approve_account");
            var veiw_product = document.getElementById("veiw_product");
            var pending_orders = document.getElementById("pending_orders");
            var packeges = document.getElementById("packeges");
            var all_trans = document.getElementById("all_trans");
            var profile = document.getElementById("profile");
            all_users.style.display = "none";
            veiw_product.style.display = "none";
            pending_orders.style.display = "none";
            packeges.style.display = "none";
            all_trans.style.display = "none";
            profile.style.display = "none";
            approve_account.style.display = "none";

      function DashboardFunction() {
                    dashboard.style.display = "block";
                    all_users.style.display = "none";
                    veiw_product.style.display = "none";
                    pending_orders.style.display = "none";
                    packeges.style.display = "none";
                    all_trans.style.display = "none";
                    profile.style.display = "none";
                    approve_account.style.display = "none";
      }

                function myFunction(id_name) {
                    var div_id = document.getElementById(id_name);
                    if (div_id.style.display === "block") {
                        div_id.style.display = "none";
                        dashboard.style.display = "block";

                    } else {
                        div_id.style.display = "block";
                        dashboard.style.display = "none";
                        if(id_name == "profile"){
                            all_users.style.display = "none";
                            veiw_product.style.display = "none";
                            pending_orders.style.display = "none";
                            all_trans.style.display = "none";
                            packeges.style.display = "none";
                            approve_account.style.display = "none";
                        }
                        else if(id_name == "all_users"){
                            profile.style.display = "none";
                            veiw_product.style.display = "none";
                            pending_orders.style.display = "none";
                            all_trans.style.display = "none";
                            packeges.style.display = "none";
                            approve_account.style.display = "none";
                        }
                        else if(id_name == "veiw_product"){
                            profile.style.display = "none";
                            all_users.style.display = "none";
                            pending_orders.style.display = "none";
                            all_trans.style.display = "none";
                            packeges.style.display = "none";
                            approve_account.style.display = "none";
                        }
                        else if(id_name == "pending_orders"){
                            profile.style.display = "none";
                            all_users.style.display = "none";
                            veiw_product.style.display = "none";
                            all_trans.style.display = "none";
                            packeges.style.display = "none";
                            approve_account.style.display = "none";
                        }
                        else if(id_name == "all_trans"){
                            profile.style.display = "none";
                            all_users.style.display = "none";
                            veiw_product.style.display = "none";
                            pending_orders.style.display = "none";
                            packeges.style.display = "none";
                            approve_account.style.display = "none";
                        }
                        else if(id_name == "approve_account"){
                            profile.style.display = "none";
                            all_users.style.display = "none";
                            veiw_product.style.display = "none";
                            pending_orders.style.display = "none";
                            packeges.style.display = "none";
                            all_trans.style.display = "none";
                        }
                        else{
                            profile.style.display = "none";
                            all_users.style.display = "none";
                            veiw_product.style.display = "none";
                            pending_orders.style.display = "none";
                            all_trans.style.display = "none";
                            approve_account.style.display = "none";
                        }

                    }
                }
    </script>
</body>
</html>