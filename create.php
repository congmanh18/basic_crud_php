<?php include "db_conn.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Thêm mới người dùng</title>
</head>
<body>
    <h2>Thêm mới người dùng</h2>
    <form method="post" action="insert.php">
        First Name: <input type="text" name="first_name"><br><br>
        Last Name: <input type="text" name="last_name"><br><br>
        Email: <input type="text" name="email"><br><br>
        Gender: 
        <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br><br>
        <input type="submit" value="Thêm mới">
    </form>
</body>
</html>
