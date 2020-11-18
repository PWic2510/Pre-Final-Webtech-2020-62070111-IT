<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    .card{
      display: inline-block;
    }
  </style>
</head>

<body>
  <?php
    $url = "https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json";
    $response = file_get_contents($url);
    $result = json_decode($response);
    ?>

  <div class="container">
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="">ระบุคำค้นหา :</label><br>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="place" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" name="but1">ค้นหา</button>
          </div>
        </div>

      </form><br>
      

      <?php 
      if(isset($_POST['but1'])) {
        $name = $_POST['place'];
        $found = 0;
        $same = 1;
        $arrayfound = array();
        for ($i=0; $i < 6 ; $i+= 1) { 
          
            if((!strcmp(strtolower($result -> tracks -> items[$i] -> album -> name), strtolower($name)) || strstr(strtolower($result -> tracks -> items[$i] -> album -> name), strtolower($name))) && $same ){
              $arrayfound[] = $i;
            
                $found += 1;
                $same = 0;
            }
            if((!strcmp(strtolower($result -> tracks -> items[$i] -> album -> artists[0] -> name), strtolower($name)) || strstr(strtolower($result -> tracks -> items[$i] -> album -> artists[0] -> name), strtolower($name))) && $same ){
              $arrayfound[] = $i;
            
                $found += 1;
                $same = 0;
            }
            $same = 1;
        }
        if($found == 0){
            echo "not found";
        }else{
          $number = 0;
          foreach($arrayfound as $i){
            if($number % 3 == 0 ){
              echo "<div class=row>";
            }
            echo "<div class='col-4'>";
            echo '<div class="card" style="width: 18rem;">';
            echo '<img class="card-img-top" src="'.$result -> tracks -> items[$i] -> album -> images[0] -> url.'" alt="Card image cap">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">'.$result -> tracks -> items[$i] -> album -> name.'</h5>';
            echo '<div class="card-text">Artists : '.$result -> tracks -> items[$i] -> album -> artists[0] -> name.'</div>';
            echo '<div class="card-text">Release date : '.$result -> tracks -> items[$i] -> album -> release_date .'</div>';
            echo '<div class="card-text">Avaliable : '.count($result -> tracks -> items[$i] -> album -> available_markets) .' countries </div>';
            echo '</div>';
            echo '</div>';
            echo "</div>";
            $number += 1;
            if($number % 3 == 0 ){
              echo "</div>";
            }
            
          }
          if(!($number % 3 == 0 )){
            echo "</div>";
          }
        }
  }else{
    for ($i=0; $i < 6 ; $i+= 3) { 
      echo '<div class="row">';

      echo '<div class="col-4">';
      echo '<div class="card" style="width: 18rem;">';
      echo '<img class="card-img-top" src="'.$result -> tracks -> items[$i] -> album -> images[0] -> url.'" alt="Card image cap">';
      echo '<div class="card-body">';
      echo '<h5 class="card-title">'.$result -> tracks -> items[$i] -> album -> name.'</h5>';
      echo '<div class="card-text">Artists : '.$result -> tracks -> items[$i] -> album -> artists[0] -> name.'</div>';
      echo '<div class="card-text">Release date : '.$result -> tracks -> items[$i] -> album -> release_date .'</div>';
      echo '<div class="card-text">Avaliable : '.count($result -> tracks -> items[$i] -> album -> available_markets) .' countries </div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';

      echo '<div class="col-4">';
      echo '<div class="card" style="width: 18rem;">';
      echo '<img class="card-img-top" src="'.$result -> tracks -> items[$i+1] -> album -> images[0] -> url.'" alt="Card image cap">';
      echo '<div class="card-body">';
      echo '<h5 class="card-title">'.$result -> tracks -> items[$i+1] -> album -> name.'</h5>';
      echo '<div class="card-text">Artists : '.$result -> tracks -> items[$i+1] -> album -> artists[0] -> name.'</div>';
      echo '<div class="card-text">Release date : '.$result -> tracks -> items[$i+1] -> album -> release_date .'</div>';
      echo '<div class="card-text">Avaliable : '.count($result -> tracks -> items[$i+1] -> album -> available_markets) .' countries </div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';

      echo '<div class="col-4">';
      echo '<div class="card" style="width: 18rem;">';
      echo '<img class="card-img-top" src="'.$result -> tracks -> items[$i+2] -> album -> images[0] -> url.'" alt="Card image cap">';
      echo '<div class="card-body">';
      echo '<h5 class="card-title">'.$result -> tracks -> items[$i+2] -> album -> name.'</h5>';
      echo '<div class="card-text">Artists : '.$result -> tracks -> items[$i+2] -> album -> artists[0] -> name.'</div>';
      echo '<div class="card-text">Release date : '.$result -> tracks -> items[$i+2] -> album -> release_date .'</div>';
      echo '<div class="card-text">Avaliable : '.count($result -> tracks -> items[$i+2] -> album -> available_markets) .' countries </div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';

      
      
      
      
      echo '</div>';
  }

  }
    ?>

    </div>
</body>

</html>