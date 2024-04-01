<?php
include "db_conn.php";

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$gender = $_POST['gender'];

$sql = "INSERT INTO crud (first_name, last_name, email, gender) VALUES ('$first_name', '$last_name', '$email', '$gender')";

if ($conn->query($sql) === TRUE) {
    header("Location: read_table.php");
    echo "Thêm mới người dùng thành công";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!-- http://localhost/crud/insert2.php?first_name=John+Manh&last_name=Doe&email=johndoe@example.com&gender=male -->