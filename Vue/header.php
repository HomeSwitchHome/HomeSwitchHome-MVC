<?php require_once("config.php"); ?>

<div id="menu-wrapper">
       
        <div id="menu" class="container">
       
                <ul>
       
                        <li><a href="index.php"><img src="logo2.png" height="40" width="40" id="logo2"></a></li>
                        <li><a href="#">Forum</a></li>
                        <li><a href="#">Logements</a></li>
 
<?php
       
        if(!isConnected()) {
                echo "<li><a href=\"inscription.php\">Inscription</a></li>";
                echo "<li><a href=\"login.php\">Connexion</a></li>"; }
 
        else {
                echo "<li><a href=\"profil.php\">Profil</a></li>";
                echo "<li><a href=\"logout.php\">Déconnexion</a></li>"; }
 
?>
 
                        <li><a href="index.php"><img src="logo2.png" height="40" width="40" id="logo2"></a></li>
                </ul>
       
        </div>
 
</div>