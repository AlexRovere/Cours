<?php 
require "../backend/connexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Blog</title>
</head>
<body>
<div class="wrapper">
        <div class="align">
            <h1>Liste d'articles</h1>
            <a href="formCreation.php" class="ajouter">Créer</a>
        </div>
        <div class="tableau">
        <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Date de création</th>
                <th>Statut</th>
                <th>Catégorie</th>
                <th>Tags</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $data) 
            {
                ?>
                <tr>
                    <td><?=$data['date']?></td>
                    <td><?=$data['lieu']?></td>
                    <td><?=$data['groupe']?></td>
                    <td><?=$data['note']?></td>
                    <td><a href="../backend/supprimer.php?id=<?= $data['id_concert']?>" class="supprimer">Supprimer</a></td>
                </tr>
            <?php 
            }
            ?>
        
        </tbody>
        <tfoot>
        
            <tr>
                <th>Titre</th>
                <th>Date de création</th>
                <th>Statut</th>
                <th>Catégorie</th>
                <th>Tags</th>
            </tr>
        
        </tfoot>
       
        </table>

    </div>
</div>
    
</body>
</html>
