<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajout</title>
    <link rel="stylesheet" href="ajout.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


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
        <h1>Ajouter un nouvel <br><span style ="color:#e25a8a;">etudiant <i class='bx bx-user-plus'></i></span></h1>
        
    </div>

    <div class="container">
        
      <form method="POST"  action="Ajout.php">
        <h2>Information</h2>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>
        <br>

        <label for="cours">Cours Suivi :</label>
        <select id="cours" name="cours">
            <option value="java">Java</option>
            <option value="PHP">PHP</option>
            <option value="Javascript"> Javascript</option>
            <option value="MSI"> MSI</option>
            <option value="Python"> Python</option>
        </select>

        <label for="statut">Statut :</label>
        <select id="statut" name="statut">
          <option value="Inscrit">Inscrit</option>
            <option value="Non-Inscrit">Non-inscrit</option>
            
        </select>
    <br>
    <button type="submit" class="btn" >Ajouter</button>
        </form>
    </div>

</body>

<?php
$mysqli = new mysqli('localhost', 'root', 'Passer2024', 'projet_php');
if ($mysqli->connect_error) {
    die('Erreur de connexion : ' . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $cours = $_POST['cours'];
    $statut = $_POST['statut'];

    $query = "INSERT INTO students (nom,prenom, cours, statut) VALUES ('$nom','$prenom', '$cours', '$statut')";
    if ($mysqli->query($query) === TRUE) {
        header("Location: Studentlist.php");
        exit;
    } else {
        echo "Erreur lors de l'ajout de l'étudiant : " . $mysqli->error;
    }
}

$mysqli->close();
?>
</html>