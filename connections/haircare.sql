-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 20, 2022 lúc 08:29 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `haircare`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `url`) VALUES
(1, 'home', '/project_haircare/home/'),
(2, 'treatments', '/project_haircare/treatments/'),
(3, 'equipments', '/project_haircare/equipments/'),
(4, 'products', '/project_haircare/products/'),
(6, 'contact us', '/project_haircare/contact_us/');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category2`
--

CREATE TABLE `category2` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category2`
--

INSERT INTO `category2` (`id`, `name`, `url`, `img`) VALUES
(1, 'treatments', '/project_haircare/treatments/', 'image/3.png'),
(2, 'products', '/project_haircare/products/', 'image/4.png'),
(3, 'equipments', '/project_haircare/equipments/', 'image/5.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `img`, `date`, `url`) VALUES
(1, 'treatments available for various different hair problems', 'Hair loss (alopecia) can affect just your scalp or your entire body, and it can be temporary or perm', 'treating_hair_loss.jpg', '2022-02-01', 'post_test.php'),
(2, 'Home Remedies for Gray Hair', '8 HOME REMEDIES TO GET RID OF GREY HAIR NATURALLY', 'gray3.jpg', '2022-02-20', 'post_test2.php'),
(3, '6 Huge Haircare Trends for 2021', 'his year marked unusual haircare habits for many consumers. With salons and barbershops closed, cons', 'trend.jpg', '2022-02-19', 'post_test3.php');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_brand`
--

CREATE TABLE `product_brand` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_brand`
--

-- INSERT INTO `product_brand` (`id`, `name`, `description`) VALUES
-- (1, '360 Color', 'Gentle on hair and its environment, 360 Color is a collection of cruelty, paraben and gluten free permanent hair colour creams. Designed for busy salons, 360 Color is a high performing range with an economical price tag.'),
-- (2, '3Deluxe', '3Deluxe permanent hair colour cream uses innovative and light reflective formulas that add an extra glow to hair colouring services.'),
-- (3, 'Evo', 'born from a desire to shake up the hair industry status quo, we have grown from an aussie upstart into a global movement of salons, stylists and free thinkers. from humble beginnings to big ideas… our mission has remained the same: saving ordinary humans from themselves.'),
-- (4, 'KEUNE', 'born from a desire to shake up the hair industry status quo, we have grown from an aussie upstart into a global movement of salons, stylists and free thinkers. from humble beginnings to big ideas… our mission has remained the same: saving ordinary humans from themselves.'),
-- (5, 'OLAPLEX', 'born from a desire to shake up the hair industry status quo, we have grown from an aussie upstart into a global movement of salons, stylists and free thinkers. from humble beginnings to big ideas… our mission has remained the same: saving ordinary humans from themselves.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category`
--

CREATE TABLE `product_category` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` int(6) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `type`) VALUES
(1, 'Shampoo', 1),
(2, 'Conditioner', 1),
(3, 'Treatment', 2),
(4, 'Electrical', 3),
(5, 'Tools & Brushes', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_item`
--

CREATE TABLE `product_item` (
  `id` int(6) UNSIGNED NOT NULL,
  `code` varchar(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `product_infomation` text NOT NULL,
  `ingredient` text NOT NULL,
  `guide` text NOT NULL,
  `img` varchar(60) NOT NULL,
  `subcategory` int(6) UNSIGNED DEFAULT NULL,
  `brand` int(6) UNSIGNED DEFAULT NULL,
  `size` int(6) UNSIGNED DEFAULT NULL,
  `sku` varchar(30) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `real_price` float DEFAULT NULL,
  `rate` float DEFAULT NULL,
  `rate_number` int(6) UNSIGNED DEFAULT NULL,
  `total` int(6) UNSIGNED DEFAULT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_item`
--

-- INSERT INTO `product_item` (`id`, `code`, `name`, `description`, `product_infomation`, `ingredient`, `guide`, `img`, `subcategory`, `brand`, `size`, `sku`, `price`, `real_price`, `rate`, `rate_number`, `total`, `creation_date`) VALUES
-- (28, 'ACTIVE-SHOCK-CONCENTRATE-8X6ML', 'ACTIVE SHOCK CONCENTRATE 8X6ML', 'ACTIVE SHOCK CONCENTRATE 8X6ML\r\nAn active concentrate for intensively preventing hair loss while increasing density and vitalising the scalp. Achieve beautiful, healthy hair with K.Therapy by Lakmé.\r\n\r\n\r\n', '<ul>\r\n        <li>Shock concentrate for intensive prevention of hair loss</li>\r\n        <li>Procapil improves blood circulation and hair density while preventing ageing</li>\r\n        <li>Olive Leaf Extract regulates and normalises the activity of the sebaceous gland</li>\r\n        <li>Bioactive Peptides vitalise scalp cells and hair follicles</li>\r\n        <li>Dermatologically tested</li>\r\n        <li>Recommended for weak and devitalised hair</li>\r\n        </ul>\r\n        <p>The recommended retail price (RRP) for this item is $103.50.</p>\r\n        <p>K.Therapy by Lakmé provides comfort and well-being with dermatologically tested products that aid in the treatment of hair and scalp problems. K.Therapy Active Concentrate intensively prevents hair loss while increasing the density of hair. Procapil stimulates cell dynamism to delay hair loss, actively preventing ageing while improving blood circulation. Olive Leaf Extract regulates and normalises the activity of the sebaceous gland, reducing production of DHT. Added Bioactive Peptides further regulate the correct development of the hair cycle, vitalising scalp cells and hair follicles. This hair loss treatment infuses water from the Zermatt Glacier consisting of minerals and trace elements with decongestant properties soften and protect the skin. Achieve increased vitality and density while actively preventing hair loss.</p>', '<ul>\r\n        <li>Panthenol</li> <li>Quinoa</li>\r\n        </ul>\r\n        <p>\r\n        <b>Full ingredients:</b> Aqua, Glycol Stearate, Sodium Lauroyl Methyl Isethionate, Cocamidopropyl Betaine, Methyl Gluceth-20, Peg -12 Dimethicone, Peg - 150 Distearate, Polyquaternium-10, Parfum, Phenoxyethanol, Panthenol, Benzophenone-4,Hydrolyzed Quinoa,Trideceth-9 Pg-Amodimethicone, Benzoic Acid,Dehydroacetic Acid, Butylene Glycol,Trideceth-12,Aloe Barbadensis Leaf Extract, Ethylhexylglycerin, Potassium Sorbate\r\n        </p>', 'Upon cleansing with Active Shampoo, apply Active Shock Concentrate to scalp and massage gently.\r\nDo not rinse.\r\nUse 3 times per week on alternate days, for a treatment length of 6-9 weeks', 'img027.png', 5, 3, 1, '39219', 27, 75, 3.8, 32, 10, '2022-02-02'),
-- (29, 'DERMA-ACTIVATE-LOTION', 'DERMA ACTIVATE LOTION', 'DERMA ACTIVATE LOTION\r\nAn intensive treatment to reduce temporary hair loss and thinning. Improve hair vitality, strength and elasticity with Derma Active Lotion by Keune Care.\r\n\r\n\r\n\r\n', '<ul>\r\n        <li>Intense leave-in treatment to prevent temporary hair loss and thinning\r\n</li>\r\n        <li>Biotin strengthens the hair\'s natural Keratin structure\r\n</li>\r\n        <li>Liposomes transport growth promoting ingredients to the scalp</li>\r\n        <li>Caffeine stimulates blood circulation while Takanal activates cell metabolism</li>\r\n        <li>Essential Mineral Complex nourishes and cares for the scalp</li>\r\n        <li>Cruelty free</li>\r\n<li>Recommended for delicate, fine, thinning and dull hair</li>\r\n        </ul>\r\n        <p>The recommended retail price (RRP) for this item is $31.50.</p>\r\n        <p>With a diverse range of carefully crafted products to treat every hair concern, Keune Care offers hairdressers a trusted treatment program that tailors to any client. Formulated with a healthy scalp in mind, Keune Care features an Essential Mineral Complex to nourish and balance the hair\'s foundation, promoting sustainable hair quality. Zinc stimulates the development of new cells, while Copper encourages hair growth by boosting the formation of disulfide cross linkages. Silicon ensures the development of collagen and connective tissues, while Iron circulates oxygen to energise and invigorate the scalp for glossy hair growth. Magnesium sustains this energy production to ensure a continual, healthy mineral balance for a thriving scalp and deeply restored hair. Targeting delicate, fine and thinning hair, Derma Active Lotion prevents excessive loss of hair by stimulating the scalp\'s metabolism; making hair more resistant to external influences. This leave-in treatment features Biotin, a form of Vitamin H, that boosts the hair\'s natural Keratin structure to decrease hair loss and improve elasticity. Takanal activates cell metabolism to stimulate hair growth, while Caffeine invigorates blood circulation to create a longer hair growth phase. Added Liposomes transport these active ingredients directly to the scalp for more effective prevention of incidental hair loss. By using the full Derma Active range, hair and scalp are dramatically revitalised with increased hair quality, shine and health.</p>', '<ul>\r\n        <li>Panthenol</li> <li>Quinoa</li>\r\n        </ul>\r\n        <p>\r\n        With a passion for hair, luxury and high quality ingredients, the Keune range of colour, care, styling and grooming products are designed for all hair types, so you can create looks you client will love.\r\n        </p>', 'Upon cleansing with Active Shampoo, apply Active Shock Concentrate to scalp and massage gently.\r\nDo not rinse.\r\nUse 3 times per week on alternate days, for a treatment length of 6-9 weeks', 'img028.png', 5, 4, 2, '39219', 56, 75, 3.8, 32, 10, '2022-02-02'),
-- (30, 'PROFESSIONAL-SALON-KIT', 'PROFESSIONAL SALON KIT', 'PROFESSIONAL SALON KIT\r\nThe original, patented bond building chemistry for dramatically repairing and restoring the hair fibre from within. Strengthen hair and boost its elasticity with the revolutionary OLAPLEX Professional Salon Kit.\r\n\r\n\r\n\r\n\r\n', '<ul>\r\n        <li>•	Repairs hair from within with patented OLAPLEX Bond Building chemistry\r\n</li>\r\n        <li>•	Protects hair during and after lightening or chemical procedures\r\n</li>\r\n        <li>•	Reduces porosity and makes colour last longer</li>\r\n        <li>•	Increases elasticity and restores hair to its natural texture</li>\r\n        <li>•	Strengthens hair and reduces damage</li>\r\n        <li>•	Vegan, Colour Safe, PH Balanced and Cruelty-Free</li>\r\n<li>•	Free from DEA, Aldehydes, Formaldehyde, Silicone, Parabens, Sulphates, Phosphates, Gluten and Nuts</li>\r\n<li>•	Kit includes 1 x No.1 Bond Multiplier 525ml and 2 x No.2 Bond Perfector 525ml</li>\r\n        </ul>\r\n        <p>The recommended retail price (RRP) for this item is $31.50.</p>\r\n        <p>Existing as the original, unique, bond multiplying hair colour treatment, OLAPLEX gives colourists the confidence, insurance and ability to colour or lighten the hair at any level without the risk of breakage. This Professional Salon Kit featuring 1 x No.1 Bond Multiplier 525ml and 2 x No.2 Bond Perfector 525ml (good for 70 applications) is ideal for in-salon services. The power of OLAPLEX lies in its patented ingredient Bis-Aminopropyl Diglycol Dimaleate. This revolutionary component works by finding single sulfur hydrogen bonds and cross-linking them back together to form disulfide bonds. Disulfide bonds are broken through chemical procedures such as colouring, thermal interference like heat and UV damage, and mechanical processes like brushing and combing. With this single active ingredient repairing the hair fibre from within, the result is stronger, healthier hair with enhanced colour longevity and vibrancy. No.1 Bond Multiplier begins this innovative transformation by mixing with lightener or colour to protect and repair the hair fibre during processing. After rinsing, No.2 Bond Perfector works to further cross-link bonds without the interference of chemicals for a total reparative effect. The unparalleled results of OLAPLEX aren\'t just for hair colour services; with an extensive range of uses with other chemical services from perming to keratin treatments. No.1 and No.2 can also be used as their own express treatment on all hair types. OLAPLEX is colour-safe, vegan, PH balanced and completely free from cruelty, DEA, aldehydes, formaldehyde, silicone, parabens, sulphates, phosphates, gluten and nuts. Join the OLAPLEX revolution for a truly one-of-a-kind solution to restoring the natural texture of hair, boosting its elasticity and transforming its health.</p>', '<ul>\r\n        <li>Panthenol</li> <li>Quinoa</li>\r\n        </ul>\r\n        <p>\r\n        The original bond builder, OLAPLEX revolutionised professional colour services with its innovative hair rebuilding system. For professional salon use and ongoing at-home maintenance, hair is healthier, stronger and colour is brighter.\r\n        </p>', 'Upon cleansing with Active Shampoo, apply Active Shock Concentrate to scalp and massage gently.\r\nDo not rinse.\r\nUse 3 times per week on alternate days, for a treatment length of 6-9 weeks', 'img029.webp', 5, 5, 2, '39219', 56, 75, 3.8, 32, 10, '2022-02-02'),
-- (33, 'Hair-Cream-for-men-Daily-Use-100g', 'Hair Cream for men - Daily Use - 100g', 'Hair Cream for men - Daily Use - 100g\r\n\r\n\r\n\r\n\r\n', '<p>About Hair Cream for men - Daily Use - 100g\r\nAll the nourishment of oil without the stickiness. With the benefits of Almond, Wheatgerm, Olive and Wild Flaxseeds this hair cream is a replacement of oil and can be used all day, without having to worry about looking like a champu. This hair cream for men is completely alcohol, paraben and sulphate free.\r\n</p>\r\n<p>Features of Hair Cream for men - Daily Use - 100g</p>\r\n<ul>\r\n        <li>•	A non-sticky alternative to oil.\r\n</li>\r\n        <li>•	Keeps in check your everyday hair needs along with volume and bounce.\r\n</li>\r\n        <li>•	Can be applied and left all day.</li>\r\n        </ul>', '<ul>\r\n        <li>Panthenol</li> <li>Quinoa</li>\r\n        </ul>\r\n        <p>\r\n        The original bond builder, OLAPLEX revolutionised professional colour services with its innovative hair rebuilding system. For professional salon use and ongoing at-home maintenance, hair is healthier, stronger and colour is brighter.\r\n        </p>', 'Upon cleansing with Active Shampoo, apply Active Shock Concentrate to scalp and massage gently.\r\nDo not rinse.\r\nUse 3 times per week on alternate days, for a treatment length of 6-9 weeks', 'img013.jpg', 1, 5, 2, '39219', 56, 75, 3.8, 32, 10, '2022-02-02'),
-- (34, 'AXE-Natural-Look-Hair-Cream-Understated-2.64oz', 'AXE Natural Look Hair Cream Understated - 2.64oz', 'You love a casual hair style that says you aren\'t trying too hard. But you feel like you\'re walking around with a fragile glass vase on your head. So you need something that\'s controllable. Touchable. Something that can take a gentle knock without crumbling into a disheveled mess. Axe Natural Look Understated Cream, the men\'s hair cream that gives you a casual style that says you woke up that way. No need to shy away from anything that might break the glass. Just craft your own natural look in the morning and go about your day with structured, touchable hair. Men Hair Styling\'s easy. Whether your hair\'s damp or dry, take a fingertip\'s worth of Axe hair styling for men Natural Look Understated Cream and mix it up evenly between your fingers. Rake through your hair and finish it off by sweeping your hair into that causally natural style. Use as part of an Axe hair care regimen, along with Axe shampoo and conditioners designed specifically for men. Whether it be Apollo Shampoo and Conditioner or Total Fresh 3 in 1 Shampoo Conditioner and Bodywash, Axe has the perfect products for any guys grooming routine. Get that casual style (without looking like you tried too hard). AXE Natural Look Softening Cream instantly boosts your hair for a natural look with some style.\r\n\r\n\r\n\r\n', '\r\n<ul>\r\n        <li>•	Axe Natural Look Understated Cream has a light hold styling cream with a flexible, natural finish\r\n</li>\r\n        <li>•	Styles and conditions with light control for all hair lengths\r\n</li>\r\n        <li>•	A little goes a long way</li>\r\n<li>•	Styles and conditions lightly</li>\r\n<li>•	Finger tip amount. Mix. Rake. Sweep.</li>\r\n<li>•	Complemented by a full range of AXE styling and grooming products\r\n</li>\r\n        </ul>', '<ul>\r\n        <li>Panthenol</li> <li>Quinoa</li>\r\n        </ul>\r\n        <p>\r\n        The original bond builder, OLAPLEX revolutionised professional colour services with its innovative hair rebuilding system. For professional salon use and ongoing at-home maintenance, hair is healthier, stronger and colour is brighter.\r\n        </p>', '', 'img017.png', 1, 2, 2, '39219', 56, 75, 3.8, 32, 10, '2022-02-02'),
-- (35, 'NO.4P BLONDE ENHANCER TONING SHAMPOO', 'NO.4P BLONDE ENHANCER TONING SHAMPOO', 'NO.4P BLONDE ENHANCER TONING SHAMPOO\r\nThe best selling OLAPLEX Bond Maintenance Shampoo now comes with a brand new formula designed for blondes. Strengthen & repair while enhancing cool tones with No.4P Blonde Enhancer Toning Shampoo by OLAPLEX.\r\n\r\n', '\r\n<ul>\r\n        <li>•	New formula designed to neutralise unwanted warmth between salon visits\r\n</li>\r\n        <li>•	Formulated with OLAPLEX Bond Building chemistry\r\n</li>\r\n        <li>•	Restores internal strength and moisture levels</li>\r\n<li>•	Adds incredible shine and manageability Suitable for all hair types; especially chemically treated hair</li>\r\n<li>•	Suitable for blondes, balayage, grey and white hair</li>\r\n<li>•	Vegan, colour cafe, pH balanced and cruelty-free\r\n</li>\r\n<li>•	Free from parabens, sulphates, phosphates, gluten and nuts\r\n</li>\r\n        </ul>\r\n<p>The recommended retail price (RRP) for this item is $49.95.\r\nProtect and repair damaged hair and split-ends with the gentle cleansing and reparative OLAPLEX No.4P Blonde Enhancer Toning Shampoo. This brand new formula is designed to neutralise unwanted warmth between salon visits, revealing an evenly cool tone to all blonde hair types. With the ability to strengthen all types of hair, No.4 leaves it shinier and more manageable with every wash. Using the same patented ingredient as the OLAPLEX professional system, Bis-Aminopropyl Diglycol Dimaleate, No.4 works by finding single sulfur hydrogen bonds and cross-linking them back together to form disulfide bonds. Disulfide bonds are broken through chemical procedures such as colouring, thermal interference like heat and UV damage, and mechanical processes like brushing and combing. With this single active ingredient repairing and reinforcing the hair fibre, the result is stronger, healthier hair with enhanced colour longevity and vibrancy. No.4 Bond Maintenance Shampoo works seamlessly with No.5 Bond Maintenance Conditioner and No.3 Hair Perfector as part of the OLAPLEX 3-4-5 regimen for a professional treatment experience at home. OLAPLEX is colour-safe, vegan, pH balanced and completely free from cruelty, DEA, aldehydes, formaldehyde, silicone, parabens, sulphates, phosphates, gluten and nuts. Join the OLAPLEX revolution for a truly one-of-a-kind solution to restoring the natural texture of hair, boosting its elasticity and transforming its health.\r\n\r\n</p>', '<ul>\r\n        <li>Alcohol Free</li> <li>Paraben Free</li>\r\n<li>Cruelty Free</li>\r\n<li>Ammonia Free</li>\r\n<li>PPD Free</li>\r\n<li>Gluten Free</li>\r\n<li>Sulphate Free</li>\r\n<li>Silicone Free</li>\r\n<li>Vegan</li>\r\n        </ul>\r\n        ', '', 'img015.jpg', 1, 5, 2, '39219', 50, 75, 3.8, 32, 10, '2022-02-02'),
-- (37, 'Sericite-Professional-Airshot', 'Sericite Professional Airshot', '\r\n\r\n', '2000W high airflow professional hair dryer\r\nTourmaline and vitamin-infused ceramic heating to protect and care for hair\r\nAnti-static technology diminishes frizz and flyaways\r\nCool Shot button allows for rapid cooling and style setting\r\n3 heat settings and an LED temperature indicator\r\nLightweight and ergonomically designed to reduce wrist pressure\r\nDesigned for professional salon use\r\nOffering sleek styling with a 2000W high airflow, the CLOUD NINE Sericite Professional Airshot Hair Dryer creates a variety of finishes with an ergonomic design that reduces wrist pressure and fatigue. This professional blow-dryer features tourmaline and vitamin-infused ceramic heating elements which delivers a premium level of care and protection to the hair whilst styling. Anti-static technology minimises the amount of negatively charged particles, diminishing frizz and flyaways while adding a glossy shine. With three heat settings, an LED temperature indicator and balanced weight distribution, the Airshot offers a personalised styling experience based on the concerns of each hair type for an enhanced finish. A Cool Shot button rapidly cools and sets the style for a longer lasting result with increased luminosity. Create a multitude of styles in premium comfort with The Airshot Professional Hair Dryer by CLOUD NINE.\r\n', '', '', 'img001.png', 6, 1, 2, '39219', 56, 75, 3.8, 32, 10, '2022-02-02'),
-- (38, 'Dyson Supersonic', 'Dyson Supersonic', '\r\n\r\n', 'The Dyson Supersonic™ hair dryer is engineered to protect hair from extreme heat damage, with fast drying and controlled styling to help increase smoothness by 75%, increase shine by up to 132% and decrease frizz and fly aways by up to 61%.', '', '', 'img003.png', 6, 1, 2, '39219', 35, 75, 3.8, 32, 10, '2022-02-02'),
-- (39, 'PROFESSIONAL ORIGINAL IRON', 'PROFESSIONAL ORIGINAL IRON', '\r\n\r\n\r\nThe Sericite Professional Original Iron features innovative, market-leading technology for completely personalised hair styling. Achieve exceptional, long-lasting results that are kind on the hair with CLOUD NINE.\r\n', '•	7 temperature control options suiting every hair type; from 100-200°C\r\n•	Heat up time of 20 seconds\r\n•	Mineral-infused ceramic plates achieve exceptional results at a lower temperature\r\n•	Floating plate design cushions the impact on hair, minimising drag and breakage\r\n•	Hibernation Mode automatically cools the Iron when not in use for 30 minutes\r\n•	Swivel cord for easy usage\r\n•	Universal voltage, identification chip and a 12 month warranty for peace of mind\r\n•	Designed for professional use\r\nOffering the ultimate experience in heat-styling, the CLOUD NINE Sericite Professional Original Iron is guaranteed to deliver sleek, luxurious and long-lasting results. This professional styling iron features 7 temperature controls from 100-200°C, allowing all hair types the opportunity to smooth, curl, wave or straighten at lower temperatures. Its mineral-infused ceramic plates are designed to lock in moisture, seal the cuticle and minimise damage to the hair\'s natural structure. With a heat up time of 20 seconds, a patented MiCOM technology adjusts the temperature according to thermal sensor calculations, ensuring an even and smooth distribution of heat across the ceramic surface. These plates feature a floating design that cushions the impact on each section of the hair, minimising drag, pinches and breakage. This hair iron features a Hibernation Mode that automatically cools the straightener when not in use for 30 minutes. A swivel cord and protective heat guard add extra comfort and usability to the iron. Based on CLOUD NINE\'S ethos of kinder styling, the Original Iron has revolutionised the heat-styling world, offering limitless styling flexibility with a glossy, healthy finish.\r\n', '', '', 'img005.png', 6, 1, 2, '39219', 40, 75, 3.8, 32, 10, '2022-02-02'),
-- (43, 'Nano Titanium Vented Straightening Iron', 'Nano Titanium Vented Straightening Iron', 'BaBylissPRO Nano Titanium 1-1/2\'\' Vented Straightening Iron is for all hair types, wet or dry, the vents eliminate excess heat so hair is protected.\r\nFeatures\r\n•	Ceramic heaters\r\n•	5 temperature controls\r\n•	Ion generator\r\n•	Heats up to 450 F\r\n•	Ryton housing\r\n•	9 ft swivel cord\r\n•	Limited 4 year manufacturer warranty\r\n\r\n\r\n', 'Benefits\r\n\r\n•	Vents eliminate excess heat providing hair protection\r\n•	For all hair types, and can be used on damp or dry hair\r\n•	Straightens and curls\r\n•	Delivers a smooth and shiny finish with ease\r\n•	Ideal for keratin process applications\r\n', '', '', 'img006.png', 6, 1, 2, '39219', 40, 75, 3.8, 32, 10, '2022-02-02'),
-- (44, 'PLATINUM BLONDE TONING SHAMPOO', 'PLATINUM BLONDE TONING SHAMPOO', 'A strong toning purple shampoo that neutralises brassy undertones in colour-treated blonde hair. Reveal vibrant, revived blonde hues with Fabuloso Platinum Blonde Toning Shampoo by Evo.\r\n\r\n', '\r\n<ul>\r\n        <li>•	New formula designed to neutralise unwanted warmth between salon visits\r\n</li>\r\n        <li>•	Formulated with OLAPLEX Bond Building chemistry\r\n</li>\r\n        <li>•	Restores internal strength and moisture levels</li>\r\n<li>•	Adds incredible shine and manageability Suitable for all hair types; especially chemically treated hair</li>\r\n<li>•	Suitable for blondes, balayage, grey and white hair</li>\r\n<li>•	Vegan, colour cafe, pH balanced and cruelty-free\r\n</li>\r\n<li>•	Free from parabens, sulphates, phosphates, gluten and nuts\r\n</li>\r\n        </ul>\r\n<p>The recommended retail price (RRP) for this item is $49.95.\r\nProtect and repair damaged hair and split-ends with the gentle cleansing and reparative OLAPLEX No.4P Blonde Enhancer Toning Shampoo. This brand new formula is designed to neutralise unwanted warmth between salon visits, revealing an evenly cool tone to all blonde hair types. With the ability to strengthen all types of hair, No.4 leaves it shinier and more manageable with every wash. Using the same patented ingredient as the OLAPLEX professional system, Bis-Aminopropyl Diglycol Dimaleate, No.4 works by finding single sulfur hydrogen bonds and cross-linking them back together to form disulfide bonds. Disulfide bonds are broken through chemical procedures such as colouring, thermal interference like heat and UV damage, and mechanical processes like brushing and combing. With this single active ingredient repairing and reinforcing the hair fibre, the result is stronger, healthier hair with enhanced colour longevity and vibrancy. No.4 Bond Maintenance Shampoo works seamlessly with No.5 Bond Maintenance Conditioner and No.3 Hair Perfector as part of the OLAPLEX 3-4-5 regimen for a professional treatment experience at home. OLAPLEX is colour-safe, vegan, pH balanced and completely free from cruelty, DEA, aldehydes, formaldehyde, silicone, parabens, sulphates, phosphates, gluten and nuts. Join the OLAPLEX revolution for a truly one-of-a-kind solution to restoring the natural texture of hair, boosting its elasticity and transforming its health.\r\n\r\n</p>', '<ul>\r\n        <li>Alcohol Free</li> <li>Paraben Free</li>\r\n<li>Cruelty Free</li>\r\n<li>Ammonia Free</li>\r\n<li>PPD Free</li>\r\n<li>Gluten Free</li>\r\n<li>Sulphate Free</li>\r\n<li>Silicone Free</li>\r\n<li>Vegan</li>\r\n        </ul>\r\n        ', '', 'img020.png', 1, 5, 2, '39219', 50, 75, 3.8, 32, 10, '2022-02-02'),
-- (45, 'PLATINUM BLONDE COLOUR BOOSTING TREATMENT', 'PLATINUM BLONDE COLOUR BOOSTING TREATMENT', 'A platinum blonde coloured hair treatment for blonde hair. Achieve a refreshed, revived and toned colour boost in just 3 minutes with Evo fabuloso Colour Boosting Treatments.\r\n\r\n\r\n', '<ul>\r\n        <li>•	Platinum blonde treatment\r\n</li>\r\n        <li>•	Cationic Hair Dye refreshes and tones colour\r\n</li>\r\n        <li>•	Cetrimonium Chloride and Panthenol soften and condition</li>\r\n        <li>•	Benzophonene-4 protects the cuticle for up to 8 washes</li>\r\n        <li>•	Vegan and cruelty free</li>\r\n        <li>•	Recommended for dull, dry, colour-treated light blonde to blonde hair\r\nEvo fabuloso Platinum Blonde Colour Boosting Treatment provides hair with an instant colour boost and a nourishing treatment to refresh, tone and revive colour in just 3 minutes. Recommended for dull and dry light blonde-blonde hair, this colour boosting treatment uses Cationic Hair Dye to instantly refresh and tone colour-treated hair. This nourishing treatment revives hair by softening and conditioning, with a formulated blend of Cetrimonium Chloride and Panthenol to repair damaged strands. Added Benzophonene-4 protects the hair cuticle so colour is retained for up to 8 washes. This anti-static treatment restores and maintains moisture balance to reduce frizz and provide brilliant shine. Colour Boosting Treatments are an excellent add-on for your clients who want to maintain the intensity of their colour in-between salon visits. To extend the life of colour vibrancy, recommend your clients use Evo fabuloso Colour Boosting Treatment weekly.\r\n</li>\r\n\r\n        </ul>\r\n       ', '<ul>\r\n        <li>Panthenol</li> <li>Quinoa</li>\r\n        </ul>\r\n        <p>\r\n        The original bond builder, OLAPLEX revolutionised professional colour services with its innovative hair rebuilding system. For professional salon use and ongoing at-home maintenance, hair is healthier, stronger and colour is brighter.\r\n        </p>', 'Upon cleansing with Active Shampoo, apply Active Shock Concentrate to scalp and massage gently.\r\nDo not rinse.\r\nUse 3 times per week on alternate days, for a treatment length of 6-9 weeks', 'img030.png', 5, 5, 2, '39219', 70, 75, 3.8, 32, 10, '2022-02-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_item_image`
--

CREATE TABLE `product_item_image` (
  `id` int(6) UNSIGNED NOT NULL,
  `img` varchar(60) NOT NULL,
  `product` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_item_image`
--

-- INSERT INTO `product_item_image` (`id`, `img`, `product`) VALUES
-- (45, 'img027.png', 28),
-- (46, 'img027.png', 28),
-- (47, 'img028.png', 29),
-- (48, 'img028.png', 29),
-- (49, 'img029.webp', 30),
-- (50, 'img029.webp', 30),
-- (51, 'img013.jpg', 33),
-- (52, 'img017.png', 34),
-- (53, 'img015.jpg', 35),
-- (54, 'img015.jpg', 35),
-- (55, 'img017.png', 34),
-- (56, 'img001.png', 37),
-- (57, 'img001.png', 37),
-- (58, 'img003.png', 38),
-- (59, 'img003.png', 38),
-- (60, 'img005.png', 39),
-- (61, 'img005.png', 39),
-- (62, 'img020.png', 44),
-- (63, 'img020.png', 44),
-- (64, 'img006.png', 43),
-- (65, 'img006.png', 43),
-- (66, 'img030.png', 45),
-- (67, 'img030.png', 45);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_size`
--

CREATE TABLE `product_size` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(120) NOT NULL,
  `size__ml` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_size`
--

INSERT INTO `product_size` (`id`, `name`, `size__ml`) VALUES
(1, '30ml', 30),
(2, '250ml', 250),
(3, '300ml', 300),
(4, '500ml', 500),
(5, '1L', 1000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_subcategory`
--

CREATE TABLE `product_subcategory` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `parent` int(6) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_subcategory`
--

INSERT INTO `product_subcategory` (`id`, `name`, `parent`) VALUES
(1, 'Hair Colour Shampoo', 1),
(2, 'Repair Shampoo', 1),
(3, 'Colour Conditioner', 2),
(4, 'Volume Conditioner', 2),
(5, 'Colour Treatments', 3),
(6, 'Hair Clippers', 4),
(7, 'Protein Hair Treatments', 3),
(8, 'Hair Growth Treatments', 3),
(9, 'Hydration Hair Treatments', 3),
(10, 'Scalp Care Shampoo', 1),
(11, 'Cleansing & Clarifying Shampoo', 1),
(12, 'Daily Use', 2),
(13, 'Hair Irons', 4),
(14, 'Curling Irons & Tongs', 4),
(15, 'Hair Dryers', 4),
(16, 'Blades', 5),
(17, 'Scissors', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_type`
--

CREATE TABLE `product_type` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_type`
--

INSERT INTO `product_type` (`id`, `name`) VALUES
(1, 'product'),
(2, 'treatment'),
(3, 'equipment');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category2`
--
ALTER TABLE `category2`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_type` (`type`);

--
-- Chỉ mục cho bảng `product_item`
--
ALTER TABLE `product_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_subcategory` (`subcategory`),
  ADD KEY `FK_product_brand` (`brand`),
  ADD KEY `FK_product_size` (`size`);

--
-- Chỉ mục cho bảng `product_item_image`
--
ALTER TABLE `product_item_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_item_image` (`product`);

--
-- Chỉ mục cho bảng `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_subcategory`
--
ALTER TABLE `product_subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_category_parent` (`parent`);

--
-- Chỉ mục cho bảng `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `category2`
--
ALTER TABLE `category2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product_brand`
--
ALTER TABLE `product_brand`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product_item`
--
ALTER TABLE `product_item`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `product_item_image`
--
ALTER TABLE `product_item_image`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product_subcategory`
--
ALTER TABLE `product_subcategory`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `FK_product_type` FOREIGN KEY (`type`) REFERENCES `product_type` (`id`);

--
-- Các ràng buộc cho bảng `product_item`
--
ALTER TABLE `product_item`
  ADD CONSTRAINT `FK_product_brand` FOREIGN KEY (`brand`) REFERENCES `product_brand` (`id`),
  ADD CONSTRAINT `FK_product_size` FOREIGN KEY (`size`) REFERENCES `product_size` (`id`),
  ADD CONSTRAINT `FK_product_subcategory` FOREIGN KEY (`subcategory`) REFERENCES `product_subcategory` (`id`);

--
-- Các ràng buộc cho bảng `product_item_image`
--
ALTER TABLE `product_item_image`
  ADD CONSTRAINT `FK_product_item_image` FOREIGN KEY (`product`) REFERENCES `product_item` (`id`);

--
-- Các ràng buộc cho bảng `product_subcategory`
--
ALTER TABLE `product_subcategory`
  ADD CONSTRAINT `FK_category_parent` FOREIGN KEY (`parent`) REFERENCES `product_category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
