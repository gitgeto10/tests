<?php
namespace App\Models;

use CodeIgniter\Model;

class LigneBonLivraisonModel extends Model
{
    protected $table = 'lignebonlivraison';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id_bonlivraison',
        'designation',
        'quantity'
    ];

    // Définir la relation entre LigneBonLivraison et BonLivraison
    public function getBonLivraison()
    {
        return $this->belongsTo(BonLivraisonModel::class, 'id_bonlivraison');
    }

    public function insertLigneBonLivraison($data)
    {
        return $this->insert($data);
    }

    public function updateLigneBonLivraison($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteLigneBonLivraison($id)
    {
        return $this->delete($id);
    }

    public function getLigneBonLivraison($id)
    {
        return $this->where('id', $id)->first();
    }

    public function getLignesBonLivraison($idBonLivraison)
    {
        return $this->where('id_bonlivraison', $idBonLivraison)->findAll();
    }
}
