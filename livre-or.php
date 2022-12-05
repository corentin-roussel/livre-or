<?php
    include '_db/connect.php';


    if($_SESSION != NULL) { //si login de session et égale a admin on peut accéder a la page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '_include/head.php' ?>
    <title>Livre d'or</title>
</head>
<body class="bg-img">
    <header>
        <?php include '_include/header.php'?>
    </header>
    <main>
        <article class="main-index">
            <h1 class="title main-index">Livre</h1>
        </article>
        <article class="flex-table">
            <?php
                // requête pour tout sélectionner dans la table utilisateurs
                $req =  ("SELECT * FROM utilisateurs INNER JOIN commentaires ON utilisateurs.id = commentaires.id_utilisateur;");
                $req_user = mysqli_query($mysqli, $req);
                // récuperation des valeurs dans un tableau associatif avec les id et nom de colonne en clé et utilisation de assoc pour récuperer uniquement les clés en noms de colonnes

                foreach($req_user as $key => $values) {
                    echo '<p id="comment">Fait le ' . $values['date'] . ' par ' . $values['login'] . '</p><br/>';
                    
                    echo '<p id="comment">' . $values['commentaire'] . '</p><br/>' ;
                }
            ?>
        </article>
    </main>
    <footer>
        <?php include '_include/footer.php' ?>
    </footer>
</body>
</html>

<?php } else {
    header("Location: index.php"); //sinon on est redirigés vers la page index
} 
?>