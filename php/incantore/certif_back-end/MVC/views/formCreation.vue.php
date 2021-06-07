<?php 

function afficheFormCreation()
{
?>
<div class="wrapper">
        <div class="align">
            <h1>Nouveau concert</h1>
        </div>
        <div class="tableau">
            <form action="../backend/creation.php" method="post">
                <div class="container">
                    <div>
                        <div class="column">
                            <label for="lieu">Lieu</label>
                            <select name="lieu">
                                <option value ="woodstock">Woodstock</option>
                                <option value ="paris">Paris</option>
                            </select>
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
<? } ?>
