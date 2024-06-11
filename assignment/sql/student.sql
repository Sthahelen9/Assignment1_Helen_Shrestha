CREATE TABLE student_infos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    student_id VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    grades VARCHAR(50) NOT NULL,
    address TEXT NOT NULL,
    gender VARCHAR(10) NOT NULL
);
