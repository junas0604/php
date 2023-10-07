<?php

// Connect to the MySQL database
$db = new PDO('mysql:host=localhost;dbname=pointofsale', 'root', '');

// Create the database if it doesn't exist
if (!$db->query('SELECT 1 FROM `pointofsale`')) {
    $db->query('CREATE DATABASE pointofsale');
}

// Create the ref_menu table if it doesn't exist
if (!$db->query('SELECT 1 FROM `pointofsale`.`ref_menu`')) {
    $db->query('CREATE TABLE `pointofsale`.`ref_menu` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `menu_name` VARCHAR(255) NOT NULL,
        `menu_desc` VARCHAR(255) NOT NULL,
        `price` DECIMAL(10,2) NOT NULL,
        PRIMARY KEY (`id`)
    )');
}

// Close the database connection
$db = null;

?>