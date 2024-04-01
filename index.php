<?php include "db_conn.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Nguyen Manh</title>
</head>
<body>
    <h2>NGUYEN CONG MANH</h2>

    <a href="create.php">Thêm mới người dùng</a><br><br>

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
        $sql = "SELECT * FROM crud";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
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
            echo "<tr><td colspan='6'>Không có dữ liệu</td></tr>";
        }
        ?>
    </table>
</body>
</html>
