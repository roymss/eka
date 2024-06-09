<?php 

require 'inc/function.php';

$produk = query("SELECT * FROM produk");

if (isset($_POST["cari"])) {
    $produk = cari($_POST["keyword"]);
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="css/eka.css?=<?= time(); ?>">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Foodies</title>
</head>

<body class="bg-light">

    <!-- Navbar -->

    <?php include('assets/partikels/navbar.php'); ?>

    <!-- Main Page -->

    <?php include('assets/partikels/mainpage.php'); ?>

    <!-- Card -->

    <?php include('assets/partikels/card.php'); ?>

    <!-- Popular Dishes -->

    <?php include('assets/partikels/populer.php'); ?>

    <!-- Our Kitchen -->

    <?php include('assets/partikels/kitchen.php'); ?>

    <!-- Newsletter -->

    <?php include('assets/partikels/news.php'); ?>

    <!-- Footer -->

    <?php include('assets/partikels/footer.php'); ?>






    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>