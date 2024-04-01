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

$json_file = 'data.json';

// Đọc dữ liệu hiện có từ tệp JSON
$data = file_get_contents($json_file);
$data_array = json_decode($data, true);

// Thêm một bản ghi mới vào mảng dữ liệu
$new_record = array(
    'id' => $id, // Điền vào giá trị ID từ CSDL
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email,
    'gender' => $gender
);

$data_array[] = $new_record;

// Ghi dữ liệu mới vào tệp JSON
file_put_contents($json_file, json_encode($data_array));


$conn->close();
?>

<!-- http://localhost/crud/insert2.php?first_name=John+Manh&last_name=Doe&email=johndoe@example.com&gender=male -->