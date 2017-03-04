<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table>
      <tr>
        <td bgcolor="#CCCCCC" align="center">Distace</td>
        <td bgcolor="#CCCCCC" align="centet">Cost</td>
      </tr>
      <?php
        $distance = 50;
        while ($distance <= 250) {
          # code...
          echo "<tr>
                  <td align=\"right\">".$distance."</td>
                  <td align=\"right\">".($distance/10)."</td>
                </tr>\n";
          $distance += 50;
        }
       ?>
    </table>
  </body>
</html>
