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

<body>
  <!-- Menu -->
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
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
        <ul class="navbar-nav px-3">
          <?php
          session_start();
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
        <tr>
          <td data-th="Product">
            <div class="row">
              <div class="col-sm-2 hidden-xs"><img src="https://via.placeholder.com/100x150" alt="Sản phẩm 1" class="img-responsive" width="100">
              </div>
              <div class="col-sm-10">
                <h4 class="nomargin">Sản phẩm 1</h4>
                <p>Mô tả của sản phẩm 1</p>
              </div>
            </div>
          </td>
          <td data-th="Price">200.000 đ</td>
          <td data-th="Quantity"><input class="form-control text-center" value="1" type="number">
          </td>
          <td data-th="Subtotal" class="text-center">200.000 đ</td>
          <td class="actions" data-th="">
            <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
            </button>
            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
            </button>
          </td>
        </tr>
        <tr>
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
        </tr>
      </tbody>
      <tfoot>
        <tr class="visible-xs">
          <td class="text-center"><strong>Tổng 200.000 đ</strong>
          </td>
        </tr>
        <tr>
          <td><a href="Main.php" class="btn btn-success"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
          </td>
          <td colspan="2" class="hidden-xs"> </td>
          <td class="hidden-xs text-center"><strong>Tổng tiền 500.000 đ</strong>
          </td>
          <td><a href="" class="btn btn-dark btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- End product shopping -->
  <script src="js/bootstrap.js"></script>
</body>

</html>