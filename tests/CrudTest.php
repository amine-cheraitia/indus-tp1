<?php

use PHPUnit\Framework\TestCase;

class CrudTest extends TestCase
{
    private $bdd;

    public function setUp(): void
    {
        // Informations de connexion à la base de données (à personnaliser)
        $host = '127.0.0.1';
        $dbname = 'test';
        $username = 'root';
        $password = '';

        $this->bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function testCreate()
    {
        $query = "INSERT INTO contacte (nom, prenom, adresse) VALUES (?, ?, ?)";
        $stmt = $this->bdd->prepare($query);

        // Enregistrement à insérer
        $nom = "NouveauNom";
        $prenom = "NouveauPrenom";
        $adresse = "NouvelleAdresse";

        $stmt->execute([$nom, $prenom, $adresse]);
        $this->assertEquals(1, $stmt->rowCount()); // Vérification de l'insertion
    }

    public function testRead()
    {
        // Effectuez une requête SELECT pour lire les enregistrements
        $query = "SELECT * FROM contacte";
        $stmt = $this->bdd->query($query);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->assertGreaterThan(0, count($result)); // Vérification qu'il y a des enregistrements
    }

    public function testUpdate()
    {
        $query = "UPDATE contacte SET nom = ?, prenom = ? WHERE id = ?";
        $stmt = $this->bdd->prepare($query);

        // Nouvelles valeurs pour la mise à jour
        $nom = "NouveauNom";
        $prenom = "NouveauPrenom";
        $id = 8; // Remplacez par l'ID de l'enregistrement à mettre à jour

        $stmt->execute([$nom, $prenom, $id]);
        $this->assertEquals(1, $stmt->rowCount()); // Vérification de la mise à jour
    }

    public function testDelete()
    {
        $query = "DELETE FROM contacte WHERE id = ?";
        $stmt = $this->bdd->prepare($query);

        $id = 9; // Remplacez par l'ID de l'enregistrement à supprimer

        $stmt->execute([$id]);
        $this->assertEquals(1, $stmt->rowCount()); // Vérification de la suppression
    }
}
