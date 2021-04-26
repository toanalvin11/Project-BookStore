<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BookStore Admin</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="font-awesome/css/all.css">

</head>

<body style="background-color: #F0F0F0;">
  <div class="menu">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="image/logo.png" alt="..." width="100px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
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
              <a type="button" class="btn btn-outline-info btn-md btn-rounded btn-navbar waves-effect waves-light"
                href="./dangxuat.php">Đăng Xuất</a>
            </li>
          </ul>
        </div>
    </nav>
  </div>
  <!-- Navbar -->
  <div class="content">
    <div class="listsanpham" id="listsanpham">
      <div class="left">
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action active bg-dark">
            <strong>Quản lý sản phẩm</strong>
          </a>
          <a href="#" class="list-group-item list-group-item-action" onclick="addproduct();">Thêm sản phẩm</a>
          <a href="#" class="list-group-item list-group-item-action" onclick="xoasanpham();">Xóa sản phẩm</a>
          <a href="#" class="list-group-item list-group-item-action" onclick="suasanpham();">Sửa sản phẩm</a>
          <a href="#" class="list-group-item list-group-item-action" onclick="cacsanpham();">Các sản phẩm</a>
        </div>
      </div>

      <div class="right">
        <form>
          <div class="addproduct" id="addproduct" style="display: none;">
            <p style="font-size: 30px;margin-left: 5%;margin-top: 3%;text-align: center;">THÊM SẢN PHẨM
            <p><strong> ID Sản Phẩm : </strong></p>
            <input value="ID Sản Phẩm" type="text" id="inputPrefilledEx" class="form-control" style="margin-top:-6%">
            <p style="margin-top: 4%;"><strong>Tên Sản Phẩm :</strong></p>
            <input value="Tên Sản Phẩm" type="text" id="inputPrefilledEx" class="form-control" style="margin-top: -6%;">
            <o style="margin-left: 5%;"> <strong>Thể Loại : </strong></o>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example"
              style="margin-left:7%;margin-top: 2%;">
              <option selected>Thể loại</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
            <p style="margin-top: 0.5%;"><strong>Giá Sản Phẩm :</strong></p>
            <input value="Giá Sản Phẩm" type="text" id="inputPrefilledEx" class="form-control" style="margin-top: -5%;">
            <p style="margin-top: 3%;"><strong>Hình ảnh</strong></p>
            <div class="input-group md-3" style="margin-left:6%;width: 70%;margin-top:-4%;">
              <input type="file" class="form-control" id="inputGroupFile02">
              <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
            </p>
            <button type="button" class="btn btn-primary btn-lg"
              style="text-align: center;margin-left: 50%;width: 10%;font-weight: 200;font-size: 1rem;">Thêm</button>
          </div>
        </form>

        <form>
          <div class="addproduct" id="suasanpham" style="display: none;">
            <p style="font-size: 30px;margin-left: 5%;margin-top: 3%;text-align: center;" onclick="addproduct();">SỬA
              SẢN PHẨM
            <p><strong> ID Sản Phẩm : </strong></p>
            <input value="ID Sản Phẩm" type="text" id="inputPrefilledEx" class="form-control" style="margin-top:-6%">
            <p style="margin-top: 4%;"><strong>Tên Sản Phẩm :</strong></p>
            <input value="Tên Sản Phẩm" type="text" id="inputPrefilledEx" class="form-control" style="margin-top: -6%;">
            <o style="margin-left: 5%;"> <strong>Thể Loại : </strong></o>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example"
              style="margin-left:7%;margin-top: 2%;">
              <option selected>Thể loại</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
            <p style="margin-top: 0.5%;"><strong>Giá Sản Phẩm :</strong></p>
            <input value="Giá Sản Phẩm" type="text" id="inputPrefilledEx" class="form-control" style="margin-top: -5%;">
            <p style="margin-top: 3%;"><strong>Hình ảnh</strong></p>
            <div class="input-group md-3" style="margin-left:6%;width: 70%;margin-top:-4%;">
              <input type="file" class="form-control" id="inputGroupFile02">
              <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
            </p>
            <button type="button" class="btn btn-primary btn-lg"
              style="text-align: center;margin-left: 50%;width: 10%;font-weight: 200;font-size: 1rem;">Thêm
            </button>
          </div>
        </form>

        <form>
          <table class="table table-striped" id="xoasanpham"
            style="margin-top:-19%;overflow: scroll;display: none;width: 70%">
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
          <table class="table table-striped" id="cacsanpham"
            style="margin-top:-19%;overflow: scroll;display: none;margin-left: 30%;width: 70%;">
            <thead>
              <tr>
                <th scope="col" style="width: 15%"> ID Sản Phẩm</th>
                <th scope="col" style="width: 30%;">Tên Sản Phẩm</th>
                <th scope="col" style="width: 15%;">Giá Sản Phẩm</th>
                <th scope="col" style="width: 5%;"></th>
                <th scope="col" style="width: 5%;"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Tôi có câu chuyện, bạn có rượu không?</td>
                <td>80.000</td>
                <td><button type="button" class="btn btn-danger">Sửa</button></td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Sáng hoan ca, chiều thưởng rượu</td>
                <td>100.000</td>
                <td><button type="button" class="btn btn-danger">Sửa</button></td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Ở lại thành phố hay về quê?</td>
                <td>120.000</td>
                <td><button type="button" class="btn btn-danger">Sửa</button></td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>Sự cô độc của bạn, thất bại mà vinh quang</td>
                <td>90.000</td>
                <td><button type="button" class="btn btn-danger">Sửa</button></td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>Mọi nỗ lực và chờ đợi đều có ý nghĩa</td>
                <td>100.000</td>
                <td><button type="button" class="btn btn-danger">Sửa</button></td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">6</th>
                <td>Năm tháng vội vã</td>
                <td>150.000</td>
                <td><button type="button" class="btn btn-danger">Sửa</button></td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">7</th>
                <td>Ngắm tuổi trẻ quay cuồng trong tĩnh lặng</td>
                <td>130.000</td>
                <td><button type="button" class="btn btn-danger">Sửa</button></td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">8</th>
                <td>Đến cỏ dại còn đàng hoàng mà sống</td>
                <td>90.000</td>
                <td><button type="button" class="btn btn-danger">Sửa</button></td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>Tôi có câu chuyện, bạn có rượu không?</td>
                <td>80.000</td>
                <td><button type="button" class="btn btn-danger">Sửa</button></td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Sáng hoan ca, chiều thưởng rượu</td>
                <td>100.000</td>
                <td><button type="button" class="btn btn-danger">Sửa</button></td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Ở lại thành phố hay về quê?</td>
                <td>120.000</td>
                <td><button type="button" class="btn btn-danger">Sửa</button></td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>Sự cô độc của bạn, thất bại mà vinh quang</td>
                <td>90.000</td>
                <td><button type="button" class="btn btn-danger">Sửa</button></td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>Mọi nỗ lực và chờ đợi đều có ý nghĩa</td>
                <td>100.000</td>
                <td><button type="button" class="btn btn-danger">Sửa</button></td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">6</th>
                <td>Năm tháng vội vã</td>
                <td>150.000</td>
                <td><button type="button" class="btn btn-danger">Sửa</button></td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">7</th>
                <td>Ngắm tuổi trẻ quay cuồng trong tĩnh lặng</td>
                <td>130.000</td>
                <td><button type="button" class="btn btn-danger">Sửa</button></td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">8</th>
                <td>Đến cỏ dại còn đàng hoàng mà sống</td>
                <td>90.000</td>
                <td><button type="button" class="btn btn-danger">Sửa</button></td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
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