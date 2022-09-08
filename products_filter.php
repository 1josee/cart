
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/Icon/Font Awesome/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="Customer.css">
    <title>Customer Page</title>
</head>
<body onload="showSlides()">

    <section id="navbar">
        <nav>
            <ul>
                <a href=""><li>SAVE MORE ON APP</li></a>
                <a href=""><li>SELL ON LAZADA</li></a>
                <a href=""><li>CUSTOMER CARE</li></a>
                <a href=""><li>TRACK MY ORDER</li></a>
                <a href=""><li>LOGIN</li></a>
                <a href=""><li>SIGNUP</li></a>
                <a href=""><li>LANGUAGE</li></a>
            </ul>
            <ul id="search_Bar_Container">
                <img src="./assets/Picture/CustomerPage/Logo.jpg" alt="" style="width:80px" >
                <form method="get" action="products_filter.php">
                Name <input type="text" name="name"><br>
                <input type="submit" name="act" value="Filter" >
                </form>
                <button id="searchBtn">
                    <form action=""></form>
                    <i class="fas fa-search"></i>
                </button>
            </ul>
        </nav>
    </section>

    <section id="customer-page">
        <div class="maincontent">
            <div class="filerSection sectionMargin">
                <?php
                $file_name = "PRODUCT.csv";

                $fp = fopen($file_name,'r');
                // 
                $first = fgetcsv($fp, 1000,",");
                $products= [];

                while($row = fgetcsv($fp, 1000,",")) {
                    // $i =0;
                    // $product =[];
                    // foreach ($first as $col_name) {
                    //     $product[$col_name] = $row[$i];

                    //     if($col_name == 'id'){
                    //         $product[$col_name] == explode(',',$product[$col_name]);
                    //     }
                    //     $i++;
                    // }
                    $product =[];
                    $product = $row;
                    if(isset($_GET['min_price']) && is_numeric($_GET['min_price'])) {
                        if ($product['2'] < $_GET['min_price']) {
                            continue;  
                        }
                    } 

                    if(isset($_GET['max_price']) && is_numeric($_GET['max_price'])) {
                        if($product['2'] > $_GET['max_price']) {
                        continue;  
                        }
                    } 

                    if(isset($_GET['name']) && !empty($_GET['name'])) {
                        if(strpos($product['1'], $_GET['name']) ===false) {
                        continue;  
                        }
                    }
                    $products[] = $product;
                }
                ?>
                <div class="productFilterSection sectionMargin">
                <div class="JFY_Container">
                    <?php
                        // Loop through the csv array
                        foreach ($products as $rec){?>
                            <div class="JFY_Item_Box Item_box EA_Counter">
                                <div class="JFY_item">
                                    <a href=""><img class="img_img" src=<?=$rec[5] ?> alt="#">
                                        <p id="Item_Name"><?=$rec[3] ?></p>
                                        <p id="salesBanner">85% off</p>
                                        <p id="OG_Price"><?=$rec[2]*1000 ?></p>
                                        <p id="Dis_Price">₫15000</p>                    
                                    </a>
                                </div>
                            </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="col">
            <h4>Follow Us</h4>
            <div class="icon">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-pinterest"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="#"> About Us</a>
            <a href="#"> Delivery Informations</a>
            <a href="#"> Privacy Policy</a>
            <a href="#"> Terms & Conditions</a>
            <a href="#"> Contact Us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="#"> Sign In</a>
            <a href="#"> View Cart</a>
            <a href="#"> My Wishlist</a>
            <a href="#"> Track My Order</a>
            <a href="#"> Help</a>
        </div>

        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store or Google Play</p>
            <div class="row">
                <img src="./assets/Picture/CustomerPage/pay/app.jpg" alt="">
                <img src="./assets/Picture/CustomerPage/pay/play.jpg" alt="">
            </div>
            <p>Secured Payment Gateway</p>
            <img src="./assets/Picture/CustomerPage/pay/pay.png" alt="">
        </div>

        <div class="copyright">
            <p>@2022 - GROUP 19 FULL STACK </p>
        </div>
    </footer>
    <script src="main.js"></script>
</body>
</html>