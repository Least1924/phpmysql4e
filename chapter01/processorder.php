<!DOCTYPE html>
<?php
  //create short variable names
  $tireqty = $_POST['tireqty'];
  $oilqty = $_POST['oilqty'];
  $sparkqty = $_POST['sparkqty'];
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bob`s Auto Parts - Order Results</title>
  </head>
  <body>
    <h1>Bob`s Auto Parts</h1>
    <h2>Order Results</h2>
    <?php
      echo "<p>Order processed at " .date('H:i, jS F Y')."</p>";

      $totalqty = 0;
      $totalqty = $tireqty + $oilqty + $sparkqty;
      echo "Items order: $totalqty <br />";
      $totalmount = 0.00;

      define('TIREPRICE', 100);
      define('OILPRICE', 10);
      define('SPARKPRICE', 4);

      $totalmount = $tireqty * TIREPRICE
                  + $oilqty * OILPRICE
                  + $sparkqty * SPARKPRICE;
      echo "Subtotal:$" .number_format($totalmount,2)."<br />";
      $taxrate = 0.10; //local sales tax is 10%
      $totalmount = $totalmount * (1 + $taxrate);
      echo "Total including tax:$" .number_format($totalmount,2)."<br />";
    ?>
  </body>
</html>
