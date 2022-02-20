<?php
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
        ),
        (
            3,
            'Evo',
            'born from a desire to shake up the hair industry status quo, we have grown from an aussie upstart into a global movement of salons, stylists and free thinkers. from humble beginnings to big ideas… our mission has remained the same: saving ordinary humans from themselves.'
        )
    ";
    $conn->query($sql);
}

function seed_type($conn){
    echo "Seed type\n";
    $sql = "INSERT INTO product_type (
        id,
        name
    )
    VALUES
        (
            1,
            'product'
        ),
        (
            2,
            'treatment'
        ),
        (
            3,
            'equipment'
        )
    ";
    $conn->query($sql);
}

function seed_category($conn){
    echo "Seed category\n";
    $sql = "INSERT INTO product_category (
        id,
        name,
        type
    )
    VALUES
        (
            1,
            'Shampoo',
            1
        ),
        (
            2,
            'Conditioner',
            1
        ),
        (
            3,
            'Treatment',
            2
        ),
        (
            4,
            'Electrical',
            3
        )
    ";
    $conn->query($sql);

    $sql = "INSERT INTO product_subcategory (
        id,
        name,
        parent
    )
    VALUES
        (
            1,
            'Hair Colour Shampoo',
            1
        ),
        (
            2,
            'Repair Shampoo',
            1
        ),
        (
            3,
            'Colour Conditioner',
            2
        ),
        (
            4,
            'Volume Conditioner',
            2
        ),
        (
            5,
            'Colour Treatments',
            3
        ),
        (
            6,
            'Hair Clippers',
            4
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
?>