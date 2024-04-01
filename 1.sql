CREATE TABLE crud (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(100),
    gender ENUM('Male', 'Female', 'Other')
);
