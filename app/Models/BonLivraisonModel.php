<?php
namespace App\Models;

use CodeIgniter\Model;

class BonLivraisonModel extends Model
{
    protected $table = 'bonlivraison';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'status',
        'delivery_date'
    ];

    public function getLignes()
    {
        return $this->hasMany(LigneBonLivraisonModel::class, 'id_bonlivraison');
    }
}
