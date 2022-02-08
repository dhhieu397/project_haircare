<?php

include ('./connect.php');
include ('./models.php');
include ('./model_seed.php');

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
        sku,
        creation_date
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

        '53376',

        '2022-02-02'
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