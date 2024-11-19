@extends('base')

@section('title', 'Ajout categorie')

@section('content')

     <!-- START FORM -->
     <div class="container forma">
        
        <form class="vstack gap-2" action="{{route('admin.category.store')}}" method="post"> 
            @csrf
            <h2 class="align-self-start best" style="letter-spacing:2px"> <span>Ajout </span>de categorie</h2><br><br><br>
                <div class="row">
                    <div class="form-group col">
                        <label for="nom">Nom</label>
                        <input class="form-control inp " type="text" id="nom" name="nom"  value="{{ old('nom') }}">
                    </div> 
                    
                    <div class="col row">
                        <div class="form-group col">
                            <label for="description">Description</label>
                            <input class="form-control inp " type="text" id="description" name="description" value="{{ old('description') }}">
                        </div> 
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