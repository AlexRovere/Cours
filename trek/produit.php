<?php 
include("header.php")
?>

<h1>Liste de nos produits en ligne</h1>

<h2>Chaussures</h2>

<div class="article">
<article>
<img class="image_produit" src="images/chaussure.jpeg">
<p><button type="submit" class="panier" >Ajouter au panier</button></p>
<label for="quantity">Quantité:</label>
<input type="number" class="quantity" name="quantity" placeholder = "0" required>	
<p>Prix : 50 €</p>
</article>

<article>
	<img class="image_produit" src="images/chaussure2.jpeg">
	<p><button type="submit" class="panier" >Ajouter au panier</button></p>
	<label for="quantity">Quantité:</label>
	<input type="number" class="quantity" name="quantity" placeholder = "0" required>	
	<p>Prix : 150 €</p>
</article>
</div>

<?php 
include("footer.php")
?>