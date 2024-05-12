<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="suppression.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Document</title>
</head>
<body>

    <header class="header">
        <div class="logo">
        <a href="Home.php"><img src="Logoimg.png" alt=""></a>
        </div>

        <nav class="navbar">
        <a href="Home.php">Accueil</a>
        <a href="Studentlist.php">Liste des etudiants</a>
        <a href="Ajout.php">Ajout</a>
        <a href="suppression.php">Suppression </a>
        <a href="recherche.php"><i class='bx bx-search-alt'></i></a>
    </nav>
    
    </header>
    
    <div class="titre">
        <h1>Supprimer un  <br><span style ="color:#e25a8a;">etudiant <i class='bx bx-user-minus'></i></span></h1>
        
    </div>

    <div class="container">
    <form method="GET" action="suppression.php">
        <h3>Quel etudiant souhaitez vous supprimer (ID): </h3>
        <label for="supr"></label>
        <input type="text" id="supr" name="supr">
        <button type="submit">Supprimer</button>
    </form>
    </div>

    <div class="resultat">
    <?php
        if(isset($_GET['supr'])) {
            $id = $_GET['supr'];
            $mysqli = new mysqli('localhost', 'root', 'Passer2024', 'projet_php');
            if ($mysqli->connect_error) {
                die('Erreur de connexion : ' . $mysqli->connect_error);
            }
            $query = "DELETE FROM students WHERE id = $id";
            $mysqli->query($query);
            if ($mysqli->affected_rows > 0) {
                echo "Étudiant supprimé avec succès";
            } else {
                echo "Aucun étudiant trouvé avec l'ID : $id";
            }
            $mysqli->close();
        }
        ?>
    </div>
    
</body>
</html>