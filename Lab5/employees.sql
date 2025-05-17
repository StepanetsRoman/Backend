
CREATE DATABASE IF NOT EXISTS company_db;
USE company_db;

DROP TABLE IF EXISTS employees;
CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    position VARCHAR(255),
    salary DECIMAL(10,2)
);
