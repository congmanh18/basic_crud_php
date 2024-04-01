<?php
include "db_conn.php";

$id = $_GET['id'];

$sql = "SELECT * FROM crud WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sửa thông tin người dùng</title>
</head>
<body>
    <h2>Sửa thông tin người dùng</h2>

    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        First Name: <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>"><br><br>
        Last Name: <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>"><br><br>
        Email: <input type="text" name="email" value="<?php echo $row['email']; ?>"><br><br>
        Gender: <input type="text" name="gender" value="<?php echo $row['gender']; ?>"><br><br>
        <input type="submit" value="Cập nhật">
    </form>
</body>
</html>
