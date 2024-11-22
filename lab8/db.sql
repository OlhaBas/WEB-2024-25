CREATE DATABASE orders;

USE orders;

CREATE TABLE orders 
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_number VARCHAR(50),
    weight FLOAT,
    city VARCHAR(255),
    delivery_type VARCHAR(50),
    branch VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
