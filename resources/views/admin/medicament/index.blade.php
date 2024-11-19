@extends('base')

@section('title', 'Medicaments')

@section('content')

     <!-- START  -->
        
     <div class="containers">
          <div class="container publications-container flex-column d-flex align-items-center justify-content-between gap-4 mb-5">
               <div class="mr-5 container d-flex align-items-center justify-content-between flex-row">
                    <h2 class="align-self-start" style="letter-spacing:2px">Les <span>medi</span>caments</h2>
                    <a class="btn btn-secondary d-flex align-items-center justify-content-center" href=" {{route('admin.medicament.create')}} "><i class="fas fa-plus"></i>  Ajouter</a>
               </div>
               <form action="" class="gap-2 align-self-start d-flex align-items-center justify-content-center flex-row">
                @csrf
                    <input id="nom" type="text" class="form-control" placeholder="nom..." name="nom" value="{{ $input['nom'] ?? '' }}">

                    <select name="category_id" id="category_id" class="form-control" >
                        <option value="">Categorie...</option>
                        @foreach ($categories as $category)
                            <option {{ isset($input['category_id']) && $category->id == $input['category_id'] ? 'selected' : '' }} value="{{$category->id}}">{{$category->nom}}</option>
                        @endforeach
                    </select>

                    <select name="supplier_id" id="supplier_id" class="form-control" >
                        <option value="">Fournisseur...</option>
                        @foreach ($suppliers as $supplier)
                            <option {{ isset($input['supplier_id']) && $input['supplier_id'] == $supplier->id ? 'selected' : '' }} value="{{$supplier->id}}">{{$supplier->nom}}</option>
                        @endforeach
                    </select>

                    <input value="Rechercher" type="submit" class="btn btn-sm btn-outline-primary">
               </form>
               <table class="table table-striped table-hover">
                    <thead style="font-family: 'Poppins', sans-serif;">
                         <tr>
                              <th>Image</th>
                              <th>Nom</th>
                              <th>Categorie</th>
                              <th>Fournisseur</th>
                              <th>Date d ' expiration</th>
                              <th>Prix unitaire</th>
                              <th>Actions</th>
                         </tr>
                    </thead>
                    <tbody style="font-family: 'Poppins', sans-serif;">
                         
                        @foreach ($medicaments as $medicament)
                            <tr>
                                @if (isset($medicament->image))
                                    <td> <img src=" {{$medicament->imageUrl()}} " width="40px" height="40px" alt=""></td>
                                @else
                                    <td> <img src=" {{ asset('assets/images/medoc_default.jpg') }} " width="40px" height="40px" alt=""></td>
                                @endif
                                
                                <td class="fw-bolder"> {{ $medicament->nom }} </td>
                                <td> {{ $medicament->category->nom }} </td>
                                <td> {{ $medicament->supplier->nom }} </td>

                                <td> {{ Carbon\Carbon::parse($medicament->date_exp)->translatedFormat('d F Y') }} </td>

                                <td> {{ number_format( $medicament->prix_unit, '0', ',', '.') }} Ar </td>
                                
                                
                                <td class="d-flex gap-1">
                                    <a href=" {{ route('admin.medicament.edit', [$medicament]) }} " class="btn btn-sm btn-primary"><span class="fas fa-pencil-alt"></span> Modifier</a>
                                    <form action=" {{ route('admin.medicament.destroy', [$medicament]) }} " method="POST">
                                        @csrf
                                        @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger"><span class="fas fa-trash"></span> Supprimer</button>
                                    </form>
                                    <a href=" {{ route('admin.medicament.show', $medicament) }} " class="btn btn-sm btn-success"><span class="fas fa-eye"></span> Voir les details</a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
               </table>
               {{ $medicaments->links('vendor.pagination.default') }}
          </div>
     </div>
     <!-- END  -->

@endsection