<?php
function afficheIndex($data)
{
?>
<div class="wrapper">
        <div class="align">
            <h1>Liste des concerts</h1>
            <a href="formCreation.php" class="ajouter">Ajouter un concert</a>
        </div>
        <div class="tableau">
        <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Lieu</th>
                <th>Groupe</th>
                <th>Note</th>
                <th>Supprimer</th>
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
                <th>Date</th>
                <th>Lieu</th>
                <th>Groupe</th>
                <th>Note</th>
                <th>Supprimer</th>
            </tr>
        
        </tfoot>
       
        </table>

    </div>
</div>
    
</body>
</html>
<?php }?>
