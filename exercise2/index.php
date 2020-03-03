<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap</title>
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/styles.css">
  <script src="./js/jquery-2.1.4.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script type="text/javascript">
    function confirmDele (val) {
        return window.confirm("是否删除id="+val+"的用户");
    }
</script>
</head>
<body>

<div class="container" style="text-align:center">
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "mydb";
  
  //创建连接
  $conn = new mysqli($servername, $username, $password, $dbname);
  //检测连接
  if ($conn->connect_error) {
      die("连接失败:".$conn->connect_error);
  }

  $sql = "select * from myguests;";
  $res = $conn->query($sql);
  //获取返回的总行数和列数
  echo "<table border='1' align='center'><tr>";
  //从$res中取出表头
  while ($field=$res->fetch_field()) {
      echo "<th>{$field->name}</th>";
  }
  echo "<th>delete</th><th>revise</th></tr>";

  //循环出数据
  
  while ($row=$res->fetch_assoc()) {
      echo "<tr><td>{$row['id']}</td>
      <td><img src='./images/{$row['picture']}'></td>
      <td>{$row['title']}</td>
      <td>{$row['decribe']}</td>
      <td><a href='delete.php?id={$row['id']}' onclick='return confirmDele({$row['id']})'>delate</a></td>
      <td><a href='update.php?id={$row['id']}'>upadate</a></td></tr>";
  }
  echo "</table>";

  echo '<button style="margin-bottom:50px; margin-top:20px;">
          <a href="add.html">add</a>
        </button>
    <div class="row services">';

    $sql = "select * from myguests;";
    $res = $conn->query($sql);
    while ($row=$res->fetch_assoc()) {
      echo "<section class='col-xs-12 col-sm-6 col-lg-4'>
      <img class='icon' src='./images/{$row['picture']}' alt='Icon'>
      <h3>{$row['title']}</h3>
      <p>{$row['decribe']}</p>
    </section>";
    }
    //关闭资源
    $res->free();
    $conn->close();
    ?>

    <!-- <section class="col-xs-12 col-sm-6 col-lg-4">
      <img class="icon" src="images/icon-grooming.svg" alt="Icon">
      <h3>Grooming</h3>
      <p>Our therapeutic grooming treatments help battle fleas, allergic dermatitis, and other challenging skin conditions.</p>
    </section>

    <section class="col-xs-12 col-sm-6 col-lg-4" >
      <img class="icon" src="images/icon-health.svg" alt="Icon">
      <h3>GeneralHealth</h3>
      <p>Wellness and senior exams, ultrasound, x-ray, and dental cleanings are just a few of our general health services.</p>
    </section>

    <section class="col-xs-12 col-sm-6 col-lg-4">
      <img class="icon" src="images/icon-nutrition.svg" alt="Icon">
      <h3>Nutrition</h3>
      <p>Let our nutrition experts review your pet's diet and prescribe a custom nutrition plan for optimum health and disease prevention.</p>
    </section>

    <section class="col-xs-12 col-sm-6 col-lg-4">
      <img class="icon" src="images/icon-pestcontrol.svg" alt="Icon">
      <h3>Pest Control</h3>
      <p>We offer the latest advances in safe and effective prevention and treatment of fleas, ticks, worms, heart worm, and other parasites.</p>
    </section>

    <section class="col-xs-12 col-sm-6 col-lg-4">
      <img class="icon" src="images/icon-vaccinations.svg" alt="Icon">
      <h3>Vaccinations</h3>
      <p>Our veterinarians are experienced in modern vaccination protocols that prevent many of the deadliest diseases in pets.</p>
    </section>    -->
  </div><!-- row -->   
</div><!-- content container -->

</body>
</html>