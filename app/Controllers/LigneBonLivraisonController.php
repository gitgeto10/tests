<?php
namespace App\Controllers;

use App\Models\LigneBonLivraisonModel;

class LigneBonLivraisonController extends BaseController
{
    public function create($idBonLivraison)
    {
        return view('ligne_bon_livraison/create', ['idBonLivraison' => $idBonLivraison]);
    }

    public function store()
    {
        $ligneBonLivraisonModel = new LigneBonLivraisonModel();
        $data = $this->request->getPost();
        $ligneBonLivraisonModel->insert($data);
        return redirect()->to('/bon-livraison/' . $data['id_bonlivraison']);
    }
}

