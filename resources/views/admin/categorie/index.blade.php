@extends('base')

@section('title', 'Categorie')

@section('content')

    <div class="containers">
          <div class="container publications-container flex-column d-flex align-items-center justify-content-between gap-4 mb-5">
               <div class="mr-5 container d-flex align-items-center justify-content-between flex-row">
                    <h2 class="align-self-start" style="letter-spacing:2px">Les <span>cate</span>gories</h2>
                    <a class="btn btn-secondary d-flex align-items-center justify-content-center" href=" {{ route('admin.category.create') }} "><i class="fas fa-plus"></i>  Ajouter</a>
               </div>
               <form action="" class="gap-2 align-self-start d-flex align-items-center justify-content-center flex-row">
                    <input id="limit" type="text" class="form-control" placeholder="nom..." name="nom" value="{{ $input['nom'] ?? ''}}">
                    <input id="limit" type="text" class="form-control" placeholder="description..." name="description" value="{{ $input['description'] ?? '' }}">
                    <div>
                         <button  type="submit" class="btn btn-sm btn-outline-primary"> Rechercher</button>
                    </div>
                    
               </form>
               <table class="table table-striped table-hover">
                    <thead style="font-family: 'Poppins', sans-serif;">
                         <tr>
                              <th></th>
                              <th>Id</th>
                              <th>Nom</th>
                              <th>Description</th>
                              <th>Actions</th>
                         </tr>
                    </thead>

                    <tbody style="font-family: 'Poppins', sans-serif;">

                        @foreach ($categories as $category )
                        
                              <tr>
                                   <td></td>
                                   <td class="fw-bolder"> {{ $category->id }} </td>
                                   <td> {{ $category->nom }} </td>
                                   <td> {{ $category->description }} </td>
                                   <td class="d-flex gap-1">
                                        <a href="{{route('admin.category.edit', $category) }}" class="btn btn-sm btn-primary"><span class="fas fa-pencil-alt"></span> Modifier</a>
                                        <form action="{{route('admin.category.destroy',$category)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                             
                                             <button type="submit" class="btn btn-sm btn-danger"><span class="fas fa-trash"></span> Supprimer</button>
                                        </form>
                                   </td>
                              </tr>
                              
                        @endforeach
                         
                    </tbody>

               </table>
               {{ $categories->links('vendor.pagination.default') }}
          </div>
     </div>

@endsection