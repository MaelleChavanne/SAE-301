<?php
require_once '../admin_config.php';
require_once 'evenment.php';
require_once 'database.php';


// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_evenement = $_POST['nom'] ?? null; 

    $database = new Database();
    $db = $database->getConnection();

    // Préparez la requête pour supprimer l'événement
    $sql = "DELETE FROM evenement WHERE nom = :nom";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':nom', $nom_evenement);

    if ($stmt->execute()) {
        echo "L'événement a été supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'événement.";
    }
}

?>
