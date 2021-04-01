<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Store</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="font-awesome/css/all.css">
</head>

<body>
  <!-- Open menu -->
  <div class="menu">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="image/logo.png" alt="..." width="100px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="Main.php">Trang chủ</a>
            </li>
            <?php
            include 'connect_db.php';
            session_start();
            if (isset($_SESSION['user'])) {
              $user = $_SESSION['user'];
              $query = mysqli_query($con, "SELECT * FROM user WHERE username = '$user'");
              if (mysqli_num_rows($query) > 0) {
                $result = mysqli_fetch_assoc($query);
                // Chi co trang thai status la 1 thi moi vao duoc trang admin
                if (isset($result['status']) && $result['status'] == 1) {
            ?>
                  <li class="nav-item">
                    <a class="nav-link" href="admin.php">Quản trị</a>
                  </li>
            <?php }
              }
            } ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Thể Loại</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Truyện ngắn - tản văn</a></li>
                <li><a class="dropdown-item" href="#">Tiểu thuyết</a></li>
                <li><a class="dropdown-item" href="#">Truyện dài</a></li>
                <li><a class="dropdown-item" href="#">Truyện tranh </a></li>
                <li><a class="dropdown-item" href="#">Tâm lý học</a></li>
                <li><a class="dropdown-item" href="#">Sách kỹ năng sống</a></li>
                <li><a class="dropdown-item" href="#">Sách chuyên ngành </a></li>
                <li><a class="dropdown-item" href="#"> Sách giáo khoa </a></li>
                <li><a class="dropdown-item" href="#"> Sách nấu ăn </a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
        <ul class="navbar-nav px-3">
          <?php
          if (isset($_SESSION['user'])) {
          ?>
            <li class="nav-item text-nowrap">
              <a class="nav-link" href="checkusergiohang.php"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user"></i> <?= $_SESSION['user']; ?></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Thông Tin</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="dangxuat.php"><i class="fas fa-sign-out-alt"> </i>Đăng Xuất</a></li>
              </ul>
            </li>
          <?php } else { ?>
            <li class="nav-item text-nowrap">
              <a class="nav-link" id="login2" href="#"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
            </li>
            <li class="nav-item text-nowrap">
              <!-- Nếu chưa đăng nhập thì hiển thị nút Đăng nhập -->
              <a class="nav-link" href="dangkyvadangnhap.php">Đăng nhập</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </nav>
  </div>
  <!-- End menu -->
  <!-- Dang Nhap & Dang Ky -->
  <!-- Dong Dang Ky & Dang Ky -->
  <!-- Open content -->
  <!-- <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://via.placeholder.com/1920x530" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://via.placeholder.com/1920x530" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://via.placeholder.com/1920x530" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div> -->
  <!-- End contend -->
  <!-- Product -->
  <div class="container">
    <div class="row mt-5">
      <h2 class="list-product-title">Book Shelf</h2>
      <div class="list-product-subtile">
        <p>New Book New Life</p>
      </div>
      <div class="product-group">
        <div class="row">
          <?php 
            include 'connect_db.php';
            $product = mysqli_query($con,"SELECT * FROM products LIMIT 8 OFFSET 0");
            while($row = mysqli_fetch_array($product)) {
           ?>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="card card-product mb-3" style="width: 18rem;">
              <img src="<?=$row['image']?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title product-title"><?=$row['name_product'] ?></h5>
                <div class="card-text product-price">
                  <span class="del-price">100.000 vnd</span>
                  <span class="new-price"><?=$row['price'] ?></span>
                </div>
                <a class="btn btn-info btn-icon-bg"><i class="fas fa-shopping-cart"></i></a>
                <a class="btn btn-outline-info btn-hover">Xem chi tiết</a>
              </div>
            </div>
          </div>
          <?php } ?>
          

        </div>
      </div>
    </div>
  </div>
  <!-- End product -->
  <!-- Phan trang -->
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav>
  <!-- End phan trang -->
  <!-- Footer -->
  <footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

        <!-- Google -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>

        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>

        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>

        <!-- Github -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-white" href="https://www.facebook.com/profile.php?id=100008172966669">BOOKSTORE</a>
    </div>
    <!-- Copyright -->
  </footer>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/Main.js"></script>
</body>

</html>