@extends('base')

@section('title', 'Vente medicament')

@section('content')

     <!-- START  -->
        
     <div class="containers">
          <div class="container publications-container flex-column d-flex align-items-center justify-content-between gap-4 mb-5">
               <div class="mr-5 container d-flex align-items-center justify-content-between flex-row">
                    <h2 class="align-self-start" style="letter-spacing:2px">Faire <span>une </span>vente</h2>
                    <a class="btn btn-success d-flex align-items-center justify-content-center" href=" ">Voir le panier</a>

               </div>
               <form action="" class="gap-2 align-self-start d-flex align-items-center justify-content-center flex-row">
                @csrf
                    <input id="nom" type="text" class="form-control" placeholder="nom..." name="nom" value=" {{ $input['nom'] ?? '' }} ">

                    <input value="Rechercher" type="submit" class="btn btn-sm btn-outline-primary">
               </form>
               <table class="table table-striped table-hover">
                    <thead style="font-family: 'Poppins', sans-serif;">
                         <tr>
                              <th>Image</th>
                              <th>Nom</th>
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


                                <td> {{ number_format( $medicament->prix_unit, '0', ',', '.') }} Ar </td>
                                
                                <td class="d-flex gap-1">
                                    <form action=" {{ route('cart.add', [$medicament]) }} " method="POST">
                                        @csrf
                                            <button type="submit" class="btn btn-sm btn-success">Ajouter au panier</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
               </table>
          </div>
     </div>
     <!-- END  -->

@endsection