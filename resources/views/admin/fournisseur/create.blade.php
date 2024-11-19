@extends('base')

@section('title', 'Ajout fournisseur')

@section('content')

     <!-- START FORM -->
     <div class="container forma">
        
        <form class="vstack gap-2" action="{{route('admin.supplier.store')}}" method="post"> 
            @csrf
            <h2 class="align-self-start best" style="letter-spacing:2px"> <span>Ajout </span>de fournisseur</h2><br><br><br>
                <div class="row">
                    <div class="form-group col">
                        <label for="nom">Nom</label>
                        <input class="form-control inp " type="text" id="nom" name="nom"  value="{{ old('nom') }}">
                    </div> 
                    
                    <div class="col row">
                        <div class="form-group col">
                            <label for="adresse">Adresse</label>
                            <input class="form-control inp " type="text" id="adresse" name="adresse" value="{{ old('adresse') }}">
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="phone">Telephone</label>
                        <input class="form-control inp " type="number" id="telephone" name="telephone" value="{{ old('telephone') }}">
                    </div> 
                    <div class="form-group col">
                        <label for="mail">Mail</label>
                        <input class="form-control inp " type="email" id="email" name="email" value="{{ old('email') }}">
                    </div> 
                </div>
                <br>
                <div>
                    <button class="btn btn-outline-primary">
                        Enregistrer
                    </button>
                </div>
                
            </form>
        </div>
     <!-- END FORM -->

@endsection