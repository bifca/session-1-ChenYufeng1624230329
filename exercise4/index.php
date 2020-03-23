<?php
require_once 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<style>
    body {
      background: #0C151C;
    }

    .container {
      height: 665px;
      background: #ccc;
    }

		.center{
			text-align: center;
			background-color: #0A5AA6;
		}

    .center img {
      width: 188px;
      height: 84px;
    }

    div .imgSrc {
      margin-top:20px;
      width:100%;
      height: 100%;
    }

    .home a, .other a {
      color: #fff;
      font-size: 24px;
      line-height: 90px;
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
			<?php
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)){
						echo "<div class='col-12 col-md-4'>";
						echo "<a href='film.php?film=".$row['imgname']."'><img src='images/".$row['poster']."' class='imgSrc'></a></div>";

					}
				}

			?>
		</div>
	</div>
</body>
</html>