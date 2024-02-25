<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Important meta tags-->
  <title>Travelia - Explore The World</title>
  <meta name="title" content="Travelia - Explore The World">
  <meta name="description" content="This is a travel html template">
  <!--Favicon for the website-->
  <link rel="shortcut icon" href="/images/favicon.svg" type="image/svg+xml">
  <!--Google font and material icon links-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <!--Custom CSS style sheet-->
  <link rel="stylesheet" href="/style/style.css">
  <!--Preload images-->
</head>
  <body>
    <!--Preloader-->
    <div class="preloader" data-preloader>
      <div class="preloader-inner">
        <img src="/images/preloader.svg" width="50" height="50" alt="loading" class="img">
      </div>
    </div>
    <!--Header-->
    <?php
    include("./view/templates/header.php");
    ?>
    <!--Custom JavaScript script-->
    <script src="/script/script.js"></script>
    <script src="/view/scripts/header.js"></script>
  </body>
</html>