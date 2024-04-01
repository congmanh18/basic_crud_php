<?php
include "db_conn.php";

$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$gender = $_POST['gender'];

$sql = "UPDATE crud SET first_name='$first_name', last_name='$last_name', email='$email', gender='$gender' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    echo "Cập nhật thông tin người dùng thành công";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
