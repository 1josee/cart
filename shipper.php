<?php
    session_start();
    require_once('shipper_function.php');
    // Set Variables for featured products
    $featuredProductsNames = array();
    $featuredProducts = readFeaturedProducts();
    $featuredProductsCount = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shipper.css">
    <title>Document</title>
</head>
<body>
<form action='' method='post'>
    <table class="orders">
        <tr>
            <th>ID</th>
            <th>Products</th>
            <th>Status</th>
        </tr>
        <?php

            foreach ($featuredProducts as $featuredProduct) {
                $id = $featuredProduct['id'];
                $products = $featuredProduct['products'];
            echo "
                
                <tr>
                    <th>$id</th>
                    <th>$products</th>
                    <th><select name='status[]'>
                        <option value='Active' selected='selected'>Active</option>
                        <option value='Ordered'>Ordered</option>
                        <option value='Dilivered'>Dilivered</option>
                    </select>
                    </th>
                </tr>
                
                ";
                $featuredProductsCount++;
                if ($featuredProductsCount == 15) {
                    break;
                }         
            }
            ?>
    
    </table>
    <button class="form_button" type="submit" name="submit" >Log in</button>
</form>
<?php
 print_r($_POST['status']);
?>
</body>
</html>