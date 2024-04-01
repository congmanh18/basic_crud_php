<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <style>
        h2 {
            text-align: center;
        }
        table {
            width: 60%; 
            margin: 0 auto; 
        }
    </style>
</head>
<body>
<h2> Thông Tin Học Sinh </h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Actions</th>
        </tr>
        <?php            
            if(isset($_GET['id'])) {
                $id = $_GET['id']; 
                $sql = "SELECT * FROM crud WHERE id = ?";
                if($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    if($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['first_name'] . "</td>";
                            echo "<td>" . $row['last_name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['gender'] . "</td>";
                            echo "<td><a href='edit.php?id=" . $row['id'] . "'>Sửa</a> | <a href='delete.php?id=" . $row['id'] . "'>Xóa</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<p>Không tìm thấy bản ghi với ID đã cho.</p>";
                    }
                    
                    $stmt->close();
                } else {
                    echo "<p>Có lỗi xảy ra khi chuẩn bị truy vấn.</p>";
                }
            } else {
                echo "<p>Không có ID được cung cấp.</p>";
            }
            $conn->close();
        ?>
    </table>
</body>
</html>