<?php
require_once '../config/config.php'; // Inclusion du fichier de configuration
require_once '../controllers/UserController.php'; // Inclusion du contrôleur utilisateur

// Vérifie si l'ID de la recette est fourni dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Requête pour récupérer les informations de la recette
    $sql = "SELECT * FROM recipes WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $recette = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$recette) {
        die('Recette non trouvée');
    }
} else {
    die('ID de recette non spécifié');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Recipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .main {
            height: 100vh;
            background: url('https://images.pexels.com/photos/1640774/pexels-photo-1640774.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') no-repeat center center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
            border-radius: 1rem;
        }
    </style>
</head>
<body>
<div class="main">
    <div class="container">
        <form method="POST" enctype="multipart/form-data" action="update_recette.php?id=<?php echo $recette['id']; ?>">
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="h6 mb-4">Modifier la Recette</h3>
                    <div class="mb-3">
                        <label class="form-label">Titre</label>
                        <input type="text" name="title" value="<?= htmlspecialchars($recette['titre']) ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3" required><?= htmlspecialchars($recette['description']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ingrédients</label>
                        <textarea name="ingredients" class="form-control" rows="3" required><?= htmlspecialchars($recette['ingredients']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Étapes</label>
                        <textarea name="steps" class="form-control" rows="3" required><?= htmlspecialchars($recette['etapes']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Calories</label>
                        <input type="number" name="calories" class="form-control" value="<?= htmlspecialchars($recette['calories']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image de la Recette</label>
                        <input class="form-control" type="file" name="image" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
