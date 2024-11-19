@extends('base')

@section('title', 'Edit categorie')

@section('content')

     <!-- START FORM -->
     <div class="container forma">
        
        <form class="vstack gap-2" action="{{route('admin.category.update', [$category])}}" method="post"> 
            @csrf
            @method('PUT')
            <h2 class="align-self-start best" style="letter-spacing:2px"> <span>Edition </span>de categorie</h2><br><br><br>
                <div class="row">
                    <div class="form-group col">
                        <label for="nom">Nom</label>
                        <input class="form-control inp " type="text" id="nom" name="nom"  value="{{ old('nom', $category->nom) }}">
                    </div> 
                    
                    <div class="col row">
                        <div class="form-group col">
                            <label for="description">Description</label>
                            <input class="form-control inp " type="text" id="description" name="description" value="{{ old('description', $category->description) }}">
                        </div> 
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