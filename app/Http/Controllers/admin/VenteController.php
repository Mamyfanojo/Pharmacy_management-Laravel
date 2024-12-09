<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\SearchMedicamentRequest;
use App\Models\Medicament;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    public function index(SearchMedicamentRequest $request) {

        $query = Medicament::query();
        if($request->validated('nom')) {
            $query = $query->where('nom', 'like', "%{$request->validated('nom')}%");
        }

        return view('admin.vente.index', [
            'medicaments' => $query->orderBy('nom')->get(),
            'input' => $request->validated()
        ]);
    }
}
