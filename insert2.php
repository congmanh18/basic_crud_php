<?php
include "db_conn.php";

// Kiểm tra nếu có dữ liệu được gửi qua URL
if(isset($_GET['first_name']) && isset($_GET['last_name']) && isset($_GET['email']) && isset($_GET['gender'])) {
    // Lấy dữ liệu từ URL
    $first_name = $_GET['first_name'];
    $last_name = $_GET['last_name'];
    $email = $_GET['email'];
    $gender = $_GET['gender'];
    
    $sql = "INSERT INTO crud (first_name, last_name, email, gender) VALUES (?, ?, ?, ?)";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "ssss", $first_name, $last_name, $email, $gender);
        
        if(mysqli_stmt_execute($stmt)){
            echo "Dữ liệu đã được thêm thành công.";
            header("Location: read_table.php");
        } else{
            echo "Có lỗi xảy ra khi thêm dữ liệu: " . mysqli_error($conn);
        }
    }
    
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
