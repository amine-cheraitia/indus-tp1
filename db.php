<?php

class DB
{

    private $bdd;

    public function __construct()
    {
        /*         try {
            // Informations de connexion à la base de données
            $host = '127.0.0.1'; // Adresse du serveur MySQL
            $dbname = 'test'; // Nom de la base de données
            $username = 'root'; // Nom d'utilisateur MySQL
            $password = ''; // Mot de passe MySQL

            // Création de l'instance PDO
            $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

            // Gestion des erreurs PDO
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Connexion réussie à la base de données";
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        } */
        $host = '127.0.0.1'; // Adresse du serveur MySQL
        $dbname = 'test'; // Nom de la base de données
        $username = 'root'; // Nom d'utilisateur MySQL
        $password = ''; // Mot de passe MySQL

        // Création de l'instance PDO
        $this->bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

        // Gestion des erreurs PDO
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    public function insertQuery(string $nom, string $prenom, string $adresse)
    {
        try {
            $query = "INSERT INTO contacte (nom, prenom, adresse) VALUES (?, ?, ?)";
            $stmt = $this->bdd->prepare($query);
            $stmt->execute([$nom, $prenom, $adresse]);
            echo "Données insérées avec succès.";
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion : " . $e->getMessage();
        }
    }
}
