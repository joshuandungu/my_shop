<?php 
$servername= 'localhost';
$username = 'root';
$password = '';
$db_name = 'shop';
$con = mysqli_connect($servername,$username,$password,$db_name);
if(!$con){
    echo "<script>alert('Failed to connect to the database');</script>";
}
if(isset($_GET['productid'])){
    $productid = $_GET['productid'];
$sql = "SELECT * FROM products WHERE id = '$productid'";
$query = $con->query($sql);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ogaden Stores</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.com.googleapis.com/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.mon.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">OGADEN STORES</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto mb-2  mb-lg-2" >
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Laptops</a>
          <a class="dropdown-item" href="#">Phones</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">More Accessories</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="col-md-2">
    <div class="col-md-8">
        <div class="row">
            <h2 class="text-center">Top Products </h2><br><br>

            <?php while ($product = mysqli_fetch_assoc($query)): ?>
    <div class="col-md-5">
        <h4><?= $product['title']; ?></h4>
        <img src="<?= $product['image']; ?>" alt="<?= $product['title']; ?>">
        <p class="lprice">Rs <?= $product['price']; ?></p>
        <p class="bname"> Rs <?= $product ['brandname'];?></p>
        <p class="desc">Rs <?= $product['description'];?></p>
        <a href="details.php">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#details-1">Buy Now</button>
        </a>
    </div>
<?php endwhile; ?>

        </div>
    </div>
</div>


    
</body>
</html>