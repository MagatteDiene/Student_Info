<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un étudiant</title>
    <link rel="stylesheet" href="modifier.css">
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
        <h1>Modifier un <br><span style ="color:#e25a8a;">Étudiant</span></h1>
    </div>

    <div class="container">
        <?php
        $mysqli = new mysqli('localhost', 'root', 'Passer2024', 'projet_php');
        if ($mysqli->connect_error) {
            die('Erreur de connexion : ' . $mysqli->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $statut = $_POST["statut"];
            $cours = $_POST["cours"];

            $query = "UPDATE Students SET nom='$nom', prenom='$prenom', statut='$statut', cours='$cours' WHERE id='$id'";
            if ($mysqli->query($query) === TRUE) {
                header("Location: Studentlist.php");
                
            } else {
                echo "Erreur lors de l'enregistrement des modifications : " . $mysqli->error;
            }
        } else {
            $id = $_GET["id"];
            $query = "SELECT id, nom, prenom, statut FROM students WHERE id = $id";
            $result = $mysqli->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" value="<?php echo $row['nom']; ?>" required><br>

                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" value="<?php echo $row['prenom']; ?>" required><br>

                    <label for="cours">Cours suivi:</label>
                    <select id="cours" name="cours" required>
                        <option value="JAVA">JAVA</option>
                        <option value="PHP">PHP</option>
                        <option value="JAVASCRIPT">JAVASCRIPT</option>
                        <option value="MSI">MSI</option>
                        <option value="PYTHON">Python</option>
                        
                    </select><br>
                    <label for="statut">Statut :</label>
                    <select id="statut" name="statut" required>
                        <option value="Non-Inscrit"<?php if ($row['statut'] == "Non-Inscrit") echo " selected"; ?>>Non-Inscrit</option>
                        <option value="Inscrit"<?php if ($row['statut'] == "Inscrit") echo " selected"; ?>>Inscrit</option>
                    </select><br>

                    <button type="submit" class="btn">Enregistrer les modifications</button>
                </form>
                <?php
            } else {
                echo "Aucun étudiant trouvé avec l'ID : $id";
            }
        }

        
        $mysqli->close();
        ?>
    </div>
</body>
</html>
