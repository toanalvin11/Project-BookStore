<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../font-awesome/css/all.css">
    <title>Quản lý user</title>
</head>

<body>
    <div class="menu">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="../image/logo.png" alt="..." width="100px"></a>
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
    <?php
    include '../connect_db.php';
    $sql_query = mysqli_query($con, "SELECT * FROM user");
    ?>

    <div class="container-fluid">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Chức năng</th>
                    <th scope="col">Status</th>
                    <th scope="col">Create time</th>
                    <th scope="col">Xử lý</th>
                    <th scope="col">Phân quyền</th>
                </tr>
            </thead>
            <tbody>
                <?php

                date_default_timezone_set("Asia/Ho_Chi_Minh");
                while ($row = mysqli_fetch_assoc($sql_query)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['passworduser']; ?></td>
                        <?php $status_admin = $row['status_admin'];
                        if ($status_admin == 0) {
                            $admin = "<p>Admin</p>";
                        }else
                        {
                            $admin = "<p>User</p>";
                        }

                        echo "<br> <td>" . $admin . " </td>"; ?>

                        <?php $status = $row['status'];
                        if ($status == 0) {
                            $strStatus = "<p>Active</p>";
                        }else
                        {
                            $strStatus = "<p>Blocked</p>";
                        }
                        echo "<br> <td>" . $strStatus . " </td>"; ?>

                        <td><?php echo date("d-m-Y H:i:s ", $row['create_time']); ?></td>
                            <?php
                                if ($status == 0) {
                                    $active = "<a href=activeuser.php?id=". $row['id'] .">Block</a>";
                                }else
                                {
                                    $active = "<a href=blockuser.php?id=". $row['id'] .">Active</a>";
                                }
                            echo "<br><td>" . $active . "</td>";
                            ?>
                        
                            <?php
                                if ($status_admin == 0) {
                                    $active = "<a href=goquyenadmin.php?id=". $row['id'] .">Gỡ quyền admin</a>";
                                }
                                else
                                {
                                    $active = "<a href=capquyenadmin.php?id=". $row['id'] .">Cấp quyền admin</a>";
                                }
                            echo "<br><td>" . $active . "</td>";
                            ?>
                        

                    </tr>
                <?php    } ?>
            </tbody>
        </table>
    </div>
</body>

</html>