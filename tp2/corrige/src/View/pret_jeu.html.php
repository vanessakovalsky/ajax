Selection de l'utilisateurs
<form id="pret_jeu">
  <select id="user_select" onchange="updateListeJeu(this)">
<?php
foreach($reponse_liste_user as $user){
  ?>
  <option value="<?php echo $user['id'];?>"><?php echo $user['username'];?></option>
  <?php
}
  ?>
</select>
<select id="jeu_select">

</select>
</form>