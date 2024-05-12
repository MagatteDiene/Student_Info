<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recherche.css">
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
        <h1>Rechercher un <br><span style ="color:#e25a8a;"> Etudiant <i class='bx bx-search-alt'></i></span></h1>
    </div>

    <div class="container">
    <form method="GET" action="recherche.php">
        <h3>Veuillez saisir l'ID de l'etudiant a rechercher: </h3>
        <label for="search"></label>
        <input type="text" id="search" name="search">
        <button type="submit">Rechercher</button>
    </form>
    </div>

    <div class="resultat">
    <?php
$mysqli = new mysqli('localhost', 'root', 'Passer2024', 'projet_php');
if ($mysqli->connect_error) {
    die('Erreur de connexion : ' . $mysqli->connect_error);
}

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM students WHERE id = '$search'";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        echo '<h3>Résultat de la recherche :</h3>';
        echo '<table border="1">';
        echo '<tr><th>Nom</th><th>Prenom</th><th>Cours</th><th>Statut</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['nom'] . '</td>';
            echo '<td>' . $row['prenom'] . '</td>';
            echo '<td>' . $row['cours'] . '</td>';
            echo '<td>' . $row['statut'] . '</td>'; 
            echo '</tr>';
            echo"<td><a href='modifier.php?id=" . $row['id'] . "'><i class='bx bx-pencil'></i></a></td>";

            
        }
        echo '</table>';
        
    } else {
        echo 'Aucun résultat trouvé pour la recherche : ' . $search;
    }
}


$mysqli->close();
?>
    </div>

</body>


</html>