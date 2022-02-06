<?php

include ('./connect.php');

function drop_tables($conn){
    echo "Drop all tables\n";
    if($conn->query("DROP TABLE product_item_size;") !== True){
        echo "Error: " . $conn->error . "\n";
    };
    if($conn->query("DROP TABLE product_item_image;") !== True){
        echo "Error: " . $conn->error . "\n";
    };
    if($conn->query("DROP TABLE product_item;") !== True){
        echo "Error: " . $conn->error . "\n";
    };
    if($conn->query("DROP TABLE product_size;") !== True){
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

    echo "Create table 'product_category'\n";
    $sql = "CREATE TABLE product_category (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL
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
        name VARCHAR(120) NOT NULL,
        description TEXT NOT NULL,
        product_infomation TEXT NOT NULL,
        ingredient TEXT NOT NULL,
        img VARCHAR(60) NOT NULL,
        subcategory INT(6) UNSIGNED,
        brand INT(6) UNSIGNED,
        sku VARCHAR(30),
        CONSTRAINT FK_product_subcategory FOREIGN KEY (subcategory) REFERENCES product_subcategory(id),
        CONSTRAINT FK_product_brand FOREIGN KEY (brand) REFERENCES product_brand(id)
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

    echo "Create table 'product_item_size'\n";
    $sql = "CREATE TABLE product_item_size (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        size INT(6) UNSIGNED NOT NULL,
        product INT(6) UNSIGNED NOT NULL,
        CONSTRAINT FK_product_item_size_product FOREIGN KEY (product) REFERENCES product_item(id),
        CONSTRAINT FK_product_item_size_size FOREIGN KEY (size) REFERENCES product_size(id)

    )";
    $conn->query($sql);
    if($conn->query($sql) !== True){
        echo "Error: ". $conn->error ."\n";
    };
}

function seed_brand($conn){
    echo "Seed brand\n";
    $sql = "INSERT INTO product_brand (
        id,
        name,
        description
    )
    VALUES
        (
            1,
            '360 Color',
            'Gentle on hair and its environment, 360 Color is a collection of cruelty, paraben and gluten free permanent hair colour creams. Designed for busy salons, 360 Color is a high performing range with an economical price tag.'
        ),
        (
            2,
            '3Deluxe',
            '3Deluxe permanent hair colour cream uses innovative and light reflective formulas that add an extra glow to hair colouring services.'
        )
    ";
    $conn->query($sql);
}

function seed_category($conn){
    echo "Seed category\n";
    $sql = "INSERT INTO product_category (
        id,
        name
    )
    VALUES
        (
            1,
            'Shampoo'
        ),
        (
            2,
            'Conditioner'
        )
    ";
    $conn->query($sql);

    $sql = "INSERT INTO product_subcategory (
        name,
        parent
    )
    VALUES
        (
            'Hair Colour Shampoo',
            1
        ),
        (
            'Repair Shampoo',
            1
        ),
        (
            'Colour Conditioner',
            2
        ),
        (
            'Volume Conditioner',
            2
        )
    ";
    $conn->query($sql);
}

function seed_size($conn){
    echo "Seed size\n";
    $sql = "INSERT INTO product_size (
        id,
        name,
        size__ml
    )
    VALUES
        (
            1,
            '30ml',
            30
        ),
        (
            2,
            '250ml',
            250
        ),
        (
            3,
            '300ml',
            300
        ),
        (
            4,
            '500ml',
            500
        ),
        (
            5,
            '1L',
            1000
        );
    ";
    if($conn->query($sql) !== True){
        echo "Error: " .$conn->error."\n";
    }
}

function seed_items($conn){
    $sql = "
    INSERT INTO product_item (
        id,
        name,
        description,
        product_infomation,
        ingredient,
        img,
        subcategory,
        brand,
        sku
    )
    VALUES (
        1,

        'BE SILVER SHAMPOO',

        'A blonde shampoo that neutralises yellow tones in bleached, grey, blonde or highlighted hair.',

        '<ul><li>Strong violet pigments to remove unwanted brassiness</li>
        <li>Enriched with Chamomile, Sweet Almond Oil and Panthenol</li>
        <li>Strengthening and hydrating formula
        Vegan friendly</li>
        <li>Free from gluten, parabens and mineral oils 
        Recommended for bleached, blonde, grey or highlighted hair</li></ul>
        <p>The recommended retail price (RRP) for this item is $29.95.</p><br/>
        <p>360 Be Silver Shampoo is designed to combat yellow, gold and brassy tones to help maintain the coolness of blonde, silver or grey hair. This deeply nourishing, vegan formula is enriched with Chamomile, An infusion of Sweet Almond Oil and Panthenol strengthen and hydrate the hair, leaving it soft and shiny. Free of parabens, gluten and mineral oils, this anti-yellow shampoo is gentle enough for daily use and pairs perfectly with 360 Be Silver Conditioner for premium toning while improving the overall condition of the hair.</p>',

        '<ul>
        <li>Sweet Almond Oil</li>
        <li>Chamomile Extract</li>
        <li>Violet Pigments</li>
        </ul>
        <br/>
        <p>
        <b>Full ingredients</b> Aqua (Water), Sodium Laureth Sulfate, Sodium Chloride, Cocamide Dea, Cocamidopropyl Betaine, Peg-7 Glyceryl Cocoate, Parfum (Fragrance), Chamomilla Recutita Extract (Chamomilla Recutita (Matricaria) Flower Extract), Oryza Sativa Extract (Oryza Sativa (Rice) Extract), Prunus Amygdalus Dulcis Oil (Prunus Amygdalus Dulcis (Sweet Almond) Oil), Cocamide Mea, Glycol Distearate, Polyquaternium-10, Polyquaternium-7, Laureth-10, Glycerin, Cetearyl Glucoside, Sorbitol, Propylene Glycol, Xanthan Gum, Glyceryl Stearate Se, Sodium Hydroxide, Acid Violet 43, Tetrasodium Edta, Citric Acid, Imidazolidinyl Urea, Methylchloroisothiazolinone, Methylisothiazolinone.
        </p>',

        'product_thumbnail_53376.png',

        1,

        1,

        '53376'
    );
    ";
    if($conn->query($sql) !== True){
        echo "Error: ".$conn->error."\n";
    }

    $sql = "
    INSERT INTO product_item_image (product, img)
    VALUES
        (1, 'product_preview__53376_1.png'),
        (1, 'product_preview__53376_2.png');
    ";
    if($conn->query($sql) !== True){
        echo "Error: ".$conn->error."\n";
    }

    $sql = "
    INSERT INTO product_item_size (product, size)
    VALUES 
        (1, 4),
        (1, 5);";
    if($conn->query($sql) !== True){
        echo "Error: ".$conn->error."\n";
    }
}

drop_tables($dbc);
prepare_tables($dbc);
seed_brand($dbc);
seed_category($dbc);
seed_size($dbc);
seed_items($dbc);
?>