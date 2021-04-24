<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BookStore Giỏ hàng</title>
  <link rel="stylesheet" href="css/giohang.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="font-awesome/css/all.css">
</head>

<body style="background-color: #F0F0F0;">
  <!-- Menu -->
  <?php
  include './connect_db.php';

  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
  $error = false;
  if (isset($_GET["action"])) {
    function update_cart($add = false)
    {
      foreach ($_POST['quanlity'] as $id => $quanlity) {  
        if ($quanlity == 0) {
          unset($_SESSION['cart'][$id]);
        } else {
          if ($add) {
            if(!empty($_SESSION['cart'][$id])) {
              $_SESSION['cart'][$id] += $quanlity;
            } else {
              $_SESSION['cart'][$id] = $quanlity;
            }
          } else {
            $_SESSION['cart'][$id] = $quanlity;
          }
        }
      }
    }
    switch ($_GET["action"]) {
      case "add":
        // quanlity[chi so id sp] as $id co nghia la so $id la chi so mang
        update_cart(true);
        // var_dump($_SESSION['cart']);
        // exit;
        break;
      case "delete":
        if (isset($_GET['id'])) {
          unset($_SESSION['cart'][$_GET['id']]);
        }
        header('location: ./giohang.php');
        break;
      case "submit":
        if (isset($_POST['capnhat'])) {
          update_cart();
          header('location: ./giohang.php');
        } elseif (isset($_POST['oder_click'])) {
            if(empty($_POST['name'])) {
              $error = "Bạn chưa nhập tên của người nhận";
            } elseif(empty($_POST['phone']))  {
              $error = "Bạn chưa nhập số điện thoại người nhận";
            } elseif($_POST['address']) {
              $error = "Bạn chưa nhập địa chỉ người nhận";
            }
        }
        break;
    }
  }
  if (!empty($_SESSION["cart"])) {
    $product = mysqli_query($con, "SELECT * FROM products WHERE id_product IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
  } ?>
    

  <div class="menu">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="Main.php"><img src="image/logo.png" alt="..." width="100px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="Main.php">Trang chủ</a>
            </li>
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
          <form class="d-flex" action="Main.php">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="text">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
        <ul class="navbar-nav px-3">
          <?php
          if (isset($_SESSION['user'])) {
          ?>
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
          <?php } ?>
        </ul>
      </div>
    </nav>
  </div>
  <!-- End menu -->
  <!-- Product shopping -->
  <div class="container">

    <form id="cart-form" action="giohang.php?action=submit" method="POST">
      <table id="cart" class="table table-hover table-condensed">
        <thead>
          <tr>
            <th style="width:50%">Tên sản phẩm</th>
            <th style="width:10%">Giá</th>
            <th style="width:8%">Số lượng</th>
            <th style="width:22%" class="text-center">Thành tiền</th>
            <th style="width:10%"> </th>
          </tr>
        </thead>
        <tbody>
          <?php
          if(!empty($product)){
          while ($rows = mysqli_fetch_array($product)) {
          ?>
            <tr>
              <td data-th="Product">
                <div class="row">
                  <div class="col-sm-2 hidden-xs"><img src="./image/<?= $rows['image'] ?>" alt="Sản phẩm 1" class="img-responsive" width="100">
                  </div>
                  <div class="col-sm-10">
                    <h4 class="nomargin"><?= $rows['name_product'] ?></h4>
                    <p><?= $rows['describe_product'] ?></p>
                  </div>
                </div>
              </td>
              <td data-th="Price"><?= $rows['price'] ?></td>
              <!-- Chính giữa quanlity là id sản phẩm -->
              <td data-th="Quantity"><input class="form-control text-center" value="<?= $_SESSION['cart'] [$rows['id_product']] ?>" name="quanlity[<?= $rows['id_product'] ?>]" type="number"></td>
              <td data-th="Subtotal" class="text-center"><?= $rows['price'] ?></td>
              <td class="actions" data-th="">
                <!-- <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                </button> -->
                <a class="btn btn-danger btn-sm" href="giohang.php?action=delete&id=<?= $rows['id_product'] ?>"><i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
          <?php } }?>

          <!-- <tr>
            <td data-th="Product">
              <div class="row">
                <div class="col-sm-2 hidden-xs"><img src="https://via.placeholder.com/100x150" alt="Sản phẩm 1" class="img-responsive" width="100">
                </div>
                <div class="col-sm-10">
                  <h4 class="nomargin">Sản phẩm 2</h4>
                  <p>Mô tả của sản phẩm 2</p>
                </div>
              </div>
            </td>
            <td data-th="Price">300.000 đ</td>
            <td data-th="Quantity"><input class="form-control text-center" value="1" type="number">
            </td>
            <td data-th="Subtotal" class="text-center">300.000 đ</td>
            <td class="actions" data-th="">
              <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
              </button>
              <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
              </button>
            </td>
          </tr> -->
        </tbody>
        <tfoot>
          <!-- <tr class="visible-xs">
            <td class="text-center"><strong>Tổng 200.000 đ</strong>
            </td>
          </tr> -->
          <tr>
            <td><a href="Main.php" class="btn btn-success"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
            </td>
            <td colspan="2" class="hidden-xs"> </td>
            <td class="hidden-xs text-center"><strong>Tổng tiền 500.000 đ</strong></td>
            <td><input type="submit" name="capnhat" value="Cập nhật"></td>
          </tr>
        </tfoot>
      </table>
      <div id="thongtin" style="text-align: end;">
        <hr>
        <div style="margin: 20px;"><label>Người nhận: </label> <input type="name" size="48"></div>
        <div style="margin: 20px;"><label>Điện thoại: </label> <input type="phone" size="48"></div>
        <div style="margin: 20px;"><label>Địa chỉ: </label> <input type="address" size="48"></div>
        <div style="margin: 20px;"><label>Ghi chú: </label> <textarea name="note" id="" cols="100" rows="7"></textarea></div>
        <input class="btn btn-dark btn-block" type="submit" name="oder_click" value="Đặt hàng" style="margin: 10px;">
        <!-- <a href="" class="btn btn-dark btn-block">Thanh toán <i class="fa fa-angle-right"></i></a> -->
      </div>
    </form>
  </div>
  <!-- End product shopping -->
  <!-- Footer -->
  <footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/" role="button"><i class="fab fa-facebook-f"></i></a>

        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/twister" role="button"><i class="fab fa-twitter"></i></a>

        <!-- Google -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.google.com/" role="button"><i class="fab fa-google"></i></a>

        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/" role="button"><i class="fab fa-instagram"></i></a>

        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://au.linkedin.com/" role="button"><i class="fab fa-linkedin-in"></i></a>

        <!-- Github -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/" role="button"><i class="fab fa-github"></i></a>
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
  <script src="js/bootstrap.js"></script>
</body>

</html>