<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
    <link rel="stylesheet" href="Studentlist.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<header class="header">
    <div class="logo">
        <a href="Home.php"><img src="Logoimg.png" alt=""></a>
    </div>
    <nav class="navbar">
        <a href="Home.php">Accueil</a>
        <a href="Studentlist.php">Liste des étudiants</a>
        <a href="Ajout.php">Ajout</a>
        <a href="suppression.php">Suppression</a>
        <a href="recherche.php"><i class='bx bx-search-alt'></i></a>
    </nav>
</header>
<div class="titre">
    <h1>Liste des <br><span style ="color:#e25a8a;">Étudiants Enregistrés</span></h1>
</div>
<div class="studentlist">
    <?php
    $mysqli = new mysqli('localhost', 'root', 'Passer2024', 'projet_php');
    if ($mysqli->connect_error) {
        die('Erreur de connexion : ' . $mysqli->connect_error);
    }

    $query = "SELECT id, nom, prenom, cours, statut FROM students";
    $result = $mysqli->query($query);
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Cours suivi</th><th>Statut</th><th>Modifier</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nom'] . "</td>";
            echo "<td>" . $row['prenom'] . "</td>";
            echo "<td>" . $row['cours'] . "</td>"; 
            echo "<td>" . $row['statut'] . "</td>"; 
            echo "<td><a href='modifier.php?id=" . $row['id'] . "'><i class='bx bx-pencil'></i></a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Aucun étudiant trouvé.";
    }

    $mysqli->close();
    ?>
</div>

</body>
</html>

</div>
