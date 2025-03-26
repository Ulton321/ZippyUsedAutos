-- SQL script to create the database and tables for Zippy Used Autos
CREATE DATABASE zippyusedautos;

USE zippyusedautos;

CREATE TABLE makes (
    make_id INT AUTO_INCREMENT PRIMARY KEY,
    make_name VARCHAR(50) NOT NULL
);

CREATE TABLE types (
    type_id INT AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(50) NOT NULL
);

CREATE TABLE classes (
    class_id INT AUTO_INCREMENT PRIMARY KEY,
    class_name VARCHAR(50) NOT NULL
);

CREATE TABLE vehicles (
    vehicle_id INT AUTO_INCREMENT PRIMARY KEY,
    make_id INT,
    type_id INT,
    class_id INT,
    year INT,
    model VARCHAR(50),
    price DECIMAL(10, 2),
    FOREIGN KEY (make_id) REFERENCES makes(make_id),
    FOREIGN KEY (type_id) REFERENCES types(type_id),
    FOREIGN KEY (class_id) REFERENCES classes(class_id)
);