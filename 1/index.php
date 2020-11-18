<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php
    $url = "https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json";
    $response = file_get_contents($url);
    $result = json_decode($response);
    ?>
    <div class="container">
    <?php
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
    ?>
    </div>
</body>
</html>