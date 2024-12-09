<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Medicament;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Medicament::findOrFail($id);
    
        // Vérifiez si le panier existe
        $cart = session()->get('cart', []);
    
        // Vérifiez si le produit est déjà dans le panier
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Ajoutez le produit au panier
            $cart[$id] = [
                'name' => $product->nom,
                'price' => $product->prix_unit,
                'quantity' => 1
            ];
        }
    
        session()->put('cart', $cart); // Sauvegarder dans la session
        return redirect()->back()->with('success', 'Produit ajouté au panier');
    }
    
    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('admin.cart.index', compact('cart'));
    }

    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);
    
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Panier mis à jour');
        }
    
        return redirect()->back()->with('error', 'Produit non trouvé dans le panier');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
    
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Produit retiré du panier');
        }
    
        return redirect()->back()->with('error', 'Produit non trouvé dans le panier');
    }
    
    
}
