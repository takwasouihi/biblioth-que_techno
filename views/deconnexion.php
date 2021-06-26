<?php
session_start();
session_destroy();
header("Location:connexion.php");
//echo 'Vous êtes déconnecté. <a href="./connexion.php">Se connecter ?</a>';