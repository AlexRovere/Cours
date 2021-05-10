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
            <h1>Créer un article</h1>
        </div>
        <div class="tableau">
            <form action="../backend/creation.php" method="post">
                <div class="container">
                    <div>
                        <div class="column">
                            <label for="titre">Titre</label>
                           <input name="titre"></input>
                        </div>
                        <div class="column">
                            <label for="groupe">Groupe</label>
                            <select name="groupe">
                                <option value="acdc">ACDC</option>
                                <option value="sevendust">Sevendust</option>
                            </select>
                        </div>
                    </div>
                    <div>    
                        <div class="column">
                            <label for="date">Date</label>
                            <input type="date" name="date">
                        </div>
                        <div class="column">
                            <label for="note">Note</label>
                            <select name="note">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>    
                    </div>    
                </div>               
                <button class="valider" type="submit">Valider</button>
                
            </form>

       

    </div>
</div>
    
</body>
</html>
