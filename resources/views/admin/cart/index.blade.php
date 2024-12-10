@extends('base')

@section('title', 'Panier')

@section('content')

<div class="container panier">
    <h1>Votre panier</h1>
    @if(session('cart') && count(session('cart')) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('cart') as $id => $details)
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>{{ $details['price'] }} Ar</td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="form-control">
                                <button type="submit" class="btn btn-sm btn-primary">Mettre à jour</button>
                            </form>
                        </td>
                        <td>{{ $details['price'] * $details['quantity'] }} Ar</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3>Total elements: {{ array_sum(array_column(session('cart'), 'quantity')) }} elements</h3>
        <h3>Total produits: {{ count(session('cart')) }} produits</h3>
        <h3>Prix total: {{ number_format( array_sum(array_column(session('cart'), 'price')), '0', '.') }} Ar</h3>
    @else
        <p>Votre panier est vide.</p>
    @endif
</div>
@endsection
