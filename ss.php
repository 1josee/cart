<?php
            $file = fopen("PRODUCT.csv","r");

            $data = fgetcsv($file, 1000,",");

            $all_data = [];

            while( ($data = fgetcsv($file, 1000,",")) !==FALSE  )
            {
                $all_data[] = $data;
            }echo '<pre>';
            print_r($all_data);
            echo '</pre>';
            fclose($file);
?>