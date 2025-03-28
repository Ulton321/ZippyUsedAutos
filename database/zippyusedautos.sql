-- Create the database
CREATE DATABASE IF NOT EXISTS zippyusedautos;
USE zippyusedautos;

-- Table for vehicle makes (e.g., Toyota, Ford)
CREATE TABLE makes (
    make_id INT AUTO_INCREMENT PRIMARY KEY,
    make_name VARCHAR(50) NOT NULL
);

-- Table for vehicle types (e.g., SUV, Sedan)
CREATE TABLE types (
    type_id INT AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(50) NOT NULL
);

-- Table for vehicle classes (e.g., Economy, Luxury)
CREATE TABLE classes (
    class_id INT AUTO_INCREMENT PRIMARY KEY,
    class_name VARCHAR(50) NOT NULL
);

-- Table for vehicles
CREATE TABLE vehicles (
    vehicle_id INT AUTO_INCREMENT PRIMARY KEY,
    make_id INT NOT NULL,
    type_id INT NOT NULL,
    class_id INT NOT NULL,
    year INT NOT NULL,
    model VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (make_id) REFERENCES makes(make_id) ON DELETE CASCADE,
    FOREIGN KEY (type_id) REFERENCES types(type_id) ON DELETE CASCADE,
    FOREIGN KEY (class_id) REFERENCES classes(class_id) ON DELETE CASCADE
);