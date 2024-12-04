CREATE DATABASE `fin`;

USE `fin`;

CREATE TABLE `users`(
 `id` int(255) AUTO_INCREMENT PRIMARY KEY,
 `user_id` varchar(100) NOT NULL,
 `username` varchar(100) NOT NULL,
 `email` varchar(100) NOT NULL,
 `password` varchar(100) NOT NULL,
 `date` datetime DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE products (
    property_title VARCHAR(255),
    description TEXT,
    type VARCHAR(100),
    status VARCHAR(100),
    price DECIMAL(10, 2),
    area VARCHAR(100),
    rooms INT,
    address VARCHAR(255),
    state VARCHAR(100),
    city VARCHAR(100),
    neighborhood VARCHAR(100),
    zip VARCHAR(20),
    country VARCHAR(100),
    latitude DECIMAL(9, 6),
    longitude DECIMAL(9, 6),
    google_map_street_view VARCHAR(255),
    detailed_information TEXT,
    property_id INT PRIMARY KEY,
    area_size DECIMAL(10, 2),
    size_prefix VARCHAR(10),
    land_area DECIMAL(10, 2),
    land_area_size_postfix VARCHAR(10),
    bedrooms INT,
    bathrooms INT,
    garages INT,
    garages_size DECIMAL(10, 2),
    year_built INT,
    video_url VARCHAR(255),
    virtual_tour_url VARCHAR(255),
    amenities TEXT,
    property_media JSON,
    floor_plans JSON,
    plan_description TEXT,
    plan_bedrooms INT,
    plan_bathrooms INT,
    plan_price DECIMAL(10, 2),
    price_postfix VARCHAR(10),
    plan_size DECIMAL(10, 2),
    plan_image VARCHAR(255)
);
