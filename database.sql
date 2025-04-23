create  database project;
USE project;

CREATE TABLE stud (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE
);
