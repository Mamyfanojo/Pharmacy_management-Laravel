@extends('base')

@section('title', 'Edit fournisseur')

@section('content')

     <!-- START FORM -->
     <div class="container forma">
        
        <form  action="{{route('admin.supplier.update', [$supplier])}}" method="post" class="vstack gap-2"> 
            @csrf
            @method('PUT')
            <h2 class="align-self-start best" style="letter-spacing:2px"> <span>Edition </span>de fournisseur</h2><br><br><br>
                <div class="row">
                    <div class="form-group col">
                        <label for="nom">Nom</label>
                        <input class="form-control inp " type="text" id="nom" name="nom"  value="{{ old('nom', $supplier->nom) }}">
                    </div> 
                    
                    <div class="col row">
                        <div class="form-group col">
                            <label for="adresse">Adresse</label>
                            <input class="form-control inp " type="text" id="adresse" name="adresse" value="{{ old('adresse', $supplier->adresse) }}">
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="phone">Telephone</label>
                        <input class="form-control inp " type="number" id="telephone" name="telephone" value="{{ old('telephone', $supplier->telephone) }}">
                    </div> 
                    <div class="form-group col">
                        <label for="email">Mail</label>
                        <input class="form-control inp " type="email" id="email" name="email" value="{{ old('email', $supplier->email) }}">
                    </div> 
                </div>
                <br>
                <div>
                    <button class="btn btn-outline-primary"><span class="fas fa-pencil-alt"></span> Modifier </button>
                </div>
                
            </form>
        </div>
     <!-- END FORM -->

@endsection