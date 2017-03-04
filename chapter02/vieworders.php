<?php
    //create short variable name
    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bob`s Auto Parts - Customer Order</title>
  </head>
  <body>
    <h1>Bob`s Auto Parts</h1>
    <h2>Customer Orde</h2>
    <?php
      @$fp = fopen("$DOCUMENT_ROOT/phpmysql4e/chapter02/orders/orders.txt",'rb');

      if (!$fp) {
        echo "<p><strong>No orders pending. Please try again later.</strong></p>";
        exit;
      }

      while (!feof($fp)) {
        $order = fgets($fp,999);
        echo $order."<br />";
      }
     ?>
  </body>
</html>
