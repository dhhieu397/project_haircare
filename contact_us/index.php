<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <base href="/project_haircare/" target="_blank">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <link href="css/style.css" rel="stylesheet"></link>
    <link href="css/main.css" rel="stylesheet"></link>

    <title>Hair care</title>
</head>

<body>

    <?php include __DIR__."/../layout/_header.php"; ?>

    <section class="page-content">
        <div class="top-nav small-text text-secondary">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="" onclick="return navigate('/')">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="" onclick="return navigate('contact_us')">Contact Us</a>
                </li>

            </ol>
            </nav>
        </div>
    </section>

    <section class="banner2" >
        <div class="row-banner2 row-banner-contact-us banner-contact-us">
            <div class="content2">
                <h3>CONTACT US</h3>
            </div>
        </div>

    </section>

    <section class="page-content">
        <div class="shop-info row">
            <div class="col-12">
                <h1 class="title">HEAD OFFICE</h1>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4 address">
                <h3>Head Office</h3>
                <p>123 Truong Chinh Street, Hoang Mai District, Hanoi</p>
                <a class="w-100 btn button unlinked button-theme--primary u-focus-keyboard--button" href="tel:1300437436" target="_self">
                    <span class="button__layout">
                        <i class="fas fa-phone"></i>
                        <span class="button__label">
                            1300 437 436
                        </span>
                    </span>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <h3>Opening Hours</h3>
                <table class="opening-hours">
                    <tr></tr>
                    <tr>
                        <td>MONDAY</td>
                        <td><span>8:30am -</span><span>5:00pm</span></td>
                    </tr>
                    <tr>
                        <td>TUESDAY</td>
                        <td><span>8:30am -</span><span>5:00pm</span></td>
                    </tr>
                    <tr>
                        <td>WEDNESDAY</td>
                        <td><span>8:30am -</span><span>5:00pm</span></td>
                    </tr>
                    <tr>
                        <td>THURSDAY</td>
                        <td><span>8:30am -</span><span>5:00pm</span></td>
                    </tr>
                    <tr>
                        <td>FRIDAY</td>
                        <td><span>8:30am -</span><span>5:00pm</span></td>
                    </tr>
                    <tr>
                        <td>SATURDAY</td>
                        <td>Closed</td>
                    </tr>
                    <tr>
                        <td>SUNDAY</td>
                        <td>Closed</td>
                    </tr>
                </table>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-4">
                <iframe style="width: 100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.8515771970883!2d105.83492701440679!3d20.99858589418479!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac7b18ad5373%3A0x8592440c243ef550!2zMTIzIMSQLiBUcsaw4budbmcgQ2hpbmgsIFBoxrDGoW5nIExp4buHdCwgVGhhbmggWHXDom4sIEjDoCBO4buZaSwgVmlldG5hbQ!5e0!3m2!1sen!2sin!4v1644606489147!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

        </div>
    </section>
    <script src="js/main.js"></script>

</body>

</html>