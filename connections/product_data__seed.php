<?php

include ('./connect.php');
include ('./models.php');
include ('./model_seed.php');

function seed_item_1($conn){
    echo "Seed item 1";
    
    $sql = "
    INSERT INTO product_item (
        id,
        code,
        name,
        description,
        product_infomation,
        ingredient,
        img,
        subcategory,
        brand,
        sku,
        size,
        creation_date
    )
    VALUES (
        1,

        'evo--be-silver-shampoo-500ml',

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

        4,

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
}

function seed_item_2($conn){
    echo "Seed item 2";
    
    $sql = "
    INSERT INTO product_item (
        id,
        code,
        name,
        description,
        product_infomation,
        ingredient,
        img,
        subcategory,
        brand,
        sku,
        size,
        creation_date
    )
    VALUES (
        2,

        'evo--ritual-salvation-repairing-shampoo-300ml',

        'RITUAL SALVATION REPAIRING SHAMPOO',

        'A reparative, sulphate-free shampoo to repair and strengthen weak, colour-treated hair. Greatly improve hair quality with Ritual Salvation Shampoo by Evo.',

        '<ul>
        <li>Deeply reparative shampoo with gentle cleansing action</li>
        <li>Repairs damaged, brittle hair while locking in colour vibrancy</li>
        <li>Hydrolyzed Quinoa strengthens and protects while retaining colour</li>
        <li>Panthenol locks in moisture and adds shine</li>
        <li>Floral, fruity, exotic and juicy fragrance notes</li>
        <li>Vegan and cruelty free</li>
        <li>Made without sulphates, parabens or gluten</li>
        <li>Recommended for weak, brittle, colour-treated hair</li>
        </ul>
        <p>The recommended retail price (RRP) for this item is $38.00.</p>
        <p>Evo Ritual Salvation Repairing Shampoo dramatically improves the condition of damaged hair by adding softness and shine while reducing frizz and detangling locks. Hydrolyzed Quinoa strengthens and protects the hair fibre while locking in colour vibrancy for optimal retention. Panthenol conditions and moisturises while increasing the hair\'s natural shine. Sulphate-free cleansers are gentle on the hair to help reduce colour fading for long-lasting, luminous tones. This shampoo features floral, fruity, exotic and juicy fragrance notes. Use in conjunction with Evo Ritual Salvation Repairing Shampoo for optimal results.</p>',

        '<ul>
        <li>Panthenol</li> <li>Quinoa</li>
        </ul>
        <p>
        <b>Full ingredients:</b> Aqua, Glycol Stearate, Sodium Lauroyl Methyl Isethionate, Cocamidopropyl Betaine, Methyl Gluceth-20, Peg -12 Dimethicone, Peg - 150 Distearate, Polyquaternium-10, Parfum, Phenoxyethanol, Panthenol, Benzophenone-4,Hydrolyzed Quinoa,Trideceth-9 Pg-Amodimethicone, Benzoic Acid,Dehydroacetic Acid, Butylene Glycol,Trideceth-12,Aloe Barbadensis Leaf Extract, Ethylhexylglycerin, Potassium Sorbate
        </p>',

        'product_thumbnail_39219.png',

        1,

        3,

        '39219',

        3,

        '2022-02-02'
    );
    ";
    // echo $sql;
    if($conn->query($sql) !== True){
        echo "Error: ".$conn->error."\n";
    }

    $sql = "
    INSERT INTO product_item_image (product, img)
    VALUES
        (2, 'product_preview__39219_1.png'),
        (2, 'product_preview__39219_2.png');
    ";
    if($conn->query($sql) !== True){
        echo "Error: ".$conn->error."\n";
    }
}

drop_tables($dbc);
prepare_tables($dbc);
seed_brand($dbc);
seed_category($dbc);
seed_size($dbc);
seed_item_1($dbc);
seed_item_2($dbc);
?>