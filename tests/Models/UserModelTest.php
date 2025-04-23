<?php

namespace App\Tests\Models;

use PHPUnit\Framework\TestCase;

use App\Models\UserModel;

class UserModelTest extends TestCase {
    public function testFindAllUsers(){

        $model = new UserModel(); 
        $users = $model->findAll();
        $this->assertIsArray ($users, "findAll retourne un tableau!");
    }

    public function testInsertUser() {

        $db = Database::connect('tests');
        $model = new UserModel();
        $model->setDatabase($db);

        $data = [
            'name' => 'Jamila Dahi', 
            'email' => 'jda@gk.mt'
        ];

        $id = $model->insert($data);

        $this->assertGreaterThan (0, $id, "ID user inséré > 0");
    }
}

?>