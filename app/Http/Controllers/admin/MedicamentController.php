<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\MedicamentRequest;
use App\Http\Requests\admin\SearchMedicamentRequest;
use App\Models\Category;
use App\Models\Medicament;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MedicamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchMedicamentRequest $request)
    {
        // User::create([
        //     'name' => 'Mamy',
        //     'email' => 'mamyfanojo@gmail.com',
        //     'password' => Hash::make('0000')
        // ]);
        
        $query = Medicament::query();
        if($request->validated('nom')) {
            $query = $query->where('nom', 'like', "%{$request->validated('nom')}%");
        }

        if($request->validated('category_id')) {
            $query = $query->where('category_id', '=', "{$request->validated('category_id')}");
        }

        if($request->validated('supplier_id')) {
            $query = $query->where('supplier_id', '=', "{$request->validated('supplier_id')}");
        }

        return view('admin.medicament.index', [
            'medicaments' => $query->orderBy('created_at', 'desc')->paginate(10),
            'categories' => Category::all(),
            'suppliers' => Supplier::all(),
            'input' => $request->validated()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.medicament.create', [
            'suppliers' => Supplier::all(),
            'categories' => Category::select('id', 'nom')->get(),
            'medicament' => new Medicament()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicamentRequest $request)
    {
        Medicament::create($this->extractData($request, new Medicament()));
        return redirect()->route('admin.medicament.index')->with('success', 'Le medicament a bie été ajouté');
    }

    private function extractData(MedicamentRequest $request, Medicament $medicament) {
        $data = $request->validated();
        $image = $request->validated('image');

        if($image == null || $image->getError()) {
            return $data;
        }

        if($medicament->image) {
            Storage::disk('public')->delete($medicament->image);
        }

        $data['image'] = $image->store('medicament', 'public');
        return $data;
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicament $medicament)
    {
        return view('admin.medicament.show', [
            'medicament' => $medicament
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicament $medicament)
    {
        return view('admin.medicament.edit', [
            'medicament' => $medicament,
            'categories' =>Category::all(),
            'suppliers' => Supplier::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MedicamentRequest $request, Medicament $medicament)
    {
        $medicament->update($this->extractData($request, $medicament));
        return redirect()->route('admin.medicament.index')->with('success', 'Medicament bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicament $medicament)
    {
        if(isset($medicament->image)) {
            Storage::disk('public')->delete($medicament->image);
        }
        $medicament->delete();
        return redirect()->route('admin.medicament.index')->with('success', 'Medicament bien supprimée');
    }
}
