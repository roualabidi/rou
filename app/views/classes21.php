<?php
require_once '../config/config.php'; // Inclusion du fichier de configuration
require_once '../controllers/UserController.php'; // Chemin vers UserController.php

// Requête pour récupérer les recettes
$sql = "SELECT id, titre, image, calories, rating FROM recipes";
$stmt = $pdo->prepare($sql); // Utilise $pdo au lieu de $db
$stmt->execute();
$recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cooking - Restaurants Category Bootstrap Responsive Website Template - Classes : W3Layouts</title>
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
                        <li class="nav-item">
    <form method="POST" action="classes.php">
        <input type="hidden" name="action" value="logout">
        <button type="submit" class="btn btn-link nav-link">Logout</button>
    </form>
</li>
                    </ul>
                    
                </div>
                <!-- toggle switch for light and dark theme -->
                <div class="cont-ser-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>
    <!-- //header -->

    <!-- inner banner -->
   
    <!-- //inner banner -->

    <!-- courses section -->
    <section class="w3l-courses py-5" id="courses">
    <div class="container py-lg-5 py-md-4 py-2">
        <h5 class="sub-title text-center">Chef</h5>
        <h3 class="title-style text-center">My recipes</h3>
        <div class="row justify-content-center">
<!-- Affichage des recettes dans la structure CSS existante -->
<div class="row">
    <?php foreach ($recipes as $recipe): ?>
        <div class="col-lg-4 col-md-6 item mt-5">
            <div class="card">
                <div class="card-header p-0 position-relative">
                    <a href="../../app/views/index<?php echo $recipe['id']; ?>.html" class="zoom d-block">
                        <img class="card-img-bottom d-block" src="../../public/assets/images/<?php echo htmlspecialchars($recipe['image']); ?>" alt="Card image cap">
                    </a>
                    <div class="post-pos">
                        <!-- Lien de mise à jour avec le titre de la recette -->
                        <a href="edit_recette.php?id=<?php echo $recipe['id']; ?>" class="receipe blue">Update</a>
                        <!-- Lien de suppression avec l'ID de la recette -->
                        <a href="delete_recette.php?id=<?php echo $recipe['id']; ?>" class="receipe yellow ml-2" onclick="return confirm('Are you sure you want to delete this recipe?')">Delete</a>
                    </div>
                </div>
                <div class="card-body course-details">
                    <div class="price-review d-flex justify-content-between mb-1 align-items-center">
                        <ul class="rating-star">
                            <?php for ($i = 0; $i < 5; $i++): ?>
                                <?php if ($i < $recipe['rating']): ?>
                                    <li><span class="fas fa-star"></span></li>
                                <?php else: ?>
                                    <li><span class="fas fa-star-o"></span></li>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                    </div>
                    <!-- Titre et lien de la recette -->
                    <a href="../../app/views/index<?php echo $recipe['id']; ?>.html" class="course-desc"><?php echo htmlspecialchars($recipe['titre']); ?></a>
                    <div class="course-meta mt-4">
                        <div class="meta-item course-lesson">
                            <span class="fas fa-fire"></span>
                            <span class="meta-value"> <?php echo $recipe['calories']; ?> kcal</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
