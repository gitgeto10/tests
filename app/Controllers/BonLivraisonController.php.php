<?
namespace App\Controllers;

use App\Models\BonLivraisonModel;

class BonLivraisonController extends BaseController
{
    public function index()
    {
        $bonLivraisonModel = new BonLivraisonModel();
        $bonLivraisons = $bonLivraisonModel->findAll();
        return view('bon_livraison/index', ['bonLivraisons' => $bonLivraisons]);
    }

    public function create()
    {
        return view('bon_livraison/create');
    }

    public function store()
    {
        $bonLivraisonModel = new BonLivraisonModel();
        $data = $this->request->getPost();
        $bonLivraisonModel->insert($data);
        return redirect()->to('/bon-livraison');
    }
}
