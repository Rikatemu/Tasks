<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Matrix Generator</title>
  </head>
  <body>
    <div class="container">
      <form style="padding: 25px">
          <div class="form-group">
            <label for="inputSizeX">Size X</label>
            <input type="number" class="form-control" id="inputSizeX" min="2" max="20" name="inputSizeX">
          </div>
          <div class="form-group">
            <label for="inputSizeY">Size Y</label>
            <input type="number" class="form-control" id="inputSizeY" min="2" max="20" name="inputSizeY">
          </div>
          <button type="submit" class="btn btn-primary" name="submit" value="submit">Generate</button>
      </form>
    </div>
    <div class="container">
        <?php
          if(isset($_GET['submit']))
          {
            $sizeX = $_GET['inputSizeX'];
            $sizeY = $_GET['inputSizeY'];

            if($sizeX >= 2 && $sizeY >= 2 && $sizeX <= 20 && $sizeY <= 20) 
            {

              $arrayX = array();

              for($x = 0; $x < $sizeX; $x++) 
              {
                $arrayY = array();
                
                for($y = 0; $y < $sizeY; $y++) 
                {
                  $arrayY[] = random_int(0, 256);
                }

                $arrayX[] = $arrayY;
              }

              $min = null;
              $max = null;

              foreach($arrayX as $yArr)
              {
                $yMin = min($yArr);
                $yMax = max($yArr);

                if($yMin <= $min || $min == null)
                {
                  $min = $yMin;
                }

                if($yMax >= $max || $min == null)
                {
                  $max = $yMax;
                }
              }

              echo "<div class=\"alert alert-primary\" role=\"alert\">Min: $min | Max: $max</div><br>";

              echo "<table class=\"table\">";
              foreach($arrayX as $yArr)
              {
                echo "<tr>";
                foreach($yArr as $yVal)
                {
                  echo "<td>$yVal</td>";
                }
                echo "</tr>";
              }
              echo "</table>";
            }
          }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>