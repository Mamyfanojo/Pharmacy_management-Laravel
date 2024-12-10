@extends('base')

@section('title', 'Fournisseurs')

@section('content')

    <div class="containers">
          <div class="container publications-container flex-column d-flex align-items-center justify-content-between gap-4 mb-5">
               <div class="mr-5 container d-flex align-items-center justify-content-between flex-row">
                    <h2 class="align-self-start" style="letter-spacing:2px">Les <span>four</span>nisseurs</h2>
                    <a class="btn btn-secondary d-flex align-items-center justify-content-center" href=" {{ route('admin.supplier.create') }} "><i class="fas fa-plus"></i>  Ajouter</a>
               </div>
               <form action="" class="gap-2 align-self-start d-flex align-items-center justify-content-center flex-row">
                    <input id="limit" type="text" class="form-control" name="nom" placeholder="nom..." value="{{ $input['nom'] ?? '' }}">
                    <input id="limit" type="text" class="form-control" name="adresse" placeholder="adresse..."  value="{{ $input['adresse'] ?? '' }}">
                    
                    <input type="number" class="form-control" name="telephone" placeholder="telephone..."  value="{{ $input['telephone'] ?? '' }}">
                    <button  type="submit" class="btn btn-sm btn-outline-primary">Rechercher</button>
               </form>
               <table class="table table-striped table-hover">
                    <thead style="font-family: 'Poppins', sans-serif;">
                         <tr>
                              <th></th>
                              <th>Nom</th>
                              <th>Adresse</th>
                              <th>Telephone</th>
                              <th>Mail</th>
                              <th>Actions</th>
                         </tr>
                    </thead>

                    <tbody style="font-family: 'Poppins', sans-serif;">

                        @forelse ($suppliers as $supplier )
                        
                              <tr>
                                   <td></td>
                                   <td class="fw-bolder"> {{ $supplier->nom }} </td>
                                   <td> {{ $supplier->adresse }} </td>
                                   <td> {{ $supplier->telephone }} </td>
                                   <td> {{ $supplier->email }} </td>
                                   <td class="d-flex gap-1">
                                        <a href="{{route('admin.supplier.edit', $supplier) }}" class="btn btn-sm btn-primary"><span class="fas fa-pencil-alt"></span> Modifier</a>
                                        <form action="{{route('admin.supplier.destroy',$supplier)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                             
                                             <button type="submit"  class="btn btn-sm btn-danger"><span class="fas fa-trash"></span> Supprimer</button>
                                        </form>
                                   </td>
                              </tr>
                         @empty
                              <div class="">
                                   Aucun fournisseur ne correspondant a votre recherche
                              </div>
                              
                        @endforelse
                         
                    </tbody>

               </table>
               {{ $suppliers->links('vendor.pagination.default') }}
          </div>
     </div>

@endsection