<?php
	$imgname = $_GET['film']; 
	require_once 'connection.php';

	//OMDB Query
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$query = array(
		"apikey" => 'df1323af',
		"t" => $imgname,
		"plot" => 'full'
	);
	curl_setopt($curl, CURLOPT_URL, "http://www.omdbapi.com/"."?".http_build_query($query));
	$film = json_decode(curl_exec($curl));
	$sql2 = "SELECT * FROM animation WHERE imgname = '".$imgname."'";
	?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<style>
    body{
      background: #E3E2DD;
    }

    .container {
      background: #fff;
    }

		.center{
			text-align: center;
			background-color: #0A5AA6;
		}
    .center img {
      width: 188px;
      height: 90px;
    }

    .home a, .other a {
      color: #fff;
      font-size: 24px;
      line-height: 90px;
    }

    h1 {
      color:#494949;
      margin-top:40px;
      margin-bottom: 20px;
      }
	</style>
	<title>Ultimate Star Wars Fan Site</title>
</head>
<body>
  <div class="container">
  <div class="row">
    <div class="col-12 center">
      <nav class="nav">
        <div class="col-md-5 col-sm-4 home"><a href="index.php">Home</a></div>
        <img src="images/logo.png" class="col-md-2 col-sm-4"><br/>
        <div class="col-md-5 col-sm-4 other"><a href="javascript:;">other</a></div>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-md-12">
      <?php echo '<h1>'.$film->Title.'</h1>';?>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-md-3">
      <?php echo '<p><img src="'.$film->Poster.'" width="100%"></p>';?>
    </div>
    <div class="col-12 col-md-9">
      <?php
          echo '<p><strong style="color:#666;">Director:</strong>'.$film->Director.
          '</p><p><strong style="color:#666;">Writer:</strong>'.$film->Writer.
          '</p><p><strong style="color:#666;">Plot: </strong>'.$film->Plot.'</p>';
          foreach ($film->Ratings AS $ratings){
            echo '<p>'.$ratings->Source.": ".$ratings->Value.'</p><br>';
          };
      ?>
    </div>
      <?php
      $result = mysqli_query($conn, $sql2);
      if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
      ?>
          <div class="row">
          <div class="col-12 col-md-12">
          <video width='100%' controls>
<?php
  echo "<source src='trailer/".$row['trailer']."' type='video/mp4'>Your browser does not support the video tag
    </video></div></div>";
  }
}
?>
  </div>
</div>
</body>
</html>