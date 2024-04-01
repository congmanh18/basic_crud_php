<?php
include "db_conn.php";

$id = $_GET['id'];

$sql = "DELETE FROM crud WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: read_table.php");
    echo "Xóa người dùng thành công";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
