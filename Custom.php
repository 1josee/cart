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



echo '<pre>';
print_r($products);
echo '</pre>';


?>

<form method="get" action="Custom.php">
Min Price <input type="number" name="min_price"><br>
Max Price <input type="number" name="max_price"><br>
Name <input type="text" name="name"><br>
 <input type="submit" name="act" value="Filter">
</form>