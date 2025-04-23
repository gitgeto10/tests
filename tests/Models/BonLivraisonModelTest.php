<?php
namespace Tests\Models;

use App\Models\BonLivraisonModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

class BonLivraisonModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new BonLivraisonModel();
    }

    public function testFindAllBonLivraisons()
    {
        $result = $this->model->findAll();
        $this->assertIsArray($result);
    }

    public function testInsertBonLivraison()
    {
        $data = [
            'status' => 'En cours',
            'delivery_date' => '2024-01-01',
        ];

        $id = $this->model->insert($data);
        $this->assertIsNumeric($id);

        $bon = $this->model->find($id);
        $this->assertNotNull($bon);
        $this->assertEquals('En cours', $bon['status']);
    }
    public function testUpdateBonLivraison()
    {
        $data = [
            'status' => 'En cours',
            'delivery_date' => '2024-01-01',
        ];

        $id = $this->model->insert($data);
        $this->assertIsNumeric($id);

        // Mise à jour
        $this->model->update($id, ['status' => 'Livré']);

        $updatedBon = $this->model->find($id);
        $this->assertEquals('Livré', $updatedBon['status']);
    }

    public function testDeleteBonLivraison()
    {
        $data = [
            'status' => 'En cours',
            'delivery_date' => '2024-01-01',
        ];

        $id = $this->model->insert($data);
        $this->assertIsNumeric($id);

        // Suppression
        $this->model->delete($id);

        $deletedBon = $this->model->find($id);
        $this->assertNull($deletedBon);
    }

}
