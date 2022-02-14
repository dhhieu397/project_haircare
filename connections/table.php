<?php

function drop_tables($conn){
    echo "Drop all tables\n";
    if($conn->query("DROP TABLE product_item_image;") !== True){
        echo "Error: " . $conn->error . "\n";
    };
    if($conn->query("DROP TABLE product_item;") !== True){
        echo "Error: " . $conn->error . "\n";
    };
    if($conn->query("DROP TABLE product_subcategory;") !== True){
        echo "Error: " . $conn->error . "\n";
    };
    if($conn->query("DROP TABLE product_category;") !== True){
        echo "Error: " . $conn->error . "\n";
    };
    if($conn->query("DROP TABLE product_brand;") !== True){
        echo "Error: " . $conn->error . "\n";
    };
    if($conn->query("DROP TABLE product_size;") !== True){
        echo "Error: " . $conn->error . "\n";
    };
    if($conn->query("DROP TABLE product_type;") !== True){
        echo "Error: " . $conn->error . "\n";
    };
}

function prepare_tables($conn){
    echo "Create table 'product_brand'\n";
    $sql = "CREATE TABLE product_brand (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        description TEXT NOT NULL
    )";
    if($conn->query($sql) !== True){
        echo "Error: ". $conn->error ."\n";
    };

    echo "Create table 'product_type'\n";
    $sql = "CREATE TABLE product_type (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL
    )";
    if($conn->query($sql) !== True){
        echo "Error: ". $conn->error ."\n";
    };

    echo "Create table 'product_category'\n";
    $sql = "CREATE TABLE product_category (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        type INT(6) UNSIGNED,
        CONSTRAINT FK_product_type FOREIGN KEY (type) REFERENCES product_type(id)
    )";
    $conn->query($sql);
    if($conn->query($sql) !== True){
        echo "Error: ". $conn->error ."\n";
    };

    echo "Create table 'product_subcategory'\n";
    $sql = "CREATE TABLE product_subcategory (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        parent INT(6) UNSIGNED,
        CONSTRAINT FK_category_parent FOREIGN KEY (parent) REFERENCES product_category(id)
    )";
    $conn->query($sql);
    if($conn->query($sql) !== True){
        echo "Error: ". $conn->error ."\n";
    };

    echo "Create table 'product_size'\n";
    $sql = "CREATE TABLE product_size (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(120) NOT NULL,
        size__ml INT(6)
    )";
    $conn->query($sql);
    if($conn->query($sql) !== True){
        echo "Error: ". $conn->error ."\n";
    };

    echo "Create table 'product_item'\n";
    $sql = "CREATE TABLE product_item (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        code VARCHAR(120) NOT NULL,
        name VARCHAR(120) NOT NULL,
        description TEXT NOT NULL,
        product_infomation TEXT NOT NULL,
        ingredient TEXT NOT NULL,
        guide TEXT NOT NULL,
        img VARCHAR(60) NOT NULL,
        subcategory INT(6) UNSIGNED,
        brand INT(6) UNSIGNED,
        size INT(6) UNSIGNED,
        sku VARCHAR(30),
        price FLOAT,
        real_price FLOAT,
        rate FLOAT,
        rate_number INT(6) UNSIGNED,
        total INT(6) UNSIGNED,
        creation_date DATE NOT NULL,
        CONSTRAINT FK_product_subcategory FOREIGN KEY (subcategory) REFERENCES product_subcategory(id),
        CONSTRAINT FK_product_brand FOREIGN KEY (brand) REFERENCES product_brand(id),
        CONSTRAINT FK_product_size FOREIGN KEY (size) REFERENCES product_size(id)
    )";
    $conn->query($sql);
    if($conn->query($sql) !== True){
        echo "Error: ". $conn->error ."\n";
    };

    echo "Create table 'product_item_image'\n";
    $sql = "CREATE TABLE product_item_image (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        img VARCHAR(60) NOT NULL,
        product INT(6) UNSIGNED NOT NULL,
        CONSTRAINT FK_product_item_image FOREIGN KEY (product) REFERENCES product_item(id)
    )";
    $conn->query($sql);
    if($conn->query($sql) !== True){
        echo "Error: ". $conn->error ."\n";
    };
}
?>