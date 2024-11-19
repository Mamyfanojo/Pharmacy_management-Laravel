<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\SearchStockController;
use App\Http\Requests\admin\StockRequest;
use App\Models\Medicament;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(SearchStockController $request) {

        $query = Medicament::query();

        if($min = $request->validated('minStock')) {
            $query = $query->where('stock', '>=', $min);
        }
        if($max = $request->validated('maxStock')) {
            $query = $query->where('stock', '<=', $max);
        }
        if($nom = $request->validated('nom')) {
            $query = $query->where('nom', 'like', "%{$nom}%");
        }

        return view('admin.medicament.stock', [
            'medicaments' => $query->orderBy('created_at', 'desc')->paginate(10),
            'input' => $request->validated()
        ]);
    }

    public function updateStock(StockRequest $request, Medicament $medicament) {
        // dd($medicament);
        
        if($request->filled('max')) {
            $medicament->stock += $request->input('max');
        }
        if($request->filled('min')) {
            $medicament->stock -= $request->input('min');
        } 
        $medicament->save();
        return redirect()->back();
    }
    public function initStock(Medicament $medicament) {
        $medicament->stock = 0 ;
        $medicament->save();
        return redirect()->back();
    }
}
