<?php
include './connect_db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BookStore Admin</title>
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
  <link rel="stylesheet" href="/css/admin.css">
  <link rel="stylesheet" href="/font-awesome/css/all.css">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    function xoasanpham() {
      confirm("Bạn chắc chắn muốn xóa sản phẩm này ?");
    }
  </script>

</head>

<body data-spy="scroll" data-target="#myScrollspy" data-offset="1">
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
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="listsanpham();">Sản Phẩm</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="listdonhang()" ;>Đơn Hàng</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="listkhachhang();">Khách Hàng</a>
            </li>
          </ul>

          <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
              <a class="nav-link" href="">Xin Chào Quản Trị Viên</a>
            </li>
            <li class="nav-item text-nowrap">
              <!-- Nếu chưa đăng nhập thì hiển thị nút Đăng nhập -->
              <a type="button" class="btn btn-outline-info btn-md btn-rounded btn-navbar waves-effect waves-light" href="dangkyvadangnhap.php">Đăng Xuất</a>
            </li>
          </ul>
        </div>
    </nav>
  </div>
  <!-- Navbar -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-4 col-lg-3" id="myScrollspy">
        <nav class="navbar navbar-light bg-light flex-column mt-4">
          <nav class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#danhsachsanpham" onclick="cacsanpham();">Danh sách sản phẩm</a>
              <a class="nav-link" href="#themsanpham" onclick="addproduct();">Thêm sản phẩm</a>
            </li>
          </nav>
        </nav>
      </div>

      <div class="col">
        <!-- Xử lý thêm sản phẩm -->

        <?php


        if (isset($_POST['sbm'])) {
          $name_product = $_POST['name_product'];
          $price = $_POST['price'];

          if (isset($_FILES['image'])) {
            $file = $_FILES['image'];
            $file_name = $file['name'];
            move_uploaded_file($file['tmp_name'], 'image/' . $file_name);
          }

          $describe_product = $_POST['describe_product'];
          $id_category = $_POST['id_category'];

          $sql = "INSERT INTO products(name_product,price,image,describe_product,id_category) VALUES ('" . $name_product . "','" . $price . "','" . $file_name . "','" . $describe_product . "','" . $id_category . "')";
          $query = mysqli_query($con, $sql);

          if ($query) {
            header('location: ./admin.php');
          } else {
            echo "Lỗi";
          }
        }
        ?>
        <!-- Xử lý thêm sản phẩm -->

        <form method="POST" enctype="multipart/form-data">
          <div class="container-fluid" id="addproduct" style="display: none;">
            <div class="card-header">
              <h2>Thêm sản phẩm</h2>
            </div>
            <div class="form-group">
              <label for="">ID sản phẩm</label>
              <input type="text" name="id_product" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Tên sản phẩm</label>
              <input type="text" name="name_product" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="">Giá sản phẩm</label>
              <input type="number" min="0" name="price" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="" style="margin-top: 2%;">Hình ảnh sản phẩm</label> <br>
              <input type="file" name="image" style="margin-top: -1222%;">
            </div>
            <div class="form-group">
              <label for="">Mô tả sản phẩm</label> <br>
              <input type="text" name="describe_product" class="form-control">
            </div>
            <div class="form-group" style="width: 25%;">
              <label for="">Thể loại:</label>
              <?php
              $sql = "SELECT * FROM category";
              $query_sql = mysqli_query($con, $sql);
              ?>
              <select class="form-control" name="id_category">
                <?php
                $sql_category = "SELECT * FROM category ORDER BY id_category DESC";
                $query_category = mysqli_query($con, $sql_category);
                while ($rows = mysqli_fetch_array($query_category)) {
                ?>
                  <option value="<?= $rows['id_category'] ?>"><?= $rows['category_name'] ?></option>
                <?php } ?>
              </select>
            </div>

            <button name="sbm" class="btn btn-primary" type="submit" style="margin-left :inherit;">Thêm sản phẩm</button>
          </div>
        </form>

        <!-- Xử lý sửa sản phẩm -->

        <!-- Xử lý sửa sản phẩm -->



        <form>
          <table class="table table-striped" id="xoasanpham" style="margin-top:-19%;overflow: scroll;display: none;width: 70%">
            <thead>
              <tr>
                <th scope="col" style="width: 20%;"> ID Sản Phẩm</th>
                <th scope="col" style="width: 45%;">Tên Sản Phẩm</th>
                <th scope="col" style="width: 20%;">Giá Sản Phẩm</th>
                <th scope="col" style="width: 5%;"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Tôi có câu chuyện, bạn có rượu không?</td>
                <td>80.000</td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Sáng hoan ca, chiều thưởng rượu</td>
                <td>100.000</td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Ở lại thành phố hay về quê?</td>
                <td>120.000</td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>Sự cô độc của bạn, thất bại mà vinh quang</td>
                <td>90.000</td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>Mọi nỗ lực và chờ đợi đều có ý nghĩa</td>
                <td>100.000</td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">6</th>
                <td>Năm tháng vội vã</td>
                <td>150.000</td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">7</th>
                <td>Ngắm tuổi trẻ quay cuồng trong tĩnh lặng</td>
                <td>130.000</td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">8</th>
                <td>Đến cỏ dại còn đàng hoàng mà sống</td>
                <td>90.000</td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>Tôi có câu chuyện, bạn có rượu không?</td>
                <td>80.000</td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Sáng hoan ca, chiều thưởng rượu</td>
                <td>100.000</td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Ở lại thành phố hay về quê?</td>
                <td>120.000</td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>Sự cô độc của bạn, thất bại mà vinh quang</td>
                <td>90.000</td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>Mọi nỗ lực và chờ đợi đều có ý nghĩa</td>
                <td>100.000</td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">6</th>
                <td>Năm tháng vội vã</td>
                <td>150.000</td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">7</th>
                <td>Ngắm tuổi trẻ quay cuồng trong tĩnh lặng</td>
                <td>130.000</td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">8</th>
                <td>Đến cỏ dại còn đàng hoàng mà sống</td>
                <td>90.000</td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
            </tbody>
          </table>
        </form>

        <form>
          <?php

          $sql = "SELECT * FROM products inner join category on products.id_category = category.id_category";
          $query = mysqli_query($con, $sql) or die(mysqli_error($con));




          ?>

          <div class="container-fluid" id="cacsanpham">
            <div class="card">
              <div class="card-header">
                <h2>Danh sách sản phẩm</h2>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th>#</th>
                      <th>Tên sản phẩm</th>
                      <th>Hình ảnh</th>
                      <th>Thể loại</th>
                      <th>Giá</th>
                      <th>Sửa</th>
                      <th>Xóa</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['name_product']; ?></td>
                        <td>
                          <img src="./image/<?php echo $row['image']; ?>">
                        </td>
                        <td><?php echo $row['category_name']; ?></td>

                        <td><?php echo $row['price']; ?></td>
                        <td><a href="admin/suasanpham.php?id=<?php echo $row['id_product']; ?>">Sửa</a></td>
                        <td><a href="admin/xoasanpham.php?id=<?php echo $row['id_product']; ?>" onclick="xoasanpham()">Xóa</a></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </form>
      </div>


      <form>
        <div class="listdonhang" id="listdonhang" style="display: none;">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" style="width: 20%;">Mã đơn hàng</th>
                <th scope="col" style="width: 30%;">Tên khách hàng</th>
                <th scope="col" style="width: 15%;">Ngày đặt hàng</th>
                <th scope="col" style="width: 20%;">Tình trạng đơn hàng</th>
                <th scope="col" style="width: 15%;">Ngày giao hàng</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Chaien</td>
                <td>Otto</td>
                <td>@short</td>
                <td>Otto</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Chaien</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>Thornton</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Chaien</td>
                <td>Jacob</td>
                <td>@twitter</td>
                <td>Jacob</td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>Chaien</td>
                <td>Otto</td>
                <td>@short</td>
                <td>Otto</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Chaien</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>Thornton</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Chaien</td>
                <td>Jacob</td>
                <td>@twitter</td>
                <td>Jacob</td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>Chaien</td>
                <td>Otto</td>
                <td>@short</td>
                <td>Otto</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Chaien</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>Thornton</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Chaien</td>
                <td>Jacob</td>
                <td>@twitter</td>
                <td>Jacob</td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>Chaien</td>
                <td>Otto</td>
                <td>@short</td>
                <td>Otto</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Chaien</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>Thornton</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Chaien</td>
                <td>Jacob</td>
                <td>@twitter</td>
                <td>Jacob</td>
              </tr>
            </tbody>
          </table>
        </div>
      </form>

      <form>
        <div class="listkhachhang" id="listkhachhang" style="display:none;">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" style="width: 20%;">Mã khách hàng</th>
                <th scope="col" style="width: 20%;">Tên khách hàng</th>
                <th scope="col" style="width: 15%;">Số điện thoại</th>
                <th scope="col" style="width: 30%;">Địa chỉ</th>
                <th scope="col" style="width: 15%;">Mã đơn hàng</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Chaien</td>
                <td>Otto</td>
                <td>@short</td>
                <td>Otto</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Chaien</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>Thornton</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Chaien</td>
                <td>Jacob</td>
                <td>@twitter</td>
                <td>Jacob</td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>Chaien</td>
                <td>Otto</td>
                <td>@short</td>
                <td>Otto</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Chaien</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>Thornton</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Chaien</td>
                <td>Jacob</td>
                <td>@twitter</td>
                <td>Jacob</td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>Chaien</td>
                <td>Otto</td>
                <td>@short</td>
                <td>Otto</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Chaien</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>Thornton</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Chaien</td>
                <td>Jacob</td>
                <td>@twitter</td>
                <td>Jacob</td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>Chaien</td>
                <td>Otto</td>
                <td>@short</td>
                <td>Otto</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Chaien</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>Thornton</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Chaien</td>
                <td>Jacob</td>
                <td>@twitter</td>
                <td>Jacob</td>
              </tr>
            </tbody>
          </table>
        </div>
      </form>
    </div>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/script.js"></script>
</body>

</html>