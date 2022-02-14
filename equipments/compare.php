<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <base href="/project_haircare/" target="_blank">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="css/style.css" rel="stylesheet"></link>
    <link href="css/sidebar.css" rel="stylesheet"></link>
    <link href="css/main.css" rel="stylesheet"></link>

    <title>Hair care</title>
</head>

<body>

<?php include __DIR__."/../layout/_header.php"; ?>

<section class="page-content">
    <div class="top-nav p-2 small-text text-secondary">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="" onclick="return navigate('/')">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">
                <a href="" onclick="return navigate('equipments')">Equipments</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                Compare
            </li>
        </ol>
        </nav>
    </div>
</section>

<div class="container">
<?php
    include __DIR__.'/../layout/components/_compare.php';
?>
</div>

<script>
    <?php
        echo "var CURRENT_URL='".$_SERVER['PHP_SELF']."';\n";
    ?>
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/main.js"></script>

</body>
