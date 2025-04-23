<?php
namespace Tests\Models;

use App\Models\LigneBonLivraisonModel;
use App\Models\BonLivraisonModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

class LigneBonLivraisonModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new LigneBonLivraisonModel();
    }

    // Test d'insertion d'une ligne de bon de livraison
    public function testInsertLigneBonLivraison()
    {
        // Créer un bon de livraison fictif pour la relation
        $bonLivraisonData = [
            'status' => 'En cours',
            'delivery_date' => '2024-01-01',
        ];
        $bonLivraisonModel = new BonLivraisonModel();
        $bonLivraisonId = $bonLivraisonModel->insert($bonLivraisonData);

        // Données d'insertion de la ligne de bon de livraison
        $data = [
            'id_bonlivraison' => $bonLivraisonId,
            'designation' => 'Produit Test',
            'quantity' => 5,
        ];

        // Insertion de la ligne de bon de livraison
        $id = $this->model->insertLigneBonLivraison($data);
        
        // Vérification que l'ID est numérique
        $this->assertIsNumeric($id);

        // Récupérer l'élément inséré
        $ligne = $this->model->getLigneBonLivraison($id);

        // Vérifier que l'élément a été inséré et correspond aux données
        $this->assertNotNull($ligne);
        $this->assertEquals('Produit Test', $ligne['designation']);
        $this->assertEquals(5, $ligne['quantity']);
        $this->assertEquals($bonLivraisonId, $ligne['id_bonlivraison']);
    }

    // Test de récupération des lignes pour un bon de livraison
    public function testGetLignesBonLivraison()
    {
        // Créer un bon de livraison fictif pour la relation
        $bonLivraisonData = [
            'status' => 'En cours',
            'delivery_date' => '2024-01-01',
        ];
        $bonLivraisonModel = new BonLivraisonModel();
        $bonLivraisonId = $bonLivraisonModel->insert($bonLivraisonData);

        // Insertion de lignes de bon de livraison
        $this->model->insertLigneBonLivraison([
            'id_bonlivraison' => $bonLivraisonId,
            'designation' => 'Produit 1',
            'quantity' => 5,
        ]);
        $this->model->insertLigneBonLivraison([
            'id_bonlivraison' => $bonLivraisonId,
            'designation' => 'Produit 2',
            'quantity' => 3,
        ]);

        // Vérifier que les lignes ont été insérées
        $lignes = $this->model->getLignesBonLivraison($bonLivraisonId);
        $this->assertCount(2, $lignes);
    }
}
