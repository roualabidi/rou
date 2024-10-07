<?php
require_once '../config/config.php'; // Inclusion du fichier de configuration

// Requête pour récupérer toutes les recettes depuis la base de données
$sql = "SELECT * FROM recipes";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$recettes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cooking - Recipes</title>
    <!-- Google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="../../public/assets/css/style-starter.css">
</head>

<body>
    <!-- header -->
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="index.php">
                    Cooking<i class="fas fa-bread-slice ms-1"></i>
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../../public/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="classes.html">Recipes</a>
                        </li>
                    </ul>
                    <form action="#search" method="GET" class="d-flex search-header ms-lg-2">
                        <input class="form-control" type="search" placeholder="Enter Keyword..." aria-label="Search"
                            required>
                        <button class="btn btn-style" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </nav>
        </div>
    </header>
    <!-- //header -->

    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-5 pb-sm-4 pb-2">
                <h4 class="inner-text-title font-weight-bold pt-5">Cooking Courses</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>Recipes</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //inner banner -->

    <!-- courses section -->
    <section class="w3l-courses py-5" id="courses">
        <div class="container py-lg-5 py-md-4 py-2">
            <h5 class="sub-title text-center">Our Cooking Classes</h5>
            <h3 class="title-style text-center">Popular Courses</h3>
            <div class="row justify-content-center">
                
                <?php foreach ($recettes as $recette): ?>
                <div class="col-lg-4 col-md-6 item mt-5">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <a href="recette_detail.php?id=<?= $recette['id'] ?>" class="zoom d-block">
                                <img class="card-img-bottom d-block" src="../../public/assets/images/<?= htmlspecialchars($recette['image']) ?>" alt="Recette image">
                            </a>
                        </div>
                        <div class="card-body course-details">
                            <div class="price-review d-flex justify-content-between mb-1 align-items-center">
                                <ul class="rating-star">
                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                        <li><span class="fas fa-star<?= $i < $recette['rating'] ? '' : '-o' ?>"></span></li>
                                    <?php endfor; ?>
                                </ul>
                            </div>
                            <a href="recette_detail.php?id=<?= $recette['id'] ?>" class="course-desc">
                                <?= htmlspecialchars($recette['titre']) ?>
                            </a>
                            <div class="course-meta mt-4">
                                <div class="meta-item course-lesson">
                                    <span class="fas fa-fire"></span>
                                    <span class="meta-value"> <?= htmlspecialchars($recette['calories']) ?> kcal</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
    <!-- //courses section -->

</body>

</html>
