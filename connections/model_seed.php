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
?>