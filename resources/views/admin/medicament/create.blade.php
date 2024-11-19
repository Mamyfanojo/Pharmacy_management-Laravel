@extends('base')

@section('title', 'Ajout medicament')

@section('content')

     <!-- START FORM -->
     <div class="container forma">
        
        <form class="vstack gap-2" action=" {{ route('admin.medicament.store') }} " method="post" enctype="multipart/form-data"> 
            @csrf
            <h2 class="align-self-start best" style="letter-spacing:2px"> <span>Ajout </span>de medicament</h2><br><br><br>
                <div class="row">
                    <div class="form-group col">
                        <label for="nom">Nom</label>
                        <input class="form-control inp " type="text" id="nom" name="nom"  value=" {{ old('nom') }} ">
                    </div> 
                    
                    <div class="col row">
                        <div class="form-group col">
                            <label for="code">Code</label>
                            <input class="form-control inp " type="number" id="code" name="code" value="{{ old('code') }}">
                        </div> 
                        <div class="form-group col">
                            <label for="category_id">Categorie</label>
                            <select name="category_id" id="category_id" class="form-control" >
                                <option value="">Choisissez la categorie</option>

                                @foreach ($categories as $category)
                                    <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{$category->id}}">{{$category->nom}}</option>
                                @endforeach

                            </select>
                        </div> 
                    </div>
                </div>
                <div class="form-group col">
                    <label for="description">Descrption</label>
                    <textarea class="form-control inp " type="text" id="description" placeholder="" name="description">{{ old('description') }}</textarea>
                </div> 
                <div class="row">
                    <div class="form-group col">
                        <label for="prix_unit">Prix unitaire</label>
                        <input class="form-control inp " type="number" min="0" id="prix_unit" name="prix_unit" value="{{old('prix_unit')}}">
                    </div> 
                    <div class="form-group col">
                        <label for="stock">Nombre de stock</label>
                        <input class="form-control inp " type="number" id="stock" name="stock" value="{{old('stock')??''}}">
                    </div> 
                    <div class="form-group col">
                        <label for="forme">Forme</label>
                        <input class="form-control inp " type="text" id="forme" name="forme" value="{{ old('forme') }}">
                    </div> 
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="date_exp">Date de peremption</label>
                        <input class="form-control inp " type="date" id="date_exp" name="date_exp" value="{{ old('date_exp') }}">
                    </div> 
                    <div class="form-group col">
                        <label for="avertissement">Avertissement</label>
                        <input class="form-control inp " type="text" id="avertissement" name="avertissement" value="{{ old('avertissement') }}">
                    </div> 
                    <div class="form-group col">
                        <label for="effet">Effet secondaire</label>
                        <input class="form-control inp " type="text" id="effet" name="effet" value="{{ old('effet') }}">
                    </div> 
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="supplier_id">Fourlisseur</label>
                        <select name="supplier_id" id="supplier_id" class="form-control" >
                                <option value="">Choisissez le fournisseur</option>

                                @foreach ($suppliers as $supplier)
                                    <option {{ old('supplier_id') == $supplier->id ? 'selected' : '' }} value="{{$supplier->id}}">{{$supplier->nom}}</option>
                                @endforeach
                                
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="image">Image</label>
                        <input class="form-control inp " type="file" id="image" name="image" value="">
                    </div> 
                </div><br><br>
                <div>
                    <button class="btn btn-outline-primary">
                        Enregistrer
                    </button>
                </div>
                
            </form>
        </div>
     <!-- END FORM -->

@endsection