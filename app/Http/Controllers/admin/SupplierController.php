<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\SearchSupplierRequest;
use App\Http\Requests\admin\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchSupplierRequest $request)
    {

        $query = Supplier::query();
        if ($request->validated('nom')) {
            $query = $query->where('nom', 'like', "%{$request->input('nom')}%");
        }
        if ($request->has('adresse')) {
            $query = $query->where('adresse', 'like', "%{$request->input('adresse')}%");
        }
        if ($request->has('telephone')) {
            $query = $query->where('telephone', 'like', "%{$request->input('telephone')}%");
        }

        return view('admin.fournisseur.index', [
            'suppliers' => $query->orderBy('created_at', 'asc')->paginate(10),
            'input' => $request->validated()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fournisseur.create', [
            'supplier' => new Supplier()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierRequest $request)
    {
        Supplier::create($request->validated());
        return redirect()->route('admin.supplier.index')->with('success', 'Fournisseur bien enregistré');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        // dd($supplier);
        return view('admin.fournisseur.edit', [
            'supplier' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Supplier $supplier, SupplierRequest $request )
    {
        $supplier->update($request->validated());
        return redirect()->route('admin.supplier.index')->with('success','Fournisseur bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('admin.supplier.index')->with('success', 'Fournisseur bien supprimé');
    }
}
