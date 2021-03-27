<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php
        include "connect_db.php";
        if(isset($_GET['action']) && $_GET['action']=='login') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password = md5($password);
            // Đối với kết quả truy vấn SELECT, SHOW, DESCRIBE, hoặc EXPLAIN thành công sẽ trả về object. Các kết quả truy vấn thành công khác trả về true. Nếu không thì trả về false
            $sqlquery = "SELECT * FROM user WHERE username = '$username' AND passworduser = '$password'";
            $old = mysqli_query($con,$sqlquery);
            $arrayuser = mysqli_fetch_assoc($old);
            if(mysqli_num_rows($old) > 0) {
                echo "<br/>Hello ". $username;
                echo $arrayuser['passworduser'];
            }
            else {
                echo "Sai ten dang nhao hoac mat khau";
            }
        }
        
    ?>
    <form action="login.php?action=login" method="post">
        Ten dang nhap : <input type="text" name = "username"><br/>
        Mat khau : <input type="password" name = "password"> <br/>
        <input type="submit" value="Login">
    </form>
</body>
</html>