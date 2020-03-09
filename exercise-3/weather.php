<!DOCTYPE html>
<html>
<head>
	<title>API Showcase</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
	<?php
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$query = array(
			"APPID" => 'e1a2e274a67726aeb7209d1dbf0187ab',
			"q" => $_POST['city']
		);

		curl_setopt($curl, CURLOPT_URL, "http://api.openweathermap.org/data/2.5/forecast"."?".http_build_query($query));

    $film_search = json_decode(curl_exec($curl));
		$film_list = $film_search->list;
    
    $count = 0;
    echo '<div class="container">
          <h3>Current city:'.$_POST['city'].
          '&nbsp;&nbsp;<b style="color:#E96E50;font-size:16px; text-decoration:underline">
           <a href="./filmsearch.php">Return</a></b></h3>
 			    <div class="row">';
    foreach ($film_list as $value) {
      if ($count == 4){
        echo "</div><br/><br/><div class='row'>";
        $count = 0;
      }
      switch($value->weather[0]->main) {
        case "Rain":
          $icon= "xiayu.png";
        break;
        case "Clouds":
          $icon= "duoyun.png";
        break;
        case "Clear":
          $icon= "qing.png";
        break;
      }
     
      echo "<div class='col-12 col-md-3'>".$value->dt_txt.
      "<div><img src='./images/".$icon.
      "' style='width:30px;height:30px;'></img></div>"."<p>temp:<b style='background:#E96E50;color:white;border-radius:3px;'>".
      ($value->main->temp-273)."℃</b></p></div>";
      $count = $count+1;
    }

    echo "</div>";
    //case//
		// $count = 0;
		// echo '<div class="container">
		// 		<div class="row">';
		// 			foreach ($film_search->list as $film){
		// 				if ($count == 2){
		// 					echo "</div><div class='row'>";
		// 					$count = 0;
		// 				}
		// 				echo "<div class='col-12 col-md-6'>
		// 				<h3>".$film->display_title."</h3>";
		// 				if (empty($film->multimedia->src) == false){
		// 					echo "<img src='".$film->multimedia->src."'";

		// 				}
		// 				echo "<br><h4>".$film->headline."</h4><br>
		// 				<p>".$film->summary_short."</p></br>
		// 				<a href='".$film->link->url."'>Review</a>
		// 				</div>";
		// 				$count = $count+1;
		// 			}
		// 			echo "</div>";
	?>
</body>
</html>