<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Calculator</title>
  </head>
  <body>
    <div class="container">
      <form style="padding: 25px">
          <div class="form-group">
            <label for="numberX">Number 1</label>
            <input type="text" class="form-control" id="numberX" name="numberX">
          </div>
          <div class="form-group">
            <label for="numberY">Number 2</label>
            <input type="text" class="form-control" id="numberY" name="numberY">
          </div>
          <button type="submit" class="btn btn-primary" name="submit" value="submit">Sum</button>
      </form>
    </div>
    <div class="container">
        <?php
          if(isset($_GET['submit']))
          {
            $numX = $_GET['numberX'];
            $numY = $_GET['numberY'];

            if(preg_match('/^-?[0-9]/', $numX) && preg_match('/^-?[0-9]/', $numY))
            {
              $result = bcadd($numX, $numY);
              echo "<div class=\"alert alert-primary\" role=\"alert\">$result</div><br>";
            }
            else
            {
              echo "<div class=\"alert alert-danger\" role=\"alert\">Wrong input!</div><br>";
            }
          }
        ?>
    </div>
  </body>
</html>