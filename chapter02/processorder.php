<!DOCTYPE html>
<?php
  //create short variable names
  $tireqty = $_POST['tireqty'];
  $oilqty = $_POST['oilqty'];
  $sparkqty = $_POST['sparkqty'];
  $address = $_POST['address'];
  $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
  $date = date('H:i, jS F Y');
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bob`s Auto Parts- Order Results</title>
  </head>
  <body>
    <h1>Bob`s Auto Parts</h1>
    <h2>Order Results</h2>
    <?php
      echo "<p>Order processed at " .date('H:i, jS F Y')."</p>";

      echo "<p>Your orde is as follows:</p>";

      $totalqty = 0;
      $totalqty = $tireqty + $oilqty + $sparkqty;
      echo "Items order: $totalqty <br />";

      if ($totalqty == 0) {
        echo "You did not order anything on the previous page!";
      }else {
        if($tireqty > 0){
          echo $tireqty." tires<br />";
        }
        if($oilqty > 0){
          echo $oilqty." bottles of oil<br />";
        }
        if($sparkqty > 0){
          echo $sparkqty." spark plugs<br />";
        }

      }
      $totalmount = 0.00;

      define('TIREPRICE', 100);
      define('OILPRICE', 10);
      define('SPARKPRICE', 4);

      $totalmount = $tireqty * TIREPRICE
                  + $oilqty * OILPRICE
                  + $sparkqty * SPARKPRICE;
      $totalmount = number_format($totalmount,2,'.',' ');
      echo "<p>Total of order is $".$totalmount."</p>";
      echo "<p>Address to ship to is ".$address."</p>";

      $outputstring = $date."\t".$tireqty." tires \t".$oilqty." oil\t".$sparkqty." spark plugs\t\$".$totalmount."\t".$address."\n";
      //open file for appending
      @ $fp = fopen("$DOCUMENT_ROOT/phpmysql4e/chapter02/orders/orders.txt",'ab');

      flock($fp,LOCK_EX);

      if (!$fp) {
        echo "<p><strong>Your order could not be processed at this time.Pleast try again later.</strong></p></body></html>";
        exit;
      }
      fwrite($fp,$outputstring,strlen($outputstring));
      flock($fp,LOCK_UN);
      fclose($fp);

      echo "<p>Order written.</o>";
    ?>
  </body>
</html>
