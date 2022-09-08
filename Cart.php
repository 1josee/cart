<?php
        if(isset($_POST['checkout'])) {
        $products = $_POST['product_name'];
        $products_str = implode(" ",$products) ;
        $price = "555";
        $name = "Tien";
        $address = "99 ooooo";
        $file_open = fopen("order2.csv","a");
        $no_rows = count(file("order2.csv"));
        if($no_rows > 1){
            $no_rows = ($no_rows - 1) + 1;
        }
        $form_data = array(
            'sr_no'  => $no_rows,
            'products' => $products_str,
            'total' => $price,
            'name'=> $name,
            'address' => $address,
            'created_time' => date('Y-m-d h:i:s')
        );
        fputcsv($file_open, $form_data);
        fclose($file_open);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Cart.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./assets/Icon/Font Awesome/fontawesome-free-6.1.1-web/css/all.css">
    <title>Shop</title>
</head>
<body>
   
    <form action="cart.php" method="post">
    <section id="cart" class="sectionMargin">
        <table width="100%" class="dataTable">
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                </tr>
            </thead>
            <tbody class="table-body">
            </tbody>
        </table>
    </section>

    <section id="cart-add" class="section-p1">
        <div id="coupon">
         
        </div>

        <div id="subtotal">
            <h3>Cart Totals</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td class="table-subtotal">$ 0</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td class="Last-Total"><Strong>$0</Strong></td>
                </tr>
            </table>
            <button class="normal" id="checkoutBtn" name="checkout" type="submit">Proceed to checkout</button>
        </div>
    </section>
    </form>
    <script src="cart.js" async></script>
    <script>
        const dataTable = document.getElementById("dataTable");
        const btnExportToCsv = document.getElementById("checkoutBtn");

        btnExportToCsv.addEventListener("click", () => {
            const exporter = new TableCSVExporter(dataTable);
            const csvOutput = exporter.convertToCSV();
            const csvBlob = new Blob([csvOutput], { type: "text/csv" });
            const blobUrl = URL.createObjectURL(csvBlob);
            const anchorElement = document.createElement("a");

            anchorElement.href = blobUrl;
            anchorElement.download = "table-export.csv";
            anchorElement.click();

            setTimeout(() => {
                URL.revokeObjectURL(blobUrl);
            }, 500);
        });
    </script>
</body>
</html>