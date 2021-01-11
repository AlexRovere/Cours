<html>
<head>

<style type="text/css">
<!--
.Style4 {font-size: 12px}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="formulaire-post.php">
  <table width="420" border="0">
   
    <tr>
      <td>ID</td>
      <td><label>
        <input name="id" type="text" id="id" />
      </label></td>
    </tr>
    <tr>
      <td>Nom</td>
      <td><label>
        <input name="nom" type="text" id="nom" />
      </label></td>
    </tr>
    <tr>
      <td>Prix</td>
      <td><label>
        <input name="prix" type="text" id="prix" />
      </label></td>
    </tr>
    <tr>
      <td>Description</td>
      <td><label>
        <input name="description" type="text" id="description" />
      </label></td>
    </tr>
    <tr>
      <td colspan="2"><label>
        <input name="nouveau" type="reset" id="nouveau" value="Nouveau" />
        <input name="ajouter" type="submit" id="ajouter" value="Ajouter" />
        <input name="modifier" type="submit" id="modifier" value="Modifier" />
        <input name="supprimer" type="submit" id="supprimer" value="Supprimer" />
      </label></td>
    </tr>
  </table>
  <p> </p>
</form>

</body>
</html>